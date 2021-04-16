<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTurmaRequest extends FormRequest
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

            'nome' => ['required', 'unique:turmas', 'regex:/^[A-Z][a-z] [A-Z] - [A-Z]|[a-z]$/i'],
            'qntAlunos' => ['required', 'min:1', 'max:25'],
            'horario' => 'required',
        ];
    }


    public function messages()
    {
        return [

            'nome.required' => 'O campo nome é obrigatório.',
            'nome.regex' => 'O campo nome é inválido.',
            'nome.unique' => 'Já existe uma turma com esse nome.',
            'qntAlunos.required' => 'O campo quantidade máxima de alunos é obrigatório.',
            'qntAlunos.min' => 'Quantidade de alunos deve ser superior a 0.',
            'qntAlunos.max' => 'Quantidade de alunos deve ser inferior a 25.',
            'horario.required' => 'O campo horário das aulas é obrigatório.',
        ];
    }
}
