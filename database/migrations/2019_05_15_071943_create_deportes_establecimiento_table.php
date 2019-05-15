<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeportesEstablecimientoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deportes_establecimiento', function (Blueprint $table) {
            $table->timestamps();
            $table->unsignedBigInteger('id_deporte');
            $table->unsignedBigInteger('id_club');
            $table->primary(['id_deporte','id_club']);
            $table->foreign('id_deporte')->references('id')->on('deporte');
            $table->foreign('id_club')->references('id')->on('establecimiento');

        });
        DB::table('deportes_establecimiento')->insert(
            array(
                'id_deporte' => '1',
                'id_club' => '1'
            )
        );
        DB::table('deportes_establecimiento')->insert(
            array(
                'id_deporte' => '2',
                'id_club' => '1'
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
        Schema::dropIfExists('deportes_establecimiento');
    }
}