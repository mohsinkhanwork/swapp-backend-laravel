<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SwapRequestsReceivedResource extends JsonResource
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
            'proposal'=>$this->proposal,
            'status'=>$this->status,
            'skill'=>$this->swapUsers[0]->skill,
            'swap_id'=>$this->swapUsers[0]->swap_id,
            'user_id'=>$this->user_id,
            'user'=>$this->requester,
            // 'user_skills'=>$this->requester->skills,
        ];

    }
}