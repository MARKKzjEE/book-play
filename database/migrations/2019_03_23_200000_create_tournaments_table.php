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
            $table->string('email');
            $table->unsignedBigInteger('id_deporte')->nullable();
            $table->foreign('id_deporte')->references('id')->on('deporte')->unsigned();
            $table->string('genero');
            $table->date('fecha');
            $table->float('precio');
            $table->float('prioridad');
            $table->integer('num_participantes_max');
            $table->integer('num_participantes_actual');
        });

        DB::table('tournaments')->insert(
            array(
                'name' => 'Torneo principiantes I',
                'id_club' => '1',
                'email' => 'torneo@club1.es',
                'id_deporte' => '1',
                'genero' => 'masculino',
                'fecha' => date_create('2019-06-05'),
                'precio' => '8.00',
                'prioridad' => '1',
                'num_participantes_max' => '30',
                'num_participantes_actual' => '0',
            )
        );

        DB::table('tournaments')->insert(
            array(
                'name' => 'Torneo principiantes II',
                'id_club' => '1',
                'email' => 'torneo@club1.es',
                'id_deporte' => '1',
                'genero' => 'masculino',
                'fecha' => date_create('2019-06-10'),
                'precio' => '8.00',
                'prioridad' => '1',
                'num_participantes_max' => '30',
                'num_participantes_actual' => '0',
            )
        );


        DB::table('tournaments')->insert(
            array(
                'name' => 'Torneo principiantes III',
                'id_club' => '1',
                'email' => 'torneo@club1.es',
                'id_deporte' => '1',
                'genero' => 'masculino',
                'fecha' => date_create('2019-06-15'),
                'precio' => '8.00',
                'prioridad' => '1',
                'num_participantes_max' => '30',
                'num_participantes_actual' => '0',
            )
        );


        DB::table('tournaments')->insert(
            array(
                'name' => 'Torneo principiantes IV',
                'id_club' => '1',
                'email' => 'torneo@club1.es',
                'id_deporte' => '1',
                'genero' => 'masculino',
                'fecha' => date_create('2019-06-20'),
                'precio' => '8.00',
                'prioridad' => '1',
                'num_participantes_max' => '30',
                'num_participantes_actual' => '0',
            )
        );


        DB::table('tournaments')->insert(
            array(
                'name' => 'Torneo principiantes V',
                'id_club' => '1',
                'email' => 'torneo@club1.es',
                'id_deporte' => '1',
                'genero' => 'masculino',
                'fecha' => date_create('2019-06-25'),
                'precio' => '8.00',
                'prioridad' => '1',
                'num_participantes_max' => '30',
                'num_participantes_actual' => '0',
            )
        );

        DB::table('tournaments')->insert(
            array(
                'name' => 'Torneo principiantes VI',
                'id_club' => '1',
                'email' => 'torneo@club1.es',
                'id_deporte' => '1',
                'genero' => 'masculino',
                'fecha' => date_create('2019-07-05'),
                'precio' => '8.00',
                'prioridad' => '1',
                'num_participantes_max' => '30',
                'num_participantes_actual' => '0',
            )
        );

        DB::table('tournaments')->insert(
            array(
                'name' => 'Torneo expertos XV ',
                'id_club' => '3',
                'email' => 'torneo@club2.es',
                'id_deporte' => '2',
                'genero' => 'femenino',
                'fecha' => date_create('2019-08-20'),
                'precio' => '12.30',
                'prioridad' => '2',
                'num_participantes_max' => '30',
                'num_participantes_actual' => '0',
            )
        );

        DB::table('tournaments')->insert(
            array(
                'name' => 'Torneo expertos JFK ',
                'id_club' => '3',
                'email' => 'torneo@club2.es',
                'id_deporte' => '2',
                'genero' => 'femenino',
                'fecha' => date_create('2019-08-21'),
                'precio' => '12.30',
                'prioridad' => '2',
                'num_participantes_max' => '30',
                'num_participantes_actual' => '0',
            )
        );

        DB::table('tournaments')->insert(
            array(
                'name' => 'Torneo infantil ',
                'id_club' => '2',
                'email' => 'torneo@club2.es',
                'id_deporte' => '2',
                'genero' => 'mixto',
                'fecha' => date_create('2019-07-21'),
                'precio' => '5.30',
                'prioridad' => '2',
                'num_participantes_max' => '30',
                'num_participantes_actual' => '0',
            )
        );

        DB::table('tournaments')->insert(
            array(
                'name' => 'Torneo infantil ',
                'id_club' => '2',
                'email' => 'torneo@club2.es',
                'id_deporte' => '3',
                'genero' => 'mixto',
                'fecha' => date_create('2019-07-22'),
                'precio' => '5.30',
                'prioridad' => '2',
                'num_participantes_max' => '30',
                'num_participantes_actual' => '0',
            )
        );

        DB::table('tournaments')->insert(
            array(
                'name' => 'Torneo infantil ',
                'id_club' => '2',
                'email' => 'torneo@club2.es',
                'id_deporte' => '4',
                'genero' => 'mixto',
                'fecha' => date_create('2019-07-22'),
                'precio' => '5.30',
                'prioridad' => '2',
                'num_participantes_max' => '30',
                'num_participantes_actual' => '0',
            )
        );
        
        DB::table('tournaments')->insert(
            array(
                'name' => 'Torneo infantil ',
                'id_club' => '2',
                'email' => 'torneo@club2.es',
                'id_deporte' => '5',
                'genero' => 'mixto',
                'fecha' => date_create('2019-07-21'),
                'precio' => '5.30',
                'prioridad' => '2',
                'num_participantes_max' => '30',
                'num_participantes_actual' => '0',
            )
        );

        DB::table('tournaments')->insert(
            array(
                'name' => 'Torneo XVII',
                'id_club' => '5',
                'email' => 'torneo@club2.es',
                'id_deporte' => '2',
                'genero' => 'femenino',
                'fecha' => date_create('2019-08-22'),
                'precio' => '10.00',
                'prioridad' => '2',
                'num_participantes_max' => '30',
                'num_participantes_actual' => '0',
            )
        );

        DB::table('tournaments')->insert(
            array(
                'name' => 'Champions Sant Joan Despi',
                'id_club' => '7',
                'email' => 'pfcalvet@sjdespi.net',
                'id_deporte' => '3',
                'genero' => 'mixto',
                'fecha' => date_create ('2019-06-10'),
                'precio' => '10.00',
                'prioridad' => '2',
                'num_participantes_max' => '30',
                'num_participantes_actual' => '0',
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
