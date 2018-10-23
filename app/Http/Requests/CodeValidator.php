<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CodeValidator extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'count' => 'required|integer|min:1',
            'length' => 'required|integer|min:1',
        ];

    }


    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            '*.required' => 'To pole jest wymagane',
            '*.integer' => 'To pole musi być liczbą całkowitą',
            '*.min' => 'Wartość nie może być mniejsza od :min',

        ];
    }
}
