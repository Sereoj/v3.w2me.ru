<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ThemeRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|unique:catalog,name|min:4|max:100',
            'description' => 'required|min:10|max:254',
            'preview' => 'required|url',
            'images' => 'required|array',
                'images.sunrise' => 'required|array',
                'images.sunrise.*' => 'url',
                'images.day' => 'required|array',
                'images.day.*' => 'url',
                'images.sunset' => 'required|array',
                'images.sunset.*' => 'url',
                'images.night' => 'required|array',
                'images.night.*' => 'url',
            'category_id' => 'required|integer',
            'brand_id' => 'required|integer',
            'license' => 'required|array',
                'license.cost' => 'required|integer',
                'license.currency' => 'required',
                'license.type' => 'required',
            'download' => 'required|array',
            'download.links' => 'required|array',
            'download.links.link_0' => 'required|url',
        ];
    }
}
