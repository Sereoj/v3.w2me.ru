<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class CategoryRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|unique',
            'tag' => 'required',
            'icon' => 'nullable',
        ];
    }
    protected function failedValidation(Validator $validator)
    {
        throw new ValidationException($validator, response()->json($validator->errors(),422));
    }
}
