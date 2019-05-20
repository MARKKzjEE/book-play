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
            $table->string('id_imagen');
        });

        DB::table('servicio')->insert(
            array(
                'nombre' => 'Vestuarios',
                'id_imagen' => 'vestuario.png'
            )
        );

        DB::table('servicio')->insert(
            array(
                'nombre' => 'Parking gratuito',
                'id_imagen' => 'parking_gratuito.png'
            )
        );
        DB::table('servicio')->insert(
            array(
                'nombre' => 'Tienda de materiales',
                'id_imagen' => 'tienda.png'
            )
        );
        DB::table('servicio')->insert(
            array(
                'nombre' => 'Wifi',
                'id_imagen' => 'wifi.png'
            )
        );
        DB::table('servicio')->insert(
            array(
                'nombre' => 'Taquillas de seguridad',
                'id_imagen' => 'taquillas.png'
            )
        );
        DB::table('servicio')->insert(
            array(
                'nombre' => 'Restaurante',
                'id_imagen' => 'restaurante.png'
            )
        );
        DB::table('servicio')->insert(
            array(
                'nombre' => 'Cafetería',
                'id_imagen' => 'cafeteria.png'
            )
        );
        DB::table('servicio')->insert(
            array(
                'nombre' => 'Piscina',
                'id_imagen' => 'piscina.png'
            )
        );
        DB::table('servicio')->insert(
            array(
                'nombre' => 'Sauna',
                'id_imagen' => 'Sauna.png'
            )
        );
        DB::table('servicio')->insert(
            array(
                'nombre' => 'Solarium',
                'id_imagen' => 'solarium.png'
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
