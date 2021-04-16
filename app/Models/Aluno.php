<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Usuario; 
use App\Models\Matricula;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Aluno extends Model
{
    use SoftDeletes;
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'qntModalidades'
    ];

    protected $dates = [
        'deleted_at'
    ];

    public function usuario(){
        return $this->morphOne(Usuario::class, 'usuable');
    }
    
    public function matricula() {
        return $this->hasMany(Matricula::class);
    }

}
