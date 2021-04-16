<?php

namespace App\Http\Controllers\EDance;

use App\Models\Usuario;
use App\Models\Funcionario;
use App\Models\Aluno;
use App\Models\Turma;
use App\Models\Matricula;
use App\Models\MatriculaTurma;
use App\Models\Estudio;
use App\Models\Modalidade;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Hash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\StoreUpdateUserRequest;



class CadastroController extends Controller
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
            $alunos = DB::table('usuarios')->where('nome', 'LIKE', '%'.$textoConsulta. '%')->where('usuable_type', '=', 'App\Models\Aluno')->where('deleted_at', '=', NULL )->paginate(30);
            return view ('usuario.aluno.buscaAluno', ['alunos' => $alunos]);
        }
        else {
            return view ('usuario.aluno.buscaAluno');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuario.aluno.cadastroAluno');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $aluno = Aluno::findOrFail($id);
        $usuario = $aluno->usuario;
        return view ('usuario.aluno.buscaAluno', ['aluno' => $aluno, 'usuario' => $usuario]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $aluno = Aluno::findOrFail($id);
        $usuario = $aluno->usuario;
        return view ('usuario.aluno.editeAluno',  ['aluno' => $aluno, 'usuario' => $usuario]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateUserRequest $request, $id)
    {
        $aluno = Aluno::findOrFail($id);
        $usuario = $aluno->usuario;

        $aluno->update([
            'qntModalidades' => $request->qntModalidades,
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

        return "Cadastro de aluno atualizado com sucesso!";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $aluno = Aluno::findOrFail($id);
        $usuario = $aluno->usuario;
        $matriculas = DB::table('matriculas')->where('aluno_id', (int)$id)->get();
        return view ('usuario.aluno.excluiAluno',  ['aluno' => $aluno, 'usuario' => $usuario, 'matriculas' => $matriculas]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $aluno = Aluno::findOrFail($id);
        $usuario = $aluno->usuario;
        $matriculas = Matricula::where('aluno_id', (int)$id)->get();
        foreach($matriculas as $matricula) {
            $matricula->delete();
        }
        $aluno->delete();
        $usuario->delete();
        return "Cadastro de aluno excluído com sucesso!";
    }


    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;


    use DatabaseTransactions;


    public function criar_usuario_aluno(StoreUserRequest $request) {

        $aluno = aluno::create($request->all());
        $usuario = Usuario::create([
            "usuable_id" => $aluno->id,
            "usuable_type" => aluno::class,
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
        //ddd($usuario);
    }


    public function salvarAluno(StoreUserRequest $request) {

        //CadastroController::store($request);
        // recebe os dados
        //Modalidade::criar_modalidade();
        //Estudio::criar_estudio();
        //Funcionario::criar_funcionario();
        //Turma::criar_turma();
        //CadastroController::store($request);
        if (CadastroController::criar_usuario_aluno($request) == 1) {

            return view('usuario.aluno.sucessoAluno', [
            "usno"=> $request->input('nome')
            ]);
        }
        else {

            echo "Ops! Falha no cadastro! Por gentileza, tente novamente!";
        }
    }

}
