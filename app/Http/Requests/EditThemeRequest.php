<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class EditThemeRequest extends FormRequest
{
    public function rules()
    {
        return [
            'id' => 'required|integer|exists:posts,id',
        ];
    }
    protected function failedValidation(Validator $validator)
    {
        throw new ValidationException($validator, response()->json($validator->errors(),422));
    }
}
