<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class ThemeRequest extends FormRequest
{
    public function rules()
    {
        return [
            'id' => 'integer',
            'name' => 'required|unique:posts,name|min:4|max:100',
            'description' => 'required|min:10|max:254',
            'preview' => 'required',
            'licence' => 'required|in:free,payment',
            'images' => 'required|array',
            'images.*.type' => 'required|in:sunrise,day,sunset,night',
            'images.*.url' => 'url',
            'images.*.file' => 'file',
            'category_id' => 'required|integer|exists:categories,id',
            'brand_id' => 'required|integer|exists:brands,id',
            'download_link' => 'required|url',
        ];
    }
    protected function failedValidation(Validator $validator)
    {
        throw new ValidationException($validator, response()->json($validator->errors(),422));
    }
}
