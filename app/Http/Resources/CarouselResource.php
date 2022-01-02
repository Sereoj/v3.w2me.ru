<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CarouselResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'type' => $this->type,
            'location' => $this->location,
        ];
    }
}
