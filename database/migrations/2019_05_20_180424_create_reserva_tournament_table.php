<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservaTournamentTable extends Migration
{
    /**
     * Crea una tabla reserva_torunament con la información
     * de las inscripciones de un usuario sobre un torneo.
     *
     * @author ismaelsanchezf
     * @author albertfor
     * @return void
     */
    public function up()
    {
        Schema::create('reserva_tournament', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_tournament');
            $table->integer('id_usuario');
            $table->integer('num_inscripciones');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reserva_tournament');
    }
}
