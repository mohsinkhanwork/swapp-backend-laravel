<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ChatRoomResource extends ResourceCollection
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $rooms = [];
        $data = [];
        foreach ($this->collection as $collection){
            if (!empty($collection)){
                $user=$collection->users[0];
                $rooms[]= [
                    'id'=>$collection->uuid,
                    'user_id'=>$user->id,
                    'name'=>$user->name,
                    'unread'=>$collection->unread,
                    'message'=>$collection->lastMessage->last_message??'',
                    'time'=>$collection->lastMessage->created_at??''
                ];
            }
        }

        $data['rooms'] = $rooms;
        $data['pagination'] = [
            'total' => $this->total(),
            'count' => $this->count(),
            'per_page' => $this->perPage(),
            'current_page' => $this->currentPage(),
            'next_page_url' => $this->nextPageUrl(),
            'previous_page_url' => $this->previousPageUrl(),
            'total_pages' => $this->lastPage()
        ];
        return $data;
    }
}
