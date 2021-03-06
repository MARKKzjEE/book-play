<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Establecimiento;
use Faker\Generator as Faker;

$factory->define(Establecimiento::class, function (Faker $faker) {
    return [
        'mail' => $faker->safeEmail,
        'nombre' => $faker->name,
        'direccion' => $faker->address ,
        'codigo_postal' => $faker->postcode ,
        'telefono' => $faker->e164PhoneNumber ,
        'prioridad' => '1',
        'imagen_perfil' => $faker->imageUrl($width = 640, $height = 480),
        'hora_inicio' => '2019-05-12 08:00:00',
        'hora_final' => '2019-05-12 22:00',
        'descripcion' => $faker->text($maxNbChars = 500)
    ];
});
