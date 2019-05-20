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
            $table->mediumText('descripcion');
            $table->string('imagen_perfil');
            $table->unsignedBigInteger('id_galeria')->nullable();
            $table->timestamp('hora_inicio')->nullable();
            $table->timestamp('hora_final')->nullable();
            //$table->foreign('imagen_perfil')->references('id')->on('archivo');
            $table->foreign('id_galeria')->references('id')->on('galeria');
        });

        
        DB::table('establecimiento')->insert(
            array(
                'mail' => 'infoclub@tennisclubbadalona.org',
                'nombre' => 'Club Tennis Badalona',
                'direccion' => 'Avda. Juan de Austria, 58-60 08915 , Badalona',
                'codigo_postal' => '08912',
                'telefono' => '933952311',
                'prioridad' => '1',
                'imagen_perfil' => 'img1.jpg',
                'hora_inicio' => '2019-05-12 08:00:00',
                'hora_final' => '2019-05-12 22:00',
                'descripcion' => 'Con una superficie de 300 metros quadrados, el club tennis badalonna es unos de los
                mayores espacios deportivos de Badalona. Dispone de 5 pistas de 10 pistas de padel, 5 de tenis,5 de basquet y 3 de futbol 7
                Además destaca por sus servicios de parking gratuito, vestuarios modernos y una tienda de alquiler de productos '
                
                
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
                'imagen_perfil' => 'img2.jpg',
                'hora_inicio' => '2019-05-12 08:00',
                'hora_final' => '2019-05-12 22:00',
                'descripcion' => 'Con una superficie de 300 metros quadrados, el club tennis badalonna es unos de los
                mayores espacios deportivos de Badalona. Dispone de 5 pistas de 10 pistas de padel, 5 de tenis,5 de basquet y 3 de futbol 7
                Además destaca por sus servicios de parking gratuito, vestuarios modernos y una tienda de alquiler de productos '
                
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
                'imagen_perfil' => 'img3.jpg',
                'hora_inicio' => '2019-05-12 08:00',
                'hora_final' => '2019-05-12 22:00',
                'descripcion' => 'Con una superficie de 300 metros quadrados, el club tennis badalonna es unos de los
                mayores espacios deportivos de Badalona. Dispone de 5 pistas de 10 pistas de padel, 5 de tenis,5 de basquet y 3 de futbol 7
                Además destaca por sus servicios de parking gratuito, vestuarios modernos y una tienda de alquiler de productos '
                
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
                'imagen_perfil' => 'img4.jpg',
                'hora_inicio' => '2019-05-12 08:00',
                'hora_final' => '2019-05-12 22:00',
                'descripcion' => 'Con una superficie de 300 metros quadrados, el club tennis badalonna es unos de los
                mayores espacios deportivos de Badalona. Dispone de 5 pistas de 10 pistas de padel, 5 de tenis,5 de basquet y 3 de futbol 7
                Además destaca por sus servicios de parking gratuito, vestuarios modernos y una tienda de alquiler de productos '
                
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
                'imagen_perfil' => 'img5.jpg',
                'hora_inicio' => '2019-05-12 08:00',
                'hora_final' => '2019-05-12 22:00',
                'descripcion' => 'Con una superficie de 300 metros quadrados, el club tennis badalonna es unos de los
                mayores espacios deportivos de Badalona. Dispone de 5 pistas de 10 pistas de padel, 5 de tenis,5 de basquet y 3 de futbol 7
                Además destaca por sus servicios de parking gratuito, vestuarios modernos y una tienda de alquiler de productos '
                
            )
        );

        DB::table('establecimiento')->insert(
            array(
                'mail' => 'administracio@ceeuropa.cat',
                'nombre' => 'Camb Futbol Montigalà',
                'direccion' => 'Trv. Montigalà, 08917, Barcelona',
                'codigo_postal' => '08917',
                'telefono' => '934650962',
                'prioridad' => '1',
                'imagen_perfil' => 'img6.jpg',
                'hora_inicio' => '2019-05-12 08:00',
                'hora_final' => '2019-05-12 22:00',
                'descripcion' => 'Con una superficie de 300 metros quadrados, el club tennis badalonna es unos de los
                mayores espacios deportivos de Badalona. Dispone de 5 pistas de 10 pistas de padel, 5 de tenis,5 de basquet y 3 de futbol 7
                Además destaca por sus servicios de parking gratuito, vestuarios modernos y una tienda de alquiler de productos '
                
            )
        );

        //id = 7
        DB::table('establecimiento')->insert(
            array(
                'mail' => 'pfcalvet@sjdespi.net ',
                'nombre' => 'Poliesportiu Municipal Francesc Calvet',
                'direccion' => 'Av. de Barcelona, 45, 08970, Sant Joan Despí',
                'codigo_postal' => '08970',
                'telefono' => '934772709',
                'prioridad' => '1',
                'imagen_perfil' => 'img7.jpg',
                'hora_inicio' => '2019-05-12 06:30',
                'hora_final' => '2019-05-12 22:30',
                'descripcion' => 'El polideportivo Francesc Calvet és uno de los centros deportivos de excelencia de Sant Joan Despí.
                                    Ofrece varios servicios y actividades en todas sus instalacions como: piscina, pistas de basquet
                                    balonmano, futbol y padel.'
            )
        );

        //id = 8
        DB::table('establecimiento')->insert(
            array(
                'mail' => 'psgimeno@sjdespi.net',
                'nombre' => 'Polideportivo Salvador Gimeno',
                'direccion' => ' Carrer Major, 75, 08028, Sant Joan Despí',
                'codigo_postal' => '08970',
                'telefono' => '934776820',
                'prioridad' => '1',
                'imagen_perfil' => 'img8.jpg',
                'hora_inicio' => '2019-05-12 07:00',
                'hora_final' => '2019-05-12 22:30',
                'descripcion' => 'El Salvador Gimeno és uno de los centros deportivos de excelencia de Sant Joan Despí.
                                    Ofrece varios servicios y actividades en todas sus instalacions como: piscina, pistas de basquet
                                    balonmano, futbol y padel.'
            )
        );

        //id = 9
        DB::table('establecimiento')->insert(
            array(
                'mail' => 'info@rcpolo.com',
                'nombre' => 'Reial Club de Polo de Barcelona',
                'direccion' => 'Av. Dr. Marañón, 19-31, 08028, Barcelona',
                'codigo_postal' => '08028',
                'telefono' => '933341317',
                'prioridad' => '1',
                'imagen_perfil' => 'img9.jpg',
                'hora_inicio' => '2019-05-12 08:00',
                'hora_final' => '2019-05-12 22:00',
                'descripcion' => 'Reial Club de Polo de Barcelona és el club deportivo de excelencia de toda el area metropolitana
                        de Barcelona. Tiene 40 pistas de tennis de tierra batida, 2 campos para hockey huerba y un gimnasio de 500
                        metros cuadrados entre otros... Ven a descubrirnos.'
            )
        );

        //id = 10
        DB::table('establecimiento')->insert(
            array(
                'mail' => 'info@diagonalDir.com',
                'nombre' => 'Diagonal DiR',
                'direccion' => 'Carrer de Ganduxer, 25, Barcelona',
                'codigo_postal' => '08021',
                'telefono' => '932022202',
                'prioridad' => '1',
                'imagen_perfil' => 'img10.jpg',
                'hora_inicio' => '2019-05-12 06:15',
                'hora_final' => '2019-05-12 22:45',
                'descripcion' => 'Nuestro centro de mas de 12.000 metros cuadrados ofrece todo lo que necesitas para antes y después
                    de un buen partido de padel alguna de nuestras 6 pistas. Una piscina de 50x50 metros, nuestra zona de baños de vapor
                    y nuestro Dir Zen donde podras disfrustar de asombrosos masajes.'
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
