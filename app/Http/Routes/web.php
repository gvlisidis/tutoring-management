<?php

Auth::routes();

Route::group( [ 'middleware' => 'auth' ], function () {
    Route::get( '', 'UsersController@students' )->name( 'students.index' );

    Route::group( [ 'prefix' => 'students' ], function () {
        Route::get( 'archive', 'StudentsController@archive' )->name( 'students.archive' );
        Route::get( '{student}/edit', 'StudentsController@edit' )->name( 'students.edit' )->middleware( 'mystudent' );
        Route::put( '{student}', 'StudentsController@update' )->name( 'students.update' )->middleware( 'mystudent' );
        Route::get( 'create', 'StudentsController@create' )->name( 'students.create' );
        Route::post( '', 'StudentsController@store' )->name( 'students.store' );
        Route::put( '{id}/restore', 'StudentsController@restore' )->name( 'students.restore' );
        Route::get( '{student}/delete', 'StudentsController@destroy' )->name( 'students.archive-student' )->middleware( 'mystudent' );
    } );

    Route::group( [ 'prefix' => 'my-account' ], function () {
        Route::get( '', 'UsersController@editAccount' )->name( 'users.edit-account' );
        Route::put( '', 'UsersController@updateAccount' )->name( 'users.update-account' );
    } );

    Route::group( [ 'prefix' => 'courses' ], function () {
        Route::get( '', 'CoursesController@index' )->name( 'courses.index' );
        Route::get( '{course}/edit', 'CoursesController@edit' )->name( 'courses.edit' )->middleware( 'mycourse' );
        Route::put( '{course}', 'CoursesController@update' )->name( 'courses.update' )->middleware( 'mycourse' );
        Route::get( 'create', 'CoursesController@create' )->name( 'courses.create' );
        Route::post( '', 'CoursesController@store' )->name( 'courses.store' );
        Route::get( '{course}/delete', 'CoursesController@destroy' )->name( 'courses.delete' )->middleware( 'mycourse' );
    } );

    Route::group( [ 'prefix' => 'lessons' ], function () {
        Route::get( '{student}', 'LessonsController@index' )->name( 'lessons.index' );
        Route::get( 'student/{student}/lesson/{newlesson}/edit', 'LessonsController@edit' )->name( 'lessons.edit' );
        Route::put( 'student/{student}/lesson/{lesson}', 'LessonsController@update' )->name( 'lessons.update' );
       // Route::get( '{student}/create', 'LessonsController@create' )->name( 'lessons.create' );
        Route::post( 'student/{student}', 'LessonsController@store' )->name( 'lessons.store' );
        Route::get( '{newlesson}/delete', 'LessonsController@destroy' )->name( 'lessons.delete' );
    } );

} );

