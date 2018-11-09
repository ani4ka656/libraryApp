<?php

use Faker\Generator as Faker;
use App\Author;
$factory->define(App\Author::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'birth_date' => $faker->dateTime($max = '1980', $timezone = null),
        'origin'=> $faker->country,
        'biography' => $faker->paragraph(2),
        'number_of_books' => $faker->numberBetween($min = 0, $max = 100),

    ];
});
