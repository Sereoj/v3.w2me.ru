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
            'preview' => $this->preview,
            'images' => $this->images,
            'category' => new CategoryResource($this->category),
            'brand' => new CategoryResource($this->brand),
            'user' => new UserResource($this->user),
            'download' => $this->download_link,
            'created_at' => $this->created_at,
        ];
    }
}
