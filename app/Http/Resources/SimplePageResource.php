<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Psy\Util\Json;

class SimplePageResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'views' => $this->views,
            'likes' => $this->likes,
            'downloads' => $this->downloads,
            'category' => $this->categories,
            'brand' => $this->brand,
            'tags' => $this->tags,
            'preview' => $this->preview,
            'images' => $this->images,
            'favorite' => $this->favorite->count() > 0,
            'install' => $this->install->count() > 0,
            'reaction' => $this->reaction->count() > 0,
            'user' => new UserResource($this->user),
            'download' => $this->download_link,
            'posts' => $this->posts,
            'created_at' => $this->created_at,
        ];
    }
}
