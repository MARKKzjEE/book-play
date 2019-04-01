<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstablecimientoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('establecimiento', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('mail')->unique();
            $table->string('nombre');
            $table->string('direccion');
            $table->integer('codigo_postal');
            $table->integer('telefono');
            $table->integer('prioridad');
            $table->string('geolocalizacion');
            $table->unsignedInteger('imagen_perfil');
            $table->unsignedInteger('id_galeria')->nullable();
            //$table->foreign('imagen_perfil')->references('id')->on('archivo');
            //$table->foreign('id_galeria')->references('id')->on('galeria');
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
        Schema::dropIfExists('establecimiento');
    }
}
