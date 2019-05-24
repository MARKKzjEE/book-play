<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Servicio;
use Faker\Generator as Faker;

$factory->define(Servicio::class, function (Faker $faker) {
    return [
        'id' => $faker->randomDigitNotNull,
        'nombre' => $faker->word,
        'id_imagen' => $faker->imageUrl($width = 640, $height = 480)
    ];
});
