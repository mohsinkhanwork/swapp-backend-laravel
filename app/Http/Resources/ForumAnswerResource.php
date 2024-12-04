<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ForumAnswerResource extends JsonResource
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
            'detail'=>$this->detail,
            'best_answer'=>$this->best_answer,
            'likes'=>$this->likes_count??0,
            'comments'=>$this->comments_count??0,
            'date'=>$this->created_at,
            'user'=>new GeneralUserResource($this->user),
        ];
    }
}
