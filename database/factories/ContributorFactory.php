<?php

use Faker\Generator as Faker;

$factory->define(App\Contributor::class, function (Faker $faker) {
    return [
        'login' => $faker->userName,
    ];
});
