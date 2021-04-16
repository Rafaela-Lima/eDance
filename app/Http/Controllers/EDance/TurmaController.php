<?php

namespace App\Http\Controllers\EDance;

use App\Models\Turma; 
use App\Models\Modalidade; 
use App\Models\Estudio; 
use App\Models\Funcionario; 
use App\Models\Usuario; 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreTurmaRequest;
use App\Http\Requests\StoreUpdateTurmaRequest;

class TurmaController extends Controller
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
            $turmas = DB::table('turmas')->where('nome', 'LIKE', '%'.$textoConsulta. '%')->where('deleted_at', '=', NULL )->paginate(30);
            return view ('turma.buscaTurma', ['turmas' => $turmas]);
        }
        else {
            return view ('turma.buscaTurma');
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $funcionarios = Funcionario::where('categoria', '=', 'p')->where('funcionarios.deleted_at', '=', NULL)->join('usuarios', 'usuarios.usuable_id', 'funcionarios.id')->where('usuarios.usuable_type', '=', Funcionario::class)->select('usuarios.*')->get();
        return view('turma.registrarTurma', ['funcionarios' => $funcionarios]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //Mudar pra StoreTurmaRequest? 
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|unique:posts|max:255',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $turma = Turma::findOrFail($id);
        return view ('turma.buscaTurma', ['turma' => $turma]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $turma = Turma::findOrFail($id);
        $modalidade = Modalidade::where('id', '=', (int)$turma->modalidade_id)->first();
        $professor = Usuario::where('usuable_id', '=', (int)$turma->funcionario_id)->where('usuable_type', '=', Funcionario::class)->first();
        $estudio = Estudio::where('id', '=', (int)$turma->estudio_id)->first();
        $funcionarios = Funcionario::where('categoria', '=', 'p')->where('funcionarios.deleted_at', '=', NULL)->join('usuarios', 'usuarios.usuable_id', 'funcionarios.id')->where('usuarios.usuable_type', '=', Funcionario::class)->select('usuarios.*')->get();
        return view ('turma.editeTurma',  ['turma' => $turma, 'modalidade' => $modalidade, 'professor' => $professor, 'estudio' => $estudio, 'funcionarios' => $funcionarios]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateTurmaRequest $request, $id)
    {
        $t = DB::table('turmas')->where('horario', '=', $request->input('horario'))->where('estudio_id', '=', $request->input('estudio_id'))->where('id', '<>',$id)->first();
        if (isset($t)){
            return "O estúdio escolhido está ocupado nesse horário, por favor escolha outro horário ou outro estúdio.";
        }
        else {
            $turma = Turma::findOrFail($id);

            $turma->update([
                'modalidade_id'=> $request->modalidade_id,
                'estudio_id' => $request->estudio_id,
                'funcionario_id' => $request->funcionario_id,
                'nome' => $request->nome,
                'nivel' => $request->nivel,
                'faixaEtaria' => $request->faixaEtaria,
                'qntAlunos' => $request->qntAlunos,
                'horario' => $request->horario,
            ]);

            return "Turma atualizada com sucesso!";
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $turma = Turma::findOrFail($id);
        return view ('turma.excluiTurma', ['turma' => $turma]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $turma = Turma::findOrFail($id);
        $turma->delete();
        return "Turma excluída com sucesso!";
    }

    use DatabaseTransactions;


    public function criar_turma(StoreTurmaRequest $request) {

        $t = Turma::where('horario', '=', $request->input('horario'))->where('estudio_id', '=', $request->input('estudio_id'))->first();
        if (isset($t)){
            echo 'O estúdio escolhido está ocupado nesse horário, por favor escolha outro horário ou outro estúdio.';
        }
        else{
            $turma = Turma::create($request->all());
            return 1;
        }
        //ddd($usuario);
    }


    public function salvarTurma(StoreTurmaRequest $request) {
        if (TurmaController::criar_turma($request) == 1) {

            return view('turma.sucessoTurma', [ 
            "usno"=> $request->input('nome')
            ]);
        }
        else {
            
            echo "Ops! Falha no registro! Por gentileza, tente novamente!";
        }
    }

}
