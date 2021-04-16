<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Usuario; 
use App\Models\Modalidade;
use App\Models\FuncionarioModalidade;
use App\Models\Turma;  
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Carbon\Carbon;

class Funcionario extends Model
{
    use HasFactory;
    use SoftDeletes;


    /*
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'noCarteiraTrab',
        'categoria'
    ];
    

    protected $dates = [
        'deleted_at'
    ];

    public function usuario(){
        return $this->morphOne(Usuario::class, 'usuable');
    }

    public function modalidade() {
        return $this->belongsToMany(Modalidade::class,'funcionario_modalidades', 'funcionario_id', 'modalidade_id')->using(FuncionarioModalidade::class);
    }

    public function turma() {
        return $this->hasMany(Turma::class);
    }

    public static function criar_funcionario()
    {
        $funcionario = Funcionario::create([
            'noCarteiraTrab'=> '15848-21',
            'categoria' => 'f'
        ]);
        $usuario = Usuario::create([
            "usuable_id" => $funcionario->id,
            "usuable_type" => Funcionario::class,
            'nome' => 'Denise Alessi',
            'email' => 'deni@alessi.com',
            'senha' => '1245451as',
            'endereco' => 'Rua Principal, 15',
            'cpf' => '125.816.145-25',
            'rg'=> '14.874.166-15',
            'cidade'=> 'Guarapuava',
            'cep' => '87120-58',
            'contato' => '998541224',
            'dataNasc' => "1971-05-12",
            'dataInicio' => new Carbon()
        ]);

        $funcionario1 = Funcionario::create([
            'noCarteiraTrab'=> '18745-17',
            'categoria' => 'p'
        ]);
        $usuario1 = Usuario::create([
            "usuable_id" => $funcionario1->id,
            "usuable_type" => Funcionario::class,
            'nome' => 'Alex Santos',
            'email' => 'alex@santos.com',
            'senha' => '124514sdsds',
            'endereco' => 'Rua Doze, 78',
            'cpf' => '152.853.147-76',
            'rg'=> '13.877.156-13',
            'cidade'=> 'Guarapuava',
            'cep' => '92720-58',
            'contato' => '997543547',
            'dataNasc' => "1980-02-15",
            'dataInicio' => new Carbon()
        ]);

        $funcionario2 = Funcionario::create([
            'noCarteiraTrab'=> '122062-02',
            'categoria' => 'p'
        ]);
        $usuario2 = Usuario::create([
            "usuable_id" => $funcionario2->id,
            "usuable_type" => Funcionario::class,
            'nome' => 'Luana Simas',
            'email' => 'luana@simas.com',
            'senha' => '124514sfdff54s',
            'endereco' => 'Rua Calses, 45',
            'cpf' => '445.512.548-08',
            'rg'=> '51.554.255-15',
            'cidade'=> 'Guarapuava',
            'cep' => '91545-16',
            'contato' => '99484548',
            'dataNasc' => "1988-04-25",
            'dataInicio' => new Carbon()
        ]);

        $funcionario3 = Funcionario::create([
            'noCarteiraTrab'=> '415151-18',
            'categoria' => 'p'
        ]);
        $usuario3 = Usuario::create([
            "usuable_id" => $funcionario3->id,
            "usuable_type" => Funcionario::class,
            'nome' => 'Chris Lens',
            'email' => 'chris@lens.com',
            'senha' => '55ddbhbf15s',
            'endereco' => 'Rua Balsa, 58',
            'cpf' => '482.563.151-98',
            'rg'=> '16.511.348-38',
            'cidade'=> 'Guarapuava',
            'cep' => '86246-12',
            'contato' => '999856555',
            'dataNasc' => "1995-10-15",
            'dataInicio' => new Carbon()
        ]);
    }  
}
