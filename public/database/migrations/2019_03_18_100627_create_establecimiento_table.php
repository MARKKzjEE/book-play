<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstablecimientoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('establecimiento', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('mail')->unique();
            $table->string('nombre');
            $table->string('direccion');
            $table->integer('codigo_postal');
            $table->integer('telefono');
            $table->integer('prioridad');
            //$table->string('geolocalizacion');
            $table->string('imagen_perfil');
            $table->unsignedInteger('id_galeria')->nullable();
            $table->timestamp('hora_inicio')->nullable();
            $table->timestamp('hora_final')->nullable();
            //$table->foreign('imagen_perfil')->references('id')->on('archivo');
            //$table->foreign('id_galeria')->references('id')->on('galeria');
            $table->timestamps();
        });

        
        DB::table('establecimiento')->insert(
            array(
                'mail' => 'infoclub@tennisclubbadalona.org',
                'nombre' => 'Club Tennis Badalona',
                'direccion' => 'Avda. Juan de Austria, 58-60 08915 , Badalona',
                'codigo_postal' => '08912',
                'telefono' => '933952311',
                'prioridad' => '1',
                'imagen_perfil' => 'img1.jpg'
                
            )
        );

        DB::table('establecimiento')->insert(
            array(
                'mail' => 'ctbarcino@ctbarcino.cat',
                'nombre' => 'Club Tennis Barcino',
                'direccion' => 'Plaça de Narcisa Freixas, 2,',
                'codigo_postal' => '08022',
                'telefono' => '934170805',
                'prioridad' => '1',
                'imagen_perfil' => 'img2.jpg'
                
            )
        );

        DB::table('establecimiento')->insert(
            array(
                'mail' => 'masramce@hotmail.com',
                'nombre' => 'Club Esportiu Mas-Ram',
                'direccion' => 'Plaça eucaliptus, 3',
                'codigo_postal' => '08916',
                'telefono' => '934652081',
                'prioridad' => '1',
                'imagen_perfil' => 'img3.jpg'
                
            )
        );

        DB::table('establecimiento')->insert(
            array(
                'mail' => 'clubsabadell@gmail.com',
                'nombre' => 'Club Tennis Sabadell',
                'direccion' => 'Carrer Prat de la Riba, 91',
                'codigo_postal' => '08206',
                'telefono' => '937264500',
                'prioridad' => '1',
                'imagen_perfil' => 'img4.jpg'
                
            )
        );

        DB::table('establecimiento')->insert(
            array(
                'mail' => 'cbvicat@gmail.com',
                'nombre' => 'Club Bàsquet Vic',
                'direccion' => 'Crta. de Gurb, s/n – Pl.Pare Millan',
                'codigo_postal' => '08500',
                'telefono' => '938861440',
                'prioridad' => '1',
                'imagen_perfil' => 'img5.jpg'
                
            )
        );

        DB::table('establecimiento')->insert(
            array(
                'mail' => 'administracio@ceeuropa.cat',
                'nombre' => 'Camb Futbol Montigalà',
                'direccion' => 'Trv. Montigalà',
                'codigo_postal' => '08917',
                'telefono' => '934650962',
                'prioridad' => '1',
                'imagen_perfil' => 'img6.jpg'
                
            )
        );
        /**
         * Los clubes con prioridad 1 son los clubes destacados
         * Los otros tiene prioridad 0
         * 
         * 
         */


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('establecimiento');
    }
}
