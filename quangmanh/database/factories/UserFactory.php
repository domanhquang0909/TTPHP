<?php

use Faker\Generator as Faker;

$factory->define(App\Models\User::class, function (Faker $faker) {
    return [
        'mail_address' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'name'=> $faker->name,
        'address'=> $faker->address,
        'phone' => '0326032081',
        "role"=>'2'
    ];
});
