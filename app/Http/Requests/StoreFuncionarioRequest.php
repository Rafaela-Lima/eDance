<?php

namespace App\Http\Requests;

use App\Rules\FullName;
use Illuminate\Foundation\Http\FormRequest;

class StoreFuncionarioRequest extends FormRequest
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

            'nome' => ['required', 'unique:usuarios', new FullName],
            'email' => ['required', 'unique:usuarios', 'max:255', 'regex:/^.+@.+$/i'],
            'endereco' => ['required', 'unique:usuarios', 'regex:/^[A-Z][a-z]+ | [A-Z][a-z]+, [0-9]+$/i'],
            'senha' => ['required', 'confirmed', 'min:8', 'regex:/^[A-Z][0-9][a-z]|[0-9][A-Z][a-z]|[0-9][a-z][A-Z]|[A-Z][0-9][A-Z]|[0-9][A-Z]|[A-Z][0-9]|[A-Z][a-z][0-9]|[a-z][A-Z][0-9]|[a-z][0-9][A-Z]|[A-Z][0-9]|[A-Z][0-9][A-Z]|[0-9][A-Z]$/i'],
            'cpf' => ['required', 'unique:usuarios', 'regex:/^[0-9]{3}.[0-9]{3}.[0-9]{3}-[0-9]{2}$/i'],
            'rg' => ['required', 'unique:usuarios', 'regex:/^[0-9]{2}.[0-9]{3}.[0-9]{3}-[0-9]{1}$/i'],
            'cidade' => ['required', 'regex:/^[A-Z][a-z]+|[A-Z][a-z]+$/i'],
            'cep' => ['required', 'regex:/^[0-9]{5}-[0-9]{3}$/i'],
            'contato' => ['required', 'unique:usuarios', 'regex:/^.[0-9]{2}.9[0-9]{4}-[0-9]{4}$/i'],
            'dataNasc' => 'required|date|before:today',
            'noCarteiraTrab' => ['required', 'unique:funcionarios'],
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O campo nome é obrigatório.',
            'email.required' => 'O campo e-mail é obrigatório.',
            'endereco.required' => 'O campo endereço é obrigatório.',
            'senha.required' => 'O campo senha é obrigatório.',
            'cpf.required' => 'O campo CPF é obrigatório.',
            'rg.required' => 'O campo RG é obrigatório.',
            'cidade.required' => 'O campo cidade é obrigatório.',
            'cep.required' => 'O campo cep é obrigatório.',
            'contato.required' => 'O campo contato é obrigatório.',
            'dataNasc.required' => 'O campo data de nascimento é obrigatório.',
            'noCarteiraTrab.required' => 'O campo número da carteira de trabalho é obrigatório.',
            'senha.confirmed' => 'O campo senha está diferente da confirmação.',
            'senha.regex' => 'Inclua uma senha que contenha letras e números e pelo menos uma letra maiúscula.',
            'senha.min' => 'A senha deve possuir no mínimo 8 caracteres.',
            'email.regex' => 'Inclua um e-mail válido.',
            'endereco.regex' => 'Inclua um enderaço válido.',
            'cpf.regex' => 'Inclua um CPF válido.',
            'rg.regex' => 'Inclua um RG válido.',
            'cidade.regex' => 'Inclua um nome de cidade válido.',
            'cep.regex' => 'Inclua um cep válido.',
            'contato.regex' => 'Inclua um número de telefone válido.',
            'noCarteiraTrab.regex' => 'Inclua um número válido.',
            'dataNasc.before' => 'Inclua uma data válida.',
            'nome.unique' => 'Já existe um cadastro com esse nome.',
            'email.unique' => 'Já existe um cadastro com esse email.',
            'endereco.unique' => 'Já existe um cadastro com esse endereço.',
            'cpf.unique' => 'Já existe um cadastro com esse CPF.',
            'rg.unique' => 'Já existe um cadastro com esse RG.',
            'contato.unique' => 'Já existe um cadastro com esse contato.',
            'noCarteiraTrab.unique' => 'Já existe um cadastro com esse número de carteira de trabalho.',


        ];

    }
}
