<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class FuncionarioModalidade extends Pivot
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'funcionario_id',
        'modalidade_id',
    ];
    /**
    * Indicates if the IDs are auto-incrementing.
    *
    * @var bool
    */
    public $incrementing = true;

    protected $table = 'funcionario_modalidade';
}
