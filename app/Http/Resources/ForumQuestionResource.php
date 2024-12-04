<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ForumQuestionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
                'id'=>$this->uuid,
                'title'=>$this->title,
                'privacy'=>$this->privacy,
                'detail'=>$this->detail,
                'views'=>$this->views_count,
                'answers'=>$this->answers()->count(),
                'date'=>$this->created_at,
                'user'=>new GeneralUserResource($this->user),
                'tags'=>TagResource::collection($this->tags)
            ];

    }
}
