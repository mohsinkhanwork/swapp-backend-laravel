<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SkillResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $language = $request->get('language');
        return [
            'id'=>$this->id,
            'name'=>($language == 'turkish') ? $this->title_tr : $this->title_en,
            'status'=>$this->pivot->status
        ];
    }
}
