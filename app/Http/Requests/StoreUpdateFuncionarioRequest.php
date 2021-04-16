<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\FullName;
use Carbon\Carbon;

class StoreUpdateFuncionarioRequest extends FormRequest
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
            'endereco' => ['required', 'regex:/^[A-Z][a-z]+ | [A-Z][a-z]+, [0-9]+$/i'],
            'cpf' => ['required','regex:/^[0-9]{3}.[0-9]{3}.[0-9]{3}-[0-9]{2}$/i'],
            'rg' => ['required', 'regex:/^[0-9]{2}.[0-9]{3}.[0-9]{3}-[0-9]{1}$/i'],
            'cidade' => ['required','regex:/^[A-Z][a-z]+|[A-Z][a-z]+$/i'],
            'cep' => ['required', 'regex:/^[0-9]{5}-[0-9]{3}$/i'],
            'contato' => ['required', 'regex:/^.[0-9]{2}.9[0-9]{4}-[0-9]{4}$/i'],
            'dataNasc' => 'required|date|before:today',
            'noCarteiraTrab' => ['required', 'regex:/^[0-9]{7} [0-9]{3}-[0-9]{1}$/i'],
           
        ];
    }

    public function messages() {
        return[
            'nome.required' => 'O campo nome é obrigatório.',
            'email.required' => 'O campo e-mail é obrigatório.',
            'endereco.required' => 'O campo endereço é obrigatório.',
            'cpf.required' => 'O campo CPF é obrigatório.',
            'rg.required' => 'O campo RG é obrigatório.',
            'cidade.required' => 'O campo cidade é obrigatório.',
            'cep.required' => 'O campo cep é obrigatório.',
            'contato.required' => 'O campo contato é obrigatório.',
            'dataNasc.required' => 'O campo data de nascimento é obrigatório.',
            'noCarteiraTrab.required' => 'O campo número da carteira de trabalho é obrigatório.',
            'email.regex' => 'Inclua um e-mail válido.',
            'endereco.regex' => 'Inclua um enderaço válido.',
            'cpf.regex' => 'Inclua um CPF válido.',
            'rg.regex' => 'Inclua um RG válido.',
            'cidade.regex' => 'Inclua um nome de cidade válido.',
            'cep.regex' => 'Inclua um cep válido.',
            'contato.regex' => 'Inclua um número de telefone válido.',
            'noCarteiraTrab.regex' => 'Inclua um número válido.',
            'dataNasc.before' => 'Inclua uma data válida.',
        ];

    }
}
