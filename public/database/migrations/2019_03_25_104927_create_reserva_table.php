<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reserva', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('fecha_reserva');
            $table->timestamp('hora_inicio')->nullable();
            $table->timestamp('hora_final')->nullable();
            $table->integer('sum_modulos');
            $table->integer('estado_reserva');
            $table->integer('estado_pago');
            $table->integer('id_pago');
            $table->float('cantidad');
            $table->string('descripcion');
            $table->unsignedInteger('id_usuario')->nullable();
            //$table->foreign('id_usuario')->references('id')->on('user');
            $table->unsignedInteger('id_pista')->nullable();
            //$table->foreign('id_pista')->references('id')->on('pista');
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
        Schema::dropIfExists('reserva');
    }
}
