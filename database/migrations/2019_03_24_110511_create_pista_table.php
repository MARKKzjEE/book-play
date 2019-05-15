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
            $table->unsignedBigInteger('id_club')->nullable();
            $table->foreign('id_club')->references('id')->on('establecimiento')->unsigned();
            $table->unsignedBigInteger('id_deporte')->nullable();
            //$table->foreign('id_deporte')->references('id')->on('deporte')->unsigned(); NO FUNCIONA PQ????
            $table->timestamps();
        });

        DB::table('pista')->insert(
            array(
                'nombre' => 'Pista 1',
                'superficie' => 'Tierrra',
                'cerramiento' => 'Abierto',
                'pared' => 'Abierto',
                'id_deporte' => '1',
                'id_club'  => '1'
            )
        );

        DB::table('pista')->insert(
            array(
                'nombre' => 'Pista 2',
                'superficie' => 'Tierrra',
                'cerramiento' => 'Abierto',
                'pared' => 'Abierto',
                'id_deporte' => '1',
                'id_club'  => '1'
            )
        );

        DB::table('pista')->insert(
            array(
                'nombre' => 'Pista 3',
                'superficie' => 'Tierrra',
                'cerramiento' => 'Abierto',
                'pared' => 'Abierto',
                'id_deporte' => '1',
                'id_club'  => '1'
            )
        );

        DB::table('pista')->insert(
            array(
                'nombre' => 'Pista 4',
                'superficie' => 'Tierrra',
                'cerramiento' => 'Abierto',
                'pared' => 'Abierto',
                'id_deporte' => '1',
                'id_club'  => '1'
            )
        );

        DB::table('pista')->insert(
            array(
                'nombre' => 'Pista 5',
                'superficie' => 'Tierrra',
                'cerramiento' => 'Abierto',
                'pared' => 'Abierto',
                'id_deporte' => '1',
                'id_club'  => '1'
            )
        );

        DB::table('pista')->insert(
            array(
                'nombre' => 'Pista 1',
                'superficie' => 'Hierba',
                'cerramiento' => 'Cerrada',
                'pared' => 'Muro',
                'id_deporte' => '1',
                'id_club'  => '2'
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
        Schema::dropIfExists('pista');
    }
}
