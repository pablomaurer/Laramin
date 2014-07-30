<?php

// only MEMBERS, can access this routes
Route::group(array('before' => 'loggedIn'), function()
{
    // Dashboard
    Route::get('profile/dashboard', array('as' => 'dashboard', 'uses' => 'ProfileController@getDashboard'));
});