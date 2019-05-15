<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeportesEstablecimentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deportes_establecimento', function (Blueprint $table) {
            $table->timestamps();
            $table->unsignedBigInteger('id_deporte');
            $table->unsignedBigInteger('id_club');
            $table->primary(['id_deporte','id_club']);
            $table->foreign('id_deporte')->references('id')->on('deporte');
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
        Schema::dropIfExists('deportes_establecimento');
    }
}
