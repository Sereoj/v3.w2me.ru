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
            'subs_count' => $this->avatar,
            'likes_count' => $this->likes_count,
            'subscriptions_count' => $this->subscriptions_count,
            'subs' =>  UserShortResource::collection($this->subscriptions),
            'facebook' => $this->facebook,
            'twitter' => $this->twitter,
            'github' => $this->github,
            'vk' => $this->vk,
            'reported' => $this->reported,
            'posts' => CatalogResource::collection($this->loads),
        ];
    }
}
