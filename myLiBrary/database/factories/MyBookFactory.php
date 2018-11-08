<?php

use Faker\Generator as Faker;
use App\MyBook;
$factory->define(App\MyBook::class, function (Faker $faker) {
    return [
        'speed' => $faker->numberBetween($min = 10, $max = 900),
        'pages_read' => $faker->numberBetween($min = 200, $max = 2000),
    ];
});
