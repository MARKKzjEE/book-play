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
            $table->float('precio');
            $table->unsignedBigInteger('id_club')->nullable();
            //$table->foreign('id_club')->references('id')->on('establecimiento')->unsigned();
            $table->unsignedBigInteger('id_deporte')->nullable();
            //$table->foreign('id_deporte')->references('id')->on('deporte')->unsigned();
        });

        DB::table('pista')->insert(
            array(
                'nombre' => 'Pista 1',
                'superficie' => 'Tierra',
                'cerramiento' => 'Interior',
                'pared' => 'Muro',
                'precio' => 3.0,
                'id_deporte' => '1',
                'id_club'  => '1'
            )
        );

        DB::table('pista')->insert(
            array(
                'nombre' => 'Pista 2',
                'superficie' => 'Tierra',
                'cerramiento' => 'Exterior',
                'pared' => 'Panorámico',
                'precio' => 3.0,
                'id_deporte' => '1',
                'id_club'  => '1'
            )
        );

        DB::table('pista')->insert(
            array(
                'nombre' => 'Pista 3',
                'superficie' => 'Tierra',
                'cerramiento' => 'Interior',
                'pared' => 'Muro',
                'precio' => 3.0,
                'id_deporte' => '1',
                'id_club'  => '1'
            )
        );

        DB::table('pista')->insert(
            array(
                'nombre' => 'Pista 4',
                'superficie' => 'Tierra',
                'cerramiento' => 'Exterior',
                'pared' => 'Cristal',
                'precio' => 3.0,
                'id_deporte' => '1',
                'id_club'  => '1'
            )
        );

        DB::table('pista')->insert(
            array(
                'nombre' => 'Pista 5',
                'superficie' => 'Tierra',
                'cerramiento' => 'Interior',
                'pared' => 'Cristal',
                'precio' => 3.0,
                'id_deporte' => '1',
                'id_club'  => '1'
            )
        );

        DB::table('pista')->insert(
            array(
                'nombre' => 'Pista 1',
                'superficie' => 'Hierba',
                'cerramiento' => 'Exterior',
                'pared' => 'Muro',
                'precio' => 4.0,
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
