<?php

namespace App\Http\Controllers\EDance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Usuario; 
use App\Models\Funcionario; 
use App\Models\FuncionarioModalidade; 
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\DB;
use Hash;
use Carbon\Carbon;
use App\Http\Requests\StoreFuncionarioRequest;
use App\Http\Requests\StoreUpdateFuncionarioRequest;
use App\Http\Requests\StoreUserRequest;

class FuncionarioController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(isset($_GET['consulta'])) {
            $textoConsulta = $_GET['consulta'];
            $funcionarios = DB::table('usuarios')
            ->join('funcionarios', 'usuarios.usuable_id', '=', 'funcionarios.id')
            ->select('usuarios.*', 'funcionarios.*')
            ->where('nome', 'LIKE', '%'.$textoConsulta. '%')
            ->where('usuable_type', '=', 'App\Models\Funcionario')
            ->where('usuarios.deleted_at', '=', NULL )->paginate(30);
            return view ('usuario.funcionario.buscaFuncionario', ['funcionarios' => $funcionarios]);
        }
        else {
            return view ('usuario.funcionario.buscaFuncionario');
        }
    }


    public function criar_usuario_funcionario(StoreFuncionarioRequest $request) {
        $funcionario = Funcionario::create($request->all());

        $usuario = Usuario::create([
            "usuable_id" => $funcionario->id,
            "usuable_type" => Funcionario::class,
            "nome" => $request->input('nome'),
            "email" => $request->input('email'),
            "senha" => Hash::make($request->input('senha')),
            "endereco" => $request->input('endereco'),
            "cpf" => $request->input('cpf'),
            "rg" => $request->input('rg'),
            "cidade" => $request->input('cidade'),
            "cep" => $request->input('cep'),
            "contato" => $request->input('contato'),
            "dataNasc" => $request->input('dataNasc'),
            "dataInicio" => new Carbon(),
        ]);

        return 1;
    }

    public function definir_modalidade_professor(StoreFuncionarioRequest $request) {
        $funcionarioModalidade = FuncionarioModalidade::create([
            "funcionario_id" => $request->input('noCarteiraTrab'),
            "modalidade_id" => $request->input('modalidade_id'),
        ]);

        return 1;
    }

  
    public function vincularProfessor()
    {
        return view('usuario.funcionario.vincularProfessor');
    }

    public function salvarProfessor(StoreUserRequest $request) {

        //FuncionarioController::validator($request);
        // recebe os dados
        
        if (FuncionarioController::definir_modalidade_professor($request) == 1) {

            return view('usuario.funcionario.sucessoProfessor', [ 
            "usno"=> $request->input('nome')
            ]);
        }
        else {

            echo "Ops! Falha no cadastro! Por gentileza, tente novamente!";
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuario.funcionario.cadastro');
    }

    public function salvar(StoreFuncionarioRequest $request) {

        //FuncionarioController::validator($request);
        // recebe os dados
        
        if (FuncionarioController::criar_usuario_funcionario($request) == 1) {

            return view('usuario.funcionario.sucesso', [ 
            "usno"=> $request->input('nome')
            ]);
        }
        else {

            echo "Ops! Falha no cadastro! Por gentileza, tente novamente!";
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $funcionario = Funcionario::findOrFail($id);
        $usuario = $funcionario->usuario;
        return view ('usuario.funcionario.buscaFuncionario', ['funcionario' => $funcionario, 'usuario' => $usuario]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $funcionario = Funcionario::findOrFail($id);
        $usuario = $funcionario->usuario;
        return view ('usuario.funcionario.editeFuncionario', ['funcionario' => $funcionario, 'usuario' => $usuario]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateFuncionarioRequest $request, $id)
    {
        $funcionario = Funcionario::findOrFail($id);
        $usuario = $funcionario->usuario;

        $funcionario->update([
            'noCarteiraTrab' => $request->noCarteiraTrab,
        ]);

        $usuario->update([
            'nome' => $request->nome,
            'email' => $request->email,
            'endereco' => $request->endereco,
            'cpf' => $request->cpf,
            'rg' => $request->rg,
            'cidade' => $request->cidade,
            'cep' => $request->cep,
            'contato' => $request->contato,
            'dataNasc' => $request->dataNasc,
        ]);

        return "Cadastro de funcionário atualizado com sucesso!";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $funcionario = Funcionario::findOrFail($id);
        $usuario = $funcionario->usuario;
        return view ('usuario.funcionario.excluiFuncionario',  ['funcionario' => $funcionario, 'usuario' => $usuario]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $funcionario = Funcionario::findOrFail($id);
        $usuario = $funcionario->usuario;
        $funcionario->delete();
        $usuario->delete();
        return "Cadastro de funcionário excluído com sucesso!";   
    }
}
