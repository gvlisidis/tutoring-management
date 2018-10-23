<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\User;

$factory->define( User::class, function ( Faker\Generator $faker ) {

    return [
        'name'     => $faker->name,
        'lastname' => $faker->lastName,
        'password' => bcrypt( 'password' ),
        'email'    => $faker->email,
    ];
} );
