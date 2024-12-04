<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SupportTicketResponseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'description'=>$this->description,
            'file'=>$this->file,
            'sender_type'=>$this->sender_type,
            'admin'=>$this->admin?new AdminResource($this->admin):null,
            'created_at'=>$this->created_at
        ];
    }
}
