<?php

use Faker\Generator as Faker;

$factory->define(App\Tag::class, function (Faker $faker) {
    return [
        'type' => $faker->randomElement($array = ['Topic','Link']),
        'name' => $faker->colorName,
    ];
});
