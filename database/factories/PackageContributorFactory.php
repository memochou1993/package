<?php

use Faker\Generator as Faker;

$factory->define(App\PackageContributor::class, function (Faker $faker) {
    return [
        'package_id' => $faker->numberBetween($min = 1, $max = 20),
        'contributor_id' => $faker->numberBetween($min = 1, $max = 100),
        'contributions' => $faker->numberBetween($min = 100, $max = 5000),
    ];
});
