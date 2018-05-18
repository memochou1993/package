<?php

use Faker\Generator as Faker;

$factory->define(App\Contributor::class, function (Faker $faker) {
    return [
        'login' => $faker->userName,
        'contribution' => $faker->numberBetween($min = 100, $max = 5000),
    ];
});
