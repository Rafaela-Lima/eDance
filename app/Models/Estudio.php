<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Turma;

class Estudio extends Model
{
    use SoftDeletes;
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome'
    ];

    protected $dates = [
        'deleted_at'
    ];

    public function turma() {
        return $this->hasMany(Turma::class);
    }

    public static function criar_estudio() {
        Estudio::create ([
            'nome' => 'Estudio1',
        ]);
        Estudio::create ([
            'nome' => 'Estudio2',
        ]);
        Estudio::create ([
            'nome' => 'Estudio3',
        ]);
        Estudio::create ([
            'nome' => 'Estudio4',
        ]);
    }
}
