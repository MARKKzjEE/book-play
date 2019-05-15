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
            $table->unsignedBigInteger('id_imagen')->nullable();
            $table->foreign('id_imagen')->references('id')->on('archivo')->unsigned();
            $table->timestamps();
        });

        DB::table('deporte')->insert(
            array(
                'nombre' => 'Tenis',
            )
        );
        DB::table('deporte')->insert(
            array(
                'nombre' => 'Basquet',
            )
        );
        DB::table('deporte')->insert(
            array(
                'nombre' => 'Padel',
            )
        );
        DB::table('deporte')->insert(
            array(
                'nombre' => 'Futbol 11',
            )
        );
        DB::table('deporte')->insert(
            array(
                'nombre' => 'Futbol 7',
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
