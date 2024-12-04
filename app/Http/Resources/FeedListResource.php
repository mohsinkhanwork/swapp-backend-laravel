<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class FeedListResource extends ResourceCollection
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $feeds = [];
        $data = [];
        foreach ($this->collection as $collection){
            if (!empty($collection)){
                $feeds[]= [
                    'id'=>$collection->id,
                    'description'=>$collection->description,
                    'privacy'=>$collection->privacy,
                    'likes_count'=>$collection->likes_count??0,
                    'comments_count'=>$collection->comments_count??0,
                    'created_at'=>$collection->created_at,
                    'user'=>new GeneralUserResource($collection->user),
                    'attachments'=>AttachmentResource::collection($collection->attachments)
                ];
            }
        }

        $data['feeds'] = $feeds;
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
