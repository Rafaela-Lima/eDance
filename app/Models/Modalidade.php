<?php

namespace App\Models;
use App\Models\Funcionario;
use App\Models\Turma; 
use App\Models\FuncionarioModalidade;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modalidade extends Model
{
    use SoftDeletes;
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome',
        'valorMensalidade'
    ];

    protected $dates = [
        'deleted_at'
    ];

    public function funcionario() {
        return $this->belongsToMany(Funcionario::class, 'funcionario_modalidades', 'funcionario_id', 'modalidade_id')->using(FuncionarioModalidade::class);
    }

    public function turma() {
        return $this->hasMany(Turma::class);
    }

    public static function criar_modalidade() {
        Modalidade::create ([
            'nome' => 'Balé',
            'valorMensalidade' => 155.00
        ]);
        Modalidade::create ([
            'nome' => 'Dança Contemporânea',
            'valorMensalidade' => 195.00
        ]);
        Modalidade::create ([
            'nome' => 'Dança do Ventre',
            'valorMensalidade' => 189.00
        ]);
        Modalidade::create ([
            'nome' => 'Jazz',
            'valorMensalidade' => 234.00
        ]);
        Modalidade::create ([
            'nome' => 'Stiletto',
            'valorMensalidade' => 161.00
        ]);
    }
   
}
