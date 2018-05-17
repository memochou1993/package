<?php

use Faker\Generator as Faker;

$factory->define(App\Package::class, function (Faker $faker) {
    return [
        'name' => $faker->safeColorName,
        'login' => $faker->userName,
        'description' => $faker->text($maxNbChars = 200),
        'watchers_count' => $faker->numberBetween($min = 100, $max = 10000),
        'forks_count' => $faker->numberBetween($min = 100, $max = 10000),
        'subscribers_count' => $faker->numberBetween($min = 100, $max = 10000),
    ];
});
