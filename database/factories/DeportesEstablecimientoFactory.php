<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\DeportesEstablecimiento;
use Faker\Generator as Faker;

$factory->define(DeportesEstablecimiento::class, function (Faker $faker) {
    return [
        'id_deporte' => $faker->randomDigitNotNull,
        'id_club' => $faker->randomDigitNotNull,
    ];
});
