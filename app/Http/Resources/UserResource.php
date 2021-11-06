<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'email_verified_at' => $this->email_verified_at,
            'user_type' => $this->type,
            'user_role' => $this->role,
            'user_photo' => $this->photo,
            'create' => $this->created_at
        ];
    }
}
