<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Deporte;
use Faker\Generator as Faker;

$factory->define(Deporte::class, function (Faker $faker) {
    return [
        'nombre' => $faker->name,
        'id_imagen' => $faker->imageUrl($width = 640, $height = 480)
    ];
});
