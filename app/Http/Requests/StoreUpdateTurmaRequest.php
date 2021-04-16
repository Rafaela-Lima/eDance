<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateTurmaRequest extends FormRequest
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
            'nome' => ['required','regex:/^[A-Z][a-z] [A-Z] - [A-Z]|[a-z]$/i'],
            'qntAlunos' => ['required', 'regex:/^[1-9]$/i'],
            'horario' => 'required',
        ];
    }

    public function messages()
    {
        return [

            'nome.required' => 'O campo nome é obrigatório.',
            'nome.regex' => 'O campo nome é inválido.',
            'qntAlunos.required' => 'O campo quantidade máxima de alunos é obrigatório.',
            'qntAlunos.regex' => 'O campo quantidade máxima de alunos é inválido.',
            'horario.required' => 'O campo horário das aulas é obrigatório.',
        ];
    }
}
