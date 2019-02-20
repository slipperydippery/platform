<?php

use Faker\Generator as Faker;

$factory->define(App\Group::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'code' => str_random(10),
    ];
});
