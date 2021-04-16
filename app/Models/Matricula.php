<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Aluno;
use App\Models\Turma; 
use App\Models\MatriculaTurma; 
use Illuminate\Database\Eloquent\SoftDeletes;


class Matricula extends Model
{
    use SoftDeletes;
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'aluno_id',
        'qntMeses',
        'dataMatricula',
        'taxaMatricula'
    ];

    protected $dates = [
        'deleted_at'
    ];

    public function aluno () {
        return $this->belongsTo(Aluno::class);
    }

    public function turmas() {
        return $this->belongsToMany(Turma::class, 'matricula_turma', 'matricula_id', 'turma_id')->using(MatriculaTurma::class);
    }

}
