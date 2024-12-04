<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class ChatMessageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $auth_id = Auth::id();
        return [
            'id' => $this->id,
            'send_by_me' => $this->sender_id == $auth_id ? true : false,
            'message' => $this->message,
            'attachment' => $this->attachment ? new AttachmentResource($this->attachment) : null,
            'chat_uuid' => $this->chat->uuid ?? null,
            'created_at' => $this->created_at,
        ];
    }
}
