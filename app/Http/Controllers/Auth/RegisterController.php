<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Usuario;
use App\Models\Funcionario;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Rules\FullName;
use Carbon\Carbon;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nome' => ['required', 'unique:usuarios', new FullName],
            'email' => ['required','unique:usuarios','max:255','regex:/^.+@.+$/i'],
            'endereco' => ['required', 'unique:usuarios', 'regex:/^[A-Z][a-z]+ | [A-Z][a-z]+, [0-9]+$/i'],
            'senha' => ['required','confirmed','min:8','regex:/^[A-Z][0-9][a-z]|[0-9][A-Z][a-z]|[0-9][a-z][A-Z]|[A-Z][0-9][A-Z]|[0-9][A-Z]|[A-Z][0-9]|[A-Z][a-z][0-9]|[a-z][A-Z][0-9]|[a-z][0-9][A-Z]|[A-Z][0-9]|[A-Z][0-9][A-Z]|[0-9][A-Z]$/i'],
            'cpf' => ['required','unique:usuarios','regex:/^[0-9]{3}.[0-9]{3}.[0-9]{3}-[0-9]{2}$/i'],
            'rg' => ['required', 'unique:usuarios', 'regex:/^[0-9]{2}.[0-9]{3}.[0-9]{3}-[0-9]{1}$/i'],
            'cidade' => ['required','regex:/^[A-Z][a-z]+|[A-Z][a-z]+$/i'],
            'cep' => ['required', 'regex:/^[0-9]{5}-[0-9]{3}$/i'],
            'contato' => ['required', 'unique:usuarios', 'regex:/^.[0-9]{2}.9[0-9]{4}-[0-9]{4}$/i'],
            'dataNasc' => 'required|date|before:today',
            'noCarteiraTrab' => ['required', 'unique:funcionarios', 'regex:/^[0-9]{7} [0-9]{3}-[0-9]{1}$/i'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $funcionario = Funcionario::create([
            "noCarteiraTrab" => $data['noCarteiraTrab'],
            "categoria" => $data['categoria'],
        ]);

        $usuario = Usuario::create([
            "usuable_id" => $funcionario->id,
            "usuable_type" => Funcionario::class,
            "nome" => $data['nome'],
            "email" => $data['email'],
            "senha" => Hash::make($data['senha']),
            "endereco" => $data['endereco'],
            "cpf" => $data['cpf'],
            "rg" => $data['rg'],
            "cidade" => $data['cidade'],
            "cep" => $data['cep'],
            "contato" => $data['contato'],
            "dataNasc" => $data['dataNasc'],
            "dataInicio" => new Carbon(),
        ]);

        return User::create([
            'name' => $data['nome'],
            'email' => $data['email'],
            'password' => Hash::make($data['senha']),
        ]);
    }
}
