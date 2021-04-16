<?php

namespace App\Http\Controllers\EDance;

use App\Models\Estudio; 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\DB;
use Hash;
use Carbon\Carbon;
use App\Http\Requests\StoreEstudioRequest;
use App\Http\Requests\StoreUpdateEstudioRequest;

class EstudioController extends Controller
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
            $estudios = DB::table('estudios')->where('nome', 'LIKE', '%'.$textoConsulta. '%')->where('deleted_at', '=', NULL )->paginate(30);
            return view ('estudio.buscaEstudio', ['estudios' => $estudios]);
        }
        else {
            return view ('estudio.buscaEstudio');
       
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('estudio.registrarEstudio'); 
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
        $estudio = Estudio::findOrFail($id);
        return view ('estudio.buscaEstudio', ['estudio' => $estudio]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $estudio = Estudio::findOrFail($id);
        return view ('estudio.editeEstudio',  ['estudio' => $estudio]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateEstudioRequest $request, $id)
    {
        $estudio = Estudio::findOrFail($id);

        $estudio->update([
            'nome' => $request->nome,
        ]);

        return "Estúdio atualizado com sucesso!";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $estudio = Estudio::findOrFail($id);
        return view ('estudio.excluiEstudio', ['estudio' => $estudio]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $estudio = Estudio::findOrFail($id);
        $estudio->delete();
        return "Estúdio excluído com sucesso!";
    }

    use DatabaseTransactions;


    public function criar_estudio(StoreEstudioRequest $request) {

        $estudio = Estudio::create($request->all());
        return 1;
    }


    public function salvarEstudio(StoreEstudioRequest $request) {
        if (EstudioController::criar_estudio($request) == 1) {

            return view('estudio.sucessoEstudio', [ 
            "usno"=> $request->input('nome')
            ]);
        }
        else {
            
            echo "Ops! Falha no registro! Por gentileza, tente novamente!";
        }
    }

}
