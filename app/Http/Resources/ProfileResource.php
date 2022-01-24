<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'country' => $this->country,
            'cover' => $this->cover,
            'avatar' => $this->avatar,
            'friends_count' => $this->friends()->count(),
            'users_likes' => $this->users_likes,
            'publish_count' => $this->loads()->count(),
            'is_friend' => (bool)$this->is_friend,
            'facebook' => $this->facebook,
            'twitter' => $this->twitter,
            'github' => $this->github,
            'vk' => $this->vk,
            'reported' => $this->reported,
            'posts' => CatalogResource::collection($this->loads),
        ];
    }
}
