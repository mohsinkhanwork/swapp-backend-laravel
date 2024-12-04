<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SupportTicketResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'ticket_number'=>$this->ticket_number,
            'subject'=>$this->subject,
            'description'=>$this->description,
            'file'=>$this->file,
            'status'=>$this->status,
            'priority'=>$this->priority,
            'time'=>$this->created_at,
        ];
    }
}
