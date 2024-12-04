<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SwapUserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name'=>$this->user->name,
            'skill'=>$this->skill->title_en,
            'status'=>$this->status,
            'rating'=>$this->rating,
            'review'=>$this->review,
        ];
    }
}
