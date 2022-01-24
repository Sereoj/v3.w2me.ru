<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class SinglePageRequest extends FormRequest
{
    public function rules()
    {
        return [
            'reaction' => 'nullable',
            'download' => 'nullable',
            'favorite' => 'nullable',
        ];
    }
    protected function failedValidation(Validator $validator)
    {
        throw new ValidationException($validator, response()->json($validator->errors(),422));
    }
}
