<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiciosEstablecimentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicios_establecimento', function (Blueprint $table) {
            $table->timestamps();
            $table->unsignedBigInteger('id_servicio');
            $table->unsignedBigInteger('id_club');
            $table->primary(['id_servicio','id_club']);
            $table->foreign('id_servicio')->references('id')->on('servicio');
            $table->foreign('id_club')->references('id')->on('establecimiento');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('servicios_establecimento');
    }
}
