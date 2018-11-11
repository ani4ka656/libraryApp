<?php

use Faker\Generator as Faker;
use App\MyBook;

$factory->define(App\MyBook::class, function (Faker $faker) {
    return [
    	'user_id' => $faker->numberBetween(1, 10),
    	'book_id' => $faker->numberBetween(1, 10),
        'speed' => $faker->numberBetween($min = 10, $max = 100),
        'pages_read' => $faker->numberBetween($min = 20, $max = 100),
    ];
});
