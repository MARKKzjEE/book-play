<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePistaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pista', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->string('superficie');
            $table->string('cerramiento');
            $table->string('pared');
            $table->unsignedInteger('id_deporte');
            $table->unsignedInteger('id_club')->nullable();
            //$table->foreign('id_club')->references('id')->on('establecimiento');
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
        Schema::dropIfExists('pista');
    }
}
