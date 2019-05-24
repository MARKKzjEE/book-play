<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Tournaments;
use Faker\Generator as Faker;

$factory->define(Tournaments::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'id_club' => 1,
        'id_deporte' => 1,
        'email' => $faker->safeEmail,
        'genero' => $faker->numberBetween($min = 1, $max = 3),
        'fecha' => $faker->date($format = 'Y-m-d'),
        'precio' => $faker->numberBetween($min = 0, $max = 50),
        'prioridad' => $faker->numberBetween($min = 1, $max = 2),
        'num_participantes_max' => $faker->numberBetween($min = 1, $max = 50),
        'num_participantes_actual' => 0
    ];
});
