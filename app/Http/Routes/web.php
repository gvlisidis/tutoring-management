<?php

Auth::routes();

Route::group( [ 'middleware' => 'auth' ], function () {
    Route::get( '', 'StudentsController@index' )->name( 'students.index' );

    Route::group( [ 'prefix' => 'students' ], function () {
        Route::get( '{student}/edit', 'StudentsController@edit' )->name( 'students.edit' );
        Route::put( '{student}', 'StudentsController@update' )->name( 'students.update' );
        Route::get( 'create', 'StudentsController@create' )->name( 'students.create' );
        Route::post( '', 'StudentsController@store' )->name( 'students.store' );
        Route::get( '{student}/delete', 'StudentsController@destroy' )->name( 'students.delete' );
    } );

    Route::group( [ 'prefix' => 'my-account' ], function () {
        Route::get( '', 'UsersController@editAccount' )->name( 'users.edit-account' );
        Route::put( '', 'UsersController@updateAccount' )->name( 'users.update-account' );
    } );

} );

