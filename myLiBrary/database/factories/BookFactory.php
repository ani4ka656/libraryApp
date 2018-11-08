<?php

use Faker\Generator as Faker;
use App\Book;

$factory->define(App\Book::class, function (Faker $faker) {
    return [
      'name' => $faker->sentence(3),
      'author_id' => $faker->numberBetween(1, 10),
      'total_number_of_pages' => $faker->numberBetween($min = 200, $max = 2000),
    ];
});
