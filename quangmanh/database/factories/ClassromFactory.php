<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Classrooms::class, function (Faker $faker) {
    return [
        'name'=>$faker->name
    ];
});
