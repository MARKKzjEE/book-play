<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicio', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->unsignedBigInteger('id_imagen')->nullable();
            $table->foreign('id_imagen')->references('id')->on('archivo');
            $table->timestamps();
        });

        DB::table('servicio')->insert(
            array(
                'nombre' => 'Vestuarios'
            )
        );

        DB::table('servicio')->insert(
            array(
                'nombre' => 'Parking gratuito'
            )
        );
        DB::table('servicio')->insert(
            array(
                'nombre' => 'Alquiler de material'
            )
        );
        DB::table('servicio')->insert(
            array(
                'nombre' => 'Wifi'
            )
        );
        DB::table('servicio')->insert(
            array(
                'nombre' => 'Taquillas'
            )
        );
        DB::table('servicio')->insert(
            array(
                'nombre' => 'Restaurante'
            )
        );
        DB::table('servicio')->insert(
            array(
                'nombre' => 'Cafetería'
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('servicio');
    }
}
