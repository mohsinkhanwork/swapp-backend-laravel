<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FeedResource extends JsonResource
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
            'description'=>$this->description,
            'privacy'=>$this->privacy,
            'likes_count'=>$this->likes_count??0,
            'comments_count'=>$this->comments_count??0,
            'created_at'=>$this->created_at,
            'user'=>new GeneralUserResource($this->user),
            'attachments'=>AttachmentResource::collection($this->attachments)
        ];
    }
}
