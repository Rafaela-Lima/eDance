<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTurmasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('turmas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('modalidade_id');
            $table->foreign('modalidade_id')->references('id')->on('modalidades');
            $table->unsignedBigInteger('estudio_id');
            $table->foreign('estudio_id')->references('id')->on('estudios');
            $table->unsignedBigInteger('funcionario_id');
            $table->foreign('funcionario_id')->references('id')->on('funcionarios');
            $table->string('nome')->unique();
            $table->enum('nivel', ['baixo', 'médio', 'alto']);
            $table->enum('faixaEtaria', ['crianças', 'adolescentes', 'jovens', 'adultos', 'idosos']);
            $table->integer('qntAlunos');
            $table->time('horario');
            $table->engine = 'InnoDB';
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
        Schema::dropIfExists('turmas');
    }
}
