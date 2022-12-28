<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRealizasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('realizas', function (Blueprint $table) {

            $table->unsignedBigInteger('id_artista');
            $table->unsignedBigInteger('id_lanzamiento');

            $table->foreign('id_artista')->references('id')->on('artistas');
            $table->foreign('id_lanzamiento')->references('id')->on('lanzamientos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('realizas');
    }
}
