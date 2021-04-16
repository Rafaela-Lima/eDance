<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateModalidadeRequest extends FormRequest
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

            'nome' => ['required', 'regex:/^[A-Z]{1}[a-z]+$/i'],
            'valorMensalidade' => ['required','regex:/^[0-9]{3}.[0-9]{2}$/i'],
        ];
    }

    public function messages() {
        return[
            'nome.required' => 'O campo nome é obrigatório.',
            'valorMensalidade.required' => 'O campo valor da mensalidade é obrigatório.',
            'nome.regex' => 'Inclua um nome válido.',
            'valorMensalidade.regex' => 'Inclua um valor válido.',
        ];

    }
}
