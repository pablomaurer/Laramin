<?php

// only MEMBERS, can access this routes
Route::group(array('before' => 'loggedIn'), function()
{
    // Dashboard
    Route::get('user/dashboard', array('as' => 'dashboard', 'uses' => 'UserController@getDashboard'));
});