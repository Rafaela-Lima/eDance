<?php

namespace App\Http\Controllers\EDance;

use App\Models\Usuario; 
use App\Models\Modalidade; 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\DB;
use Hash;
use Carbon\Carbon;
use App\Http\Requests\StoreModalidadeRequest;
use App\Http\Requests\StoreUpdateModalidadeRequest;


class ModalidadeController extends Controller
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
            $modalidades = DB::table('modalidades')->where('nome', 'LIKE', '%'.$textoConsulta. '%')->where('deleted_at', '=', NULL )->paginate(30);
            return view ('modalidade.buscaModalidade', ['modalidades' => $modalidades]);
        }
        else {
            return view ('modalidade.buscaModalidade');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modalidade.registrarModalidade'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|max:255',
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
        $modalidade = Modalidade::findOrFail($id);
        return view ('modalidade.buscaModalidade', ['modalidade' => $modalidade]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $modalidade = Modalidade::findOrFail($id);
        return view ('modalidade.editeModalidade',  ['modalidade' => $modalidade]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateModalidadeRequest $request, $id)
    {
        $modalidade = Modalidade::findOrFail($id);

        $modalidade->update([
            'nome' => $request->nome,
            'valorMensalidade' => $request->valorMensalidade,
        ]);

        return "Modalidade atualizada com sucesso!";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $modalidade = Modalidade::findOrFail($id);
        return view ('modalidade.excluiModalidade', ['modalidade' => $modalidade]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $modalidade = Modalidade::findOrFail($id);
        $modalidade->delete();
        return "Modalidade excluída com sucesso!";
    }

    use DatabaseTransactions;


    public function criar_modalidade(StoreModalidadeRequest $request) {

        $modalidade = Modalidade::create($request->all());
        return 1;
        //ddd($usuario);
    }


    public function salvarModalidade(StoreModalidadeRequest $request) {
        if (ModalidadeController::criar_modalidade($request) == 1) {

            return view('modalidade.sucessoModalidade', [ 
            "usno"=> $request->input('nome')
            ]);
        }
        else {
            
            echo "Ops! Falha no registro! Por gentileza, tente novamente!";
        }
    }

}
