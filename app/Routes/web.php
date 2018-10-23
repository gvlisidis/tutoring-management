<?php


Auth::routes();

Route::group(['middleware' => 'auth' ], function (){
    Route::get('/', 'UsersController@students')->name('students');
});

