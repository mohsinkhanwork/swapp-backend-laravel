<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class NotificationResource extends ResourceCollection
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        $response = [];
        $finalData = [];
        foreach ($this->collection as $collection){
            if (!empty($collection)){
                    $data = [
                        'notification_id'=> $collection->id,
                        'data_id'=>$collection->data['id']??null,
                        'type'=>$collection->data['type']??null,
                        'image'=>$collection->data['image']??null,
                        'title'=>$collection->data['title']??null,
                        'description'=>$collection->data['description']??null,
                        'date' => $collection->created_at,
                        'is_read' => $collection->read_at == null ? false : true,
                    ];
                    array_push($finalData, $data);
            }
        }

        $response['notifications'] = $finalData;
        $response['pagination'] = [
            'total' => $this->total(),
            'count' => $this->count(),
            'per_page' => $this->perPage(),
            'current_page' => $this->currentPage(),
            'next_page_url' => $this->nextPageUrl(),
            'previous_page_url' => $this->previousPageUrl(),
            'total_pages' => $this->lastPage()
        ];

        return $response;
    }
}
