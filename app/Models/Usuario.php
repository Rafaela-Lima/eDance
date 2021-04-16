<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Http\Request;
use Hash;
use Carbon\Carbon;

class Usuario extends Model
{
    use SoftDeletes;
    use HasFactory, Notifiable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'usuable_id',
        'usuable_type',
        'nome',
        'email',
        'senha',
        'endereco',
        'cpf',
        'rg',
        'cidade',
        'cep',
        'contato',
        'dataNasc',
        'dataInicio'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'senha',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    protected $dates = [
        'deleted_at'
    ];

    //Com o relacionamento de polimorfismo,
    //o model Usuario pode se tornar qualquer outro //model
    public function usuable(){ //se tornar um usuario
        return $this->morphTo();
    }


    public static function listar (int $limite) {
        $sql = self::select([
            "id",
            "nome",
            "email",
            "senha",
            "endereco",
            "cpf",
            "rg",
            "cidade",
            "cep",
            "contato",
            "dataNasc",
            "dataInicio"
        ])
        ->limit($limite);

        dd($sql->toSql());
    }


    protected function criar (Request $request)
    {
        //DB::enableQueryLog();
        return self::insert([
            //"usuable_id" => 1,
            //"usuable_type" => funciona::class,
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
    }

}
