<?php

// only logged out users, can access this routes
Route::group(array('before' => 'loggedOut'), function()
{
    // Register
    Route::get('user/register', array('as' => 'register', 'uses' => 'RegisterController@getRegister'));
    Route::post('user/register', array('as' => 'register', 'uses' => 'RegisterController@postRegister'));

    //Confirm
    Route::get('user/confirm', array('as' => 'confirm', 'uses' => 'RegisterController@getConfirm'));
    Route::post('user/confirm', array('as' => 'confirm', 'uses' => 'RegisterController@postConfirm'));
}); //v