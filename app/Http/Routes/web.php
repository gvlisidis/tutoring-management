<?php


Auth::routes();

Route::group(['middleware' => 'auth' ], function (){
    Route::get('/', 'UsersController@students')->name('students');

    Route::group( [ 'prefix' => 'my-account' ], function () {
        Route::get( '', 'UsersController@editAccount' )->name( 'users.edit-account' );
        Route::put( '', 'UsersController@updateAccount' )->name( 'users.update-account' );
    } );

});

