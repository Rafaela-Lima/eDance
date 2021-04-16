<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Turma extends Model
{
    use SoftDeletes;
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'modalidade_id',
        'estudio_id',
        'funcionario_id',
        'nome',
        'nivel',
        'faixaEtaria',
        'qntAlunos',
        'horario'
    ];

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'codTurma';


    protected $dates = [
        'deleted_at'
    ];

    public function matriculas()
    {
        return $this->hasMany(MatriculaTurma::class, 'turma_id', 'id');
        //return $this->belongsToMany(Matricula::class, 'matricula_turma', 'matricula_id', 'turma_id')->using(MatriculaTurma::class);
    }

    public function modalidade()
    {
        return $this->belongsTo(Modalidade::class, 'modalidade_id');
    }

    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class, 'funcionario_id');
    }

    public function estudio()
    {
        return $this->belongsTo(Estudio::class, 'estudio_id');
    }

    public static function criar_turma()
    {
        Turma::create([
            'modalidade_id' => 1,
            'estudio_id' => 1,
            'funcionario_id' => 4,
            'nome' => 'Turma A - Balé',
            'nivel' => 'alto',
            'faixaEtaria' => 'jovens',
            'qntAlunos' => 20,
            'horario' => '08:00:00',
        ]);
        Turma::create([
            'modalidade_id' => 2,
            'estudio_id' => 2,
            'funcionario_id' => 5,
            'nome' => 'Turma A - Dança Contemporânea',
            'nivel' => 'médio',
            'faixaEtaria' => 'adolescentes',
            'qntAlunos' => 20,
            'horario' => '10:30:00',
        ]);
        Turma::create([
            'modalidade_id' => 3,
            'estudio_id' => 1,
            'funcionario_id' => 4,
            'nome' => 'Turma B - Dança do Ventre',
            'nivel' => 'baixo',
            'faixaEtaria' => 'crianças',
            'qntAlunos' => 20,
            'horario' => '15:30:00',
        ]);
        Turma::create([
            'modalidade_id' => 4,
            'estudio_id' => 2,
            'funcionario_id' => 6,
            'nome' => 'Turma A - Jazz',
            'nivel' => 'médio',
            'faixaEtaria' => 'adultos',
            'qntAlunos' => 30,
            'horario' => '14:00:00',
        ]);
        Turma::create([
            'modalidade_id' => 5,
            'estudio_id' => 3,
            'funcionario_id' => 6,
            'nome' => 'Turma A - Stiletto',
            'nivel' => 'médio',
            'faixaEtaria' => 'jovens',
            'qntAlunos' => 20,
            'horario' => '09:30:00',
        ]);
    }
}

