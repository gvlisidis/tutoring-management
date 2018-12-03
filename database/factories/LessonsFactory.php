<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Lesson;

$factory->define( Lesson::class, function ( Faker\Generator $faker ) {

    return [
        'student_id' => rand( 1, 150 ),
        'course_id'  => rand( 1, 5 ),
        'price'      => rand( 25, 40 ),
        'paid'       => rand( 0, 1 ),
        'date'       => $faker->date( rand( 1, 30 ) . '/' . rand( 1, 12 ) . '/' . rand( 2016, 2018 ) ),
        'time_from'  => $faker->time('H:i A' ),
        'time_to'    => $faker->time('H:i A' ),
    ];
} );
