<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CatalogDownloadResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' =>$this->id,
            'size' => $this->size,
            'count_download' => $this->count_download,
            'links' => $this->links
        ];
    }
}
