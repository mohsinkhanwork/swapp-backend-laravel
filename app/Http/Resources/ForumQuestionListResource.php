<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
class ForumQuestionListResource extends ResourceCollection
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $questions = [];
        $data = [];
        foreach ($this->collection as $collection){
            if (!empty($collection)){
                $questions[]= [
                    'id'=>$collection->uuid,
                    'title'=>$collection->title,
                    'privacy'=>$collection->privacy,
                    'detail'=>$collection->detail,
                    'views'=>$collection->views_count,
                    'answers'=>$collection->answers_count,
                    'date'=>$collection->created_at,
                    'user'=>new GeneralUserResource($collection->user),
                    'tags'=>TagResource::collection($collection->tags),
                ];
            }
        }

        $data['questions'] = $questions;
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
