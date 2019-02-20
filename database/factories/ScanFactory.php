<?php

use Faker\Generator as Faker;

$factory->define(App\Scan::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'instantie_id' => rand ( 1 , 6 ),
        'scanmodel_id' => 1,
    ];
});
