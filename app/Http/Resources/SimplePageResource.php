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
            'like' => $this->like,
            'preview' => $this->preview,
            'images' => unserialize($this->images),
            'category' => $this->category,
            'brand' => $this->brand,
            'user' => $this->user,
            'download' => $this->download,
            'rating' => $this->rating,
        ];
    }
}
