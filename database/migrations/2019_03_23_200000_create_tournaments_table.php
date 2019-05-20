<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTournamentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tournaments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->unsignedBigInteger('id_club')->nullable();
            $table->foreign('id_club')->references('id')->on('establecimiento')->unsigned();
            $table->string('email')->unique();
            $table->unsignedBigInteger('id_deporte')->nullable();
            $table->foreign('id_deporte')->references('id')->on('deporte')->unsigned();
            $table->string('genero');
            $table->date('fecha');
            $table->float('precio');

            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('tournaments')->insert(
            array(
                'name' => 'Champions Sant Joan Despi',
                'id_club' => '7',
                'email' => 'pfcalvet@sjdespi.net',
                'id_deporte' => '3',
                'genero' => 'mixto',
                'fecha' => '2019-06-10',
                'precio' => '10.00'
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
        Schema::dropIfExists('tournaments');
    }
}
