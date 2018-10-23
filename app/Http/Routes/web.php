<?php

Auth::routes();

Route::group( [ 'middleware' => 'auth' ], function () {
    Route::get( '', 'UsersController@students' )->name( 'students.index' );

    Route::group( [  'prefix' => 'students' ,'middleware' => 'mystudent' ], function () {
        Route::get( '{student}/edit', 'StudentsController@edit' )->name( 'students.edit' );
        Route::put( '{student}', 'StudentsController@update' )->name( 'students.update' );
        Route::get( 'create', 'StudentsController@create' )->name( 'students.create' );
        Route::post( '', 'StudentsController@store' )->name( 'students.store' );
        Route::get( '{student}/delete', 'StudentsController@destroy' )->name( 'students.delete' );

        Route::get( '{student}/lesson-details', 'StudentsController@details' )->name( 'students.lesson-details' );
    } );

    Route::group( [ 'prefix' => 'my-account' ], function () {
        Route::get( '', 'UsersController@editAccount' )->name( 'users.edit-account' );
        Route::put( '', 'UsersController@updateAccount' )->name( 'users.update-account' );
    } );

} );

