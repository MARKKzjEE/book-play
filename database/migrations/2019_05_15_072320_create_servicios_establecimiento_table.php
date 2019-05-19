<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiciosEstablecimientoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicios_establecimiento', function (Blueprint $table) {
            $table->unsignedBigInteger('id_servicio');
            $table->unsignedBigInteger('id_club');
            $table->primary(['id_servicio','id_club']);
            $table->foreign('id_servicio')->references('id')->on('servicio');
            $table->foreign('id_club')->references('id')->on('establecimiento');
        });
        DB::table('servicios_establecimiento')->insert(
            array(
                'id_servicio' => '1',
                'id_club' => '1'
            )
        );
        DB::table('servicios_establecimiento')->insert(
            array(
                'id_servicio' => '2',
                'id_club' => '1'
            )
        );
        DB::table('servicios_establecimiento')->insert(
            array(
                'id_servicio' => '3',
                'id_club' => '1'
            )
        );
        DB::table('servicios_establecimiento')->insert(
            array(
                'id_servicio' => '4',
                'id_club' => '1'
            )
        );
        DB::table('servicios_establecimiento')->insert(
            array(
                'id_servicio' => '5',
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
        Schema::dropIfExists('servicios_establecimiento');
    }
}
