<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class UserListingResource extends ResourceCollection
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $users = [];
        $data = [];
        $language = $request->get('language');
        foreach ($this->collection as $collection){
            if (!empty($collection)){
                $users[]= [
                    'id'=>$collection->id,
                    'username'=>$collection->username,
                    'name'=>$collection->name,
                    'avatar'=>$collection->avatar,
                    'profession'=>($language == 'turkish') ? $collection->profession->title_tr: $collection->profession->title_en,
                    'bio'=>$collection->bio,
                    'rating_count'=>$collection->rating_count,
                    'avg_rating'=>number_format($collection->avg_rating,2),
                    'skills'=>SkillResource::collection($collection->skills),
                    'is_following'=>isFollowing($collection->id)
                ];
            }
        }

        $data['users'] = $users;
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
