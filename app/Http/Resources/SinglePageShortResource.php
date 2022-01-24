<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Psy\Util\Json;

class SinglePageShortResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'views' => $this->views,
            'likes' => $this->likes,
            'downloads' => $this->downloads,
            'favorite' => $this->favorite->count() > 0,
            'install' => $this->install->count() > 0,
            'reaction' => $this->reaction->count() > 0,
            'download' => $this->download_link,
        ];
    }
}
