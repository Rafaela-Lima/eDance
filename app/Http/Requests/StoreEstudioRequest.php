<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEstudioRequest extends FormRequest
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
            'nome' => [
                'required',
                'unique:estudios',
                'regex:/^[A-Z]{1}[a-z]+ [A-Z]|[1-9]$/i'
            ],
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O campo nome é obrigatório.',
            'nome.unique' => 'Já existe um estúdio com esse nome.',
            'nome.regex' => 'O campo nome é inválido.',
        ];
    }
}
