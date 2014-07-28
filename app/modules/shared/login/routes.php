<?php

// todo Prio low: quicker way to make routes? with rest or so..

// Login
Route::get('user/login', array('as' => 'login', 'uses' => 'LoginController@getLogin'));
Route::post('user/login', array('as' => 'login', 'uses' => 'LoginController@postLogin'));

// Logout
Route::get('user/logout', array('as' => 'logout', 'uses' => 'LoginController@getLogout'));

// Reset
Route::get('user/reset', array('as' => 'reset', 'uses' => 'LoginController@getResetCode'));
Route::post('user/reset', array('as' => 'reset', 'uses' => 'LoginController@postResetCode'));

Route::get('user/confirmreset', array('as' => 'confirmReset', 'uses' => 'LoginController@getConfirmResetCode'));
Route::post('user/confirmreset', array('as' => 'confirmReset', 'uses' => 'LoginController@postConfirmResetCode'));

Route::get('user/newpassword', array('as' => 'newPassword', 'uses' => 'LoginController@getSetNewPassword'));
Route::post('user/newpassword', array('as' => 'newPassword', 'uses' => 'LoginController@postSetNewPassword'));