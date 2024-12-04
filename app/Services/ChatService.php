<?php

namespace App\Services;

use App\Models\Chat;
use App\Models\Swap;
use App\Models\ChatMessage;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Events\NewChatMessageEvent;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Events\NewChatMessageRoomEvent;
use App\Http\Resources\ChatRoomResource;
use App\Http\Resources\ChatMessageResource;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Contracts\Database\Eloquent\Builder;

class ChatService
{
    use ApiResponse;

    public function rooms()
    {
        $user = Auth::user();
        $search = request('search', '');
        $rooms = $user->chats()->withCount(['messages as unread' => function (Builder $query) use ($user) {
            $query->where('sender_id', '!=', $user->id)->where(function ($qry) use ($user) {
                $qry->whereNull('read_by')->orWhereJsonDoesntContain('read_by', $user->id);
            });
        }])->with(['lastMessage', 'users' => function ($query) use ($user) {
            $query->where('users.id', '!=', $user->id);
        }])->orderByDesc(
            ChatMessage::select('created_at')
                ->whereColumn('chat_id', 'chats.id')
                ->orderByDesc('created_at')
                ->limit(1)
        )->when($search != '', function ($query) use ($search, $user) {
            return $query->whereHas('users', function ($u) use ($search, $user) {
                $u->where('user_id', '!=', $user->id)->where(function ($qry) use ($search) {
                    $qry->where('first_name', 'like', "%$search%");
                    $qry->orWhere('last_name', 'like', "%$search%");
                });
            });
        })->paginate(15);
        return $this->successResponse(new ChatRoomResource($rooms));
    }

    public function messages(Chat $chat)
    {
        $user = Auth::user();
        $room = $user->chats()->where('chats.id', $chat->id)->first();

        if (!$room) {
            return $this->errorResponse('Invalid chat room.', Response::HTTP_NOT_FOUND);
        }

        $message_id = request('message_id', 0);
        $messages = $room->messages()->orderByDesc('id')->when($message_id > 0, function ($query) use ($message_id) {
            return $query->where('id', '<', $message_id);
        })->take(20)->get();

        return $this->successResponse(ChatMessageResource::collection($messages));
    }

    public function messagesBySwap(Swap $swap)
    {
        $user = Auth::user();

        // if ($swap->user_id !== $user->id) {
        //     return $this->errorResponse('Invalid chat room.',Response::HTTP_NOT_FOUND);
        // }

        Log::debug('userChats', [
            'chats' => $user->chats,
            'swap' => $swap,
        ]);

        // $room = Chat::whereSwapId($swap->id)->first();
        $room = $user->chats()->where('swap_id',$swap->id)->first();

        if (!$room) {
            return $this->errorResponse('Invalid chat room.', Response::HTTP_NOT_FOUND);
        }

        $message_id = request('message_id', 0);
        $messages = $room->messages()->orderByDesc('id')->when($message_id > 0, function ($query) use ($message_id) {
            return $query->where('id', '<', $message_id);
        })->take(20)->get();

        return $this->successResponse([
            'messages' => ChatMessageResource::collection($messages),
            'chat_uuid' => $room->uuid,
            'currentUserId' => $user->id,
        ]);
    }

    public function sendMessage(Request $request, Chat $chat)
    {
        $user = Auth::user();
        $room = $user->chats()->where('chats.id', $chat->id)->first();
        if (!$room) {
            return $this->errorResponse('Invalid chat room.', Response::HTTP_NOT_FOUND);
        }
        try {
            DB::beginTransaction();
            $message = $room->messages()->create([
                'sender_id' => $user->id,
                'parent_id' => $request->parent_id ?? null,
                'message' => $request->message ?? ''
            ]);
            if ($file = $request->file('attachment')) {
                $attachment = new ChatAttachmentService($message->id);
                $attachment->upload($file, $request->attachment_type);
            }
            $data = new ChatMessageResource($message);
            $this->broadcastMessage($data, $room);
            DB::commit();
            return $this->successResponse($data, 'message sent successfully');
        } catch (\Throwable $th) {
            return $this->serverException($th);
        }
    }

    // broadcast notifications
    public function broadcastMessage($data, $room)
    {
        $user = Auth::user();
        broadcast(new NewChatMessageEvent($user->id, $room->uuid, $data));
    }

    public function sendMessageBySwap($request, $swap)
    {
        $user = Auth::user();

        $room = Chat::whereSwapId($swap->id)->first();

        if (!$room) {
            return $this->errorResponse('Invalid chat room.', Response::HTTP_NOT_FOUND);
        }
        try {
            DB::beginTransaction();
            $message = $room->messages()->create([
                'sender_id' => $user->id,
                'parent_id' => $request->parent_id ?? null,
                'message' => $request->message ?? ''
            ]);
            if ($file = $request->file('attachment')) {
                $attachment = new ChatAttachmentService($message->id);
                $attachment->upload($file, $request->attachment_type);
            }
            $data = new ChatMessageResource($message);
            $this->broadcastMessage($data, $room);
            DB::commit();
            return $this->successResponse($data, 'message sent successfully');
        } catch (\Throwable $th) {
            return $this->serverException($th);
        }
    }
}
