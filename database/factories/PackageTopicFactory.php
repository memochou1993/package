<?php

use Faker\Generator as Faker;

$factory->define(App\PackageTag::class, function (Faker $faker) {
    return [
        'package_id' => $faker->numberBetween($min = 1, $max = 20),
        'tag_id' => $faker->numberBetween($min = 1, $max = 100),
    ];
});
