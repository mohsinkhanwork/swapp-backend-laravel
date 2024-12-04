<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AdvertisementResource extends JsonResource
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
            'title'=>$this->title,
            'type'=>$this->type,
            'url'=>$this->url,
            'image'=>$this->image,
            'features'=>$this->features,
            'description'=>$this->description,
            'button_text'=>$this->button_text,
            'button_color'=>$this->button_color,
            'button_bg_color'=>$this->button_bg_color,
            'color'=>$this->color,
            'bg_color'=>$this->bg_color,
        ];
    }
}
