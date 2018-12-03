<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Student;

$factory->define( Student::class, function ( Faker\Generator $faker ) {
    $gender = $faker->randomElement( [ 'male', 'female' ] );

    return [
        'name'      => $faker->name,
        'lastname'  => $faker->lastName,
        'telephone' => $faker->phoneNumber,
        'gender'    => $gender,
        'address'   => $faker->address,
        'user_id'   => rand( 1, 8 ),
        'email'     => $faker->email,
        'created_at'=>   $faker->date( rand( 1, 30 ) . '/' . rand( 1, 12 ) . '/' . rand( 2016, 2018 ) ),
    ];
} );
