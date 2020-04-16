<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Producto;
use Faker\Generator as Faker;

$factory->define(Producto::class, function (Faker $faker) {
    return [
		'referencia'=>$faker->numberBetween($max=10),
		'precio'=>$faker->numberBetween($max=10),
		'peso_gramos'=>$faker->randomFloat($max=5 , $min=5),
    ];
});
