<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SwapRequestsSentResource extends JsonResource
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
            'swap_id'=>$this->swap_id,
            'skill_id'=>$this->skill_id,
            'user_id'=>$this->user_id,
            'status'=>$this->status,
            'skill'=>$this->skill,
            'user'=>$this->user,
        ];
        
    }
}