<?php

namespace App\Http\Requests;

use App\Rules\FullName;
use Illuminate\Foundation\Http\FormRequest;

class StoreMatriculaRequest extends FormRequest
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

            'nome' => ['required', new FullName],
            'email' => ['required','max:255','regex:/^.+@.+$/i'],
            'taxaMatricula' => ['required','regex:/^[0-9]{3}.[0-9]{2}$/i'],
        ];
    }


    public function messages()
    {
        return [

            'nome.required' => 'O campo nome é obrigatório.',
            'email.required' => 'O campo e-mail é obrigatório.',
            'email.max' => 'O campo e-mail excedeu o número máximo de caracteres.',
            'email.regex' => 'Insira um e-mail válido.',
            'taxaMatricula.required' => 'O campo valor da taxa de matrícula é obrigatório.',
            'taxaMatricula.regex' => 'O campo valor da taxa de matrícula é inválido.',

        ];
    }
}
