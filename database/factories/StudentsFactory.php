<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Student;

$factory->define( Student::class, function ( Faker\Generator $faker ) {

    return [
        'name'      => $faker->name,
        'lastname'  => $faker->lastName,
        'telephone' => $faker->phoneNumber,
        'address'   => $faker->address,
        'user_id'   => rand( 1, 8 ),
        'email'     => $faker->email,
    ];
} );
