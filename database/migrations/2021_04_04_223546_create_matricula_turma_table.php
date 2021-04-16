<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatriculaTurmaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matricula_turma', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('matricula_id');
            $table->foreign('matricula_id')->references('id')->on('matriculas');
            $table->unsignedBigInteger('modalidade_id');
            $table->foreign('modalidade_id')->references('id')->on('modalidades');
            $table->unsignedBigInteger('turma_id');
            $table->foreign('turma_id')->references('id')->on('turmas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matricula_turma');
    }
}
