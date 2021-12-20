<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CatalogResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'meta_title' => $this->meta_title,
            'meta_description' => $this->meta_description,
            'preview' => $this->preview,
        ];
    }
}
