<?php

// only logged in users, can see this
Route::group(array('before' => 'loggedin'), function()
{
    // Dashboard
    Route::get('user/dashboard', array('as' => 'dashboard', 'uses' => 'UserController@getDashboard'));
});