<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFuncionarioModalidadeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcionario_modalidade', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('funcionario_id');
            $table->foreign('funcionario_id')->references('id')->on('funcionarios');
            $table->unsignedBigInteger('modalidade_id');
            $table->foreign('modalidade_id')->references('id')->on('modalidades');
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
        Schema::dropIfExists('funcionario_modalidade');
    }
}
