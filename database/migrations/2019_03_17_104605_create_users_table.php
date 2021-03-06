<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Crea una tabla users con la información del usuario.
     *
     * @author ismaelsanchezf
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('username')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('telefono')->nullable();
            $table->integer('sistema_puntos')->nullable();
            $table->integer('codigo_postal')->nullable();
            $table->boolean('verificacion_mail')->nullable();
            $table->string('imagen_perfil');
            $table->string('descripcion')->nullable();
            $table->string('ciudad')->nullable();
            $table->string('direccion')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert(
            array(
                'name' => 'Marc Gallego Gines',
                'username' => 'marcgallego',
                'email' => 'mark.gallego.gines@gmail.com',
                'email_verified_at' => '2019-05-12 08:00:00',
                'password' => bcrypt('1234567'),
                'telefono' => '933952311',
                'sistema_puntos' => '1',
                'codigo_postal' => '08020',
                'verificacion_mail' => true,
                'imagen_perfil' => 'coche.jpg',
                'descripcion' => 'Soy un chico deportista',
                'ciudad' => 'Barcelona',
                'direccion' => 'Calle Pelayo 247'
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
        Schema::dropIfExists('users');
    }
}
