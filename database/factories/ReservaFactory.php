<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Reserva;
use Faker\Generator as Faker;

$factory->define(App\Reserva::class, function (Faker $faker) {
    return [
        'fecha_reserva' => '2019-05-12',
        'sum_modulos' => 0,
        'estado_reserva' => 1,
        'estado_pago' => 1,
        'id_pago' => 1,
        'cantidad' => $faker->numberBetween($min = 1, $max = 100),
        'descripcion' => 'PistaReservada',
        'id_usuario' => $faker->numberBetween($min = 1, $max = 100),
        'id_pista' => $faker->numberBetween($min = 1, $max = 100),
        'hora_final' => '2019-05-12 10:00:00',
        'descripcion' => $faker->text($maxNbChars = 500)

    ];
});
