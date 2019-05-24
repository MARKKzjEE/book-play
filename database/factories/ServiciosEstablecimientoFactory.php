<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\ServiciosEstablecimiento;
use Faker\Generator as Faker;

$factory->define(ServiciosEstablecimiento::class, function (Faker $faker) {
    return [
        'id_servicio' => $faker->randomDigit,
        'id_club' => $faker->randomDigit
    ];
});
