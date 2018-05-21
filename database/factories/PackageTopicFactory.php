<?php

use Faker\Generator as Faker;

$factory->define(App\PackageTopic::class, function (Faker $faker) {
    return [
        'package_id' => $faker->numberBetween($min = 1, $max = 20),
        'topic_id' => $faker->numberBetween($min = 1, $max = 100),
    ];
});
