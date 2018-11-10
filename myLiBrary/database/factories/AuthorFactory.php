<?php

use Faker\Generator as Faker;
use App\Author;
$factory->define(App\Author::class, function (Faker $faker) {

    return [
        'name' => $faker->name,
        'birth_date' => $faker->dateTime($max = '1980', $timezone = null),
        'origin'=> $faker->country,
        'biography' => $faker->paragraph(2),
    ];
});
