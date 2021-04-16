<?php

namespace App\Http\Controllers\EDance;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMatriculaRequest;
use App\Models\Aluno;
use App\Models\Matricula;
use App\Models\MatriculaTurma;
use App\Models\Modalidade;
use App\Models\Turma;
use App\Models\Usuario;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class MatriculaController extends Controller
{
    use DatabaseTransactions;


    public function criar_matricula_aluno(Request $request)
    {
        $aluno = Usuario::where('email', '=', $request->input('email'))->firstOrFail();

        $turma = Turma::where('id', (int)$request->input('turma_id'))->first();

        $matriculas = DB::table('alunos')
            ->join('matriculas', 'matriculas.aluno_id', 'alunos.id')
            ->where('alunos.id', '=', (int)($aluno->usuable_id))
            ->where('matriculas.deleted_at', '=', NULL)
            ->count('matriculas.id');

        $qntModalidades = Aluno::where('id', (int)($aluno->usuable_id))->value('qntModalidades');

        if (count($turma->matriculas) >= $turma->qntAlunos) {
            return "Não há mais vagas nessa turma.";
        } else if ((int)$matriculas >= (int)$qntModalidades) {
            return "Atualizar o número de modalidades em que o aluno pretende se matricular.";
        } else {
            $matricula = Matricula::create([
                "aluno_id" => $aluno->usuable_id,
                "qntMeses" => $request->input('qntMeses'),
                "taxaMatricula" => $request->input('taxaMatricula'),
                "dataMatricula" => new Carbon(),
            ]);

            MatriculaTurma::create([
                "matricula_id" => $matricula->id,
                "modalidade_id" => $request->input('modalidade_id'),
                "turma_id" => $request->input('turma_id'),
            ]);

            return 1;
        }
    }


    public function salvar(StoreMatriculaRequest $request)
    {
        //MatriculaController::validator($request);
        $response = MatriculaController::criar_matricula_aluno($request);
        if ($response == 1) {
            return view('matricula.sucessoMatricula', [
                "usno" => $request->input('nome')
            ]);
        } else {
            echo $response;
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (isset($_GET['consulta'])) {
            $textoConsulta = $_GET['consulta'];
            $alunos = DB::table('usuarios')
                ->join('alunos', 'usuarios.usuable_id', '=', 'alunos.id')
                ->join('matriculas', 'alunos.id', '=', 'matriculas.aluno_id')
                ->join('matricula_turma', 'matriculas.id', '=', 'matricula_turma.matricula_id')
                ->join('modalidades', 'matricula_turma.modalidade_id', '=', 'modalidades.id')
                ->select('usuarios.*', 'matricula_turma.*', 'modalidades.nome as nomeModalidade')
                ->where('usuarios.nome', 'LIKE', '%' . $textoConsulta . '%')
                ->where('usuarios.deleted_at', '=', NULL)
                ->where('usuable_type', '=', 'App\Models\Aluno')
                ->paginate(30);

            return view('matricula.procuraMatricula', ['alunos' => $alunos]);
        } else {
            return view('matricula.procuraMatricula');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('matricula.matricula');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'body' => 'required',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$matricula = DB::table('matriculas')->where('aluno_id', '=', $id)->firstOrFail();
        $matricula = Matricula::where('id', '=', $id)->first();
        return view('matricula.procuraMatricula', ['matricula' => $matricula]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //dd(Usuario::all());
        //$aluno = Usuario::where('usuable_id',(int)$id)->where('usuable_type', Aluno::class)->first();
        //dd($aluno);
        $matricula = Matricula::where('id', '=', $id)->first();
        $aluno = DB::table('usuarios')
            ->join('alunos', 'usuarios.usuable_id', '=', 'alunos.id')
            ->join('matriculas', 'alunos.id', '=', 'matriculas.aluno_id')
            ->where('usuarios.usuable_type', '=', Aluno::class)
            ->where('matriculas.id', '=', $id)
            ->where('usuarios.deleted_at', '=', NULL)
            ->select('usuarios.*')->first();
        //->where('usuable_id',(int)$id)->where('usuable_type', Aluno::class)->first();
        $matriculaTurma = MatriculaTurma::where('matricula_id', '=', $id)->first();
        $modalidade = Modalidade::where('id', '=', (int)$matriculaTurma->modalidade_id)->first();
        $turma = Turma::where('id', '=', (int)$matriculaTurma->turma_id)->first();
        return view('matricula.editeMatricula', ['aluno' => $aluno, 'matricula' => $matricula, 'matriculaTurma' => $matriculaTurma, 'modalidade' => $modalidade, 'turma' => $turma]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreMatriculaRequest $request, $id)
    {
        $aluno = Usuario::where('email', '=', $request->input('email'))->firstOrFail();
        $alunos = DB::table('turmas')->join('matricula_turma', 'matricula_turma.turma_id', '=', 'turmas.id')
            ->join('matriculas', 'matriculas.id', 'matricula_turma.matricula_id')
            ->where('turmas.id', '=', (int)$request->input('turma_id'))->where('matriculas.deleted_at', '=', NULL)
            ->count('matriculas.id');
        $qntAlunos = DB::table('turmas')->where('id', (int)$request->input('turma_id'))->value('qntAlunos');

        $matriculas = DB::table('alunos')
            ->join('matriculas', 'matriculas.aluno_id', 'alunos.id')
            ->where('alunos.id', '=', (int)($aluno->usuable_id))->where('matriculas.deleted_at', '=', NULL)
            ->count('matriculas.id');
        $qntModalidades = Aluno::where('id', (int)($aluno->usuable_id))->value('qntModalidades');

        if ((int)$alunos >= (int)$qntAlunos) {
            return "Não há mais vagas nessa turma.";
        } else if ((int)$matriculas >= (int)$qntModalidades) {
            return "Atualizar o número de modalidades em que o aluno pretende se matricular.";
        } else {
            $matricula = Matricula::where('id', '=', $id)->first();
            $matriculaTurma = MatriculaTurma::where('matricula_id', '=', $id)->first();

            $matricula->update([
                'qntMeses' => $request->qntMeses,
                'taxaMatricula' => $request->taxaMatricula,
            ]);

            $matriculaTurma->update([
                'modalidade_id' => $request->modalidade_id,
                'turma_id' => $request->turma_id,
            ]);

            return "Matrícula de aluno atualizada com sucesso!";
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $matricula = Matricula::where('id', '=', $id)->first();
        return view('matricula.excluiMatricula', ['matricula' => $matricula]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $matricula = Matricula::where('id', '=', $id)->first();
        $matriculaTurma = MatriculaTurma::where('matricula_id', '=', $id)->first();
        $matriculaTurma->delete();
        $matricula->delete();
        return "Matrícula de aluno excluída com sucesso!";
    }


}
