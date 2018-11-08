<?php

use Faker\Generator as Faker;
use App\Author;
$factory->define(App\Author::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'birth_date' => $faker->,
        'biography' => $faker->paragraph(2)
    ];
});
