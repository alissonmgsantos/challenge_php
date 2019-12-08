<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FuncionariosPostosDeTrabalho extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcionarios_postos_de_trabalho', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_funcionario');
            $table->foreign('id_funcionario')->references('id')->on('funcionarios')
            ->onDelete('cascade');
            $table->unsignedBigInteger('id_posto_de_trabalho');
            $table->foreign('id_posto_de_trabalho')->references('id')->on('postos_de_trabalho')
            ->onDelete('cascade');

            $table->date('data_inicio')->default(Carbon::now());
            $table->date('data_expiracao');
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
        Schema::dropIfExists('funcionarios_postos_de_trabalho');
    }
}
