<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('usuable_id');
            $table->string('usuable_type');
            $table->string('nome')->unique();
            $table->string('email')->unique();
            $table->string('senha');
            $table->string('endereco')->unique();
            $table->string('cpf')->unique();
            $table->string('rg')->unique();
            $table->string('cidade');
            $table->string('cep');
            $table->string('contato');
            $table->date('dataNasc');
            $table->date('dataInicio');
            $table->engine = 'InnoDB';
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
