<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateEstudioRequest extends FormRequest
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
            'nome' => ['required', 'regex:/^[A-Z][a-z] [A-Z]|[A-Z][a-z] [1-9]$/i'],
        ];
    }

    public function messages()
    {
        return [

            'nome.required' => 'O campo nome é obrigatório.',
            'nome.regex' => 'O campo nome é inválido.',

        ];
    }
}
