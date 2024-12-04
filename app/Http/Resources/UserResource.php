<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'username'=>$this->username,
            'name'=>$this->name,
            'first_name'=>$this->first_name,
            'last_name'=>$this->last_name,
            'email'=>$this->email,
            'phone'=>$this->phone,
            'avatar' => $this->avatar ? asset($this->avatar) : null,
            'bio'=>$this->bio,
            'language'=>$this->language,
            'timezone'=>$this->timezone,
            'newsletter_subscribed' => (bool) $this->newsletter_subscribed,
            'profession'=>$this->profession->title_en??'',
            'profession_id'=>$this->profession->id??'',
            'skills'=>SkillResource::collection($this->skills),
            'followers'=>$this->followers()->count(),
            'following'=>$this->following()->count(),
            'facebook_link'=>$this->facebook_link,
            'instagram_link'=>$this->instagram_link,
            'linkedin_link'=>$this->linkedin_link,
            'is_following'=>isFollowing($this->id),
            'created_at'=>$this->created_at
        ];
    }
}