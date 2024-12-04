<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class FeedCommentListResource extends ResourceCollection
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $comments = [];
        $data = [];
        foreach ($this->collection as $collection){
            if (!empty($collection)){
                $comments[]= [
                    'id'=>$collection->id,
                    'detail'=>$collection->detail,
                    'user'=>new GeneralUserResource($collection->user),
                ];
            }
        }

        $data['comments'] = $comments;
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
