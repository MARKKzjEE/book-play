<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeporteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deporte', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->string('id_imagen');
        });

        //id = 1
        DB::table('deporte')->insert(
            array(
                'nombre' => 'Tenis',
                'id_imagen' => 'tenis.png'
            )
        );

        //id = 2
        DB::table('deporte')->insert(
            array(
                'nombre' => 'Basquet',
                'id_imagen' => 'baloncesto.png'
            )
        );

        //id = 3
        DB::table('deporte')->insert(
            array(
                'nombre' => 'Padel',
                'id_imagen' => 'padel.png'
            )
        );

        //id = 4
        DB::table('deporte')->insert(
            array(
                'nombre' => 'Futbol 11',
                'id_imagen' => 'futbol.png'
            )
        );

        //id = 5
        DB::table('deporte')->insert(
            array(
                'nombre' => 'Futbol 7',
                'id_imagen' => 'futbol.png'
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
        Schema::dropIfExists('deporte');
    }
}
