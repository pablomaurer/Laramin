<?php

// todo Prio low: quicker way to make routes? with rest or so..

// Login
Route::get('user/login', array('as' => 'login', 'uses' => 'AuthController@getLogin'));
Route::post('user/login', array('as' => 'login', 'uses' => 'AuthController@postLogin'));

// Logout
Route::get('user/logout', array('as' => 'logout', 'uses' => 'AuthController@getLogout'));

// Register
Route::get('user/register', array('as' => 'register', 'uses' => 'AuthController@getRegister'));
Route::post('user/register', array('as' => 'register', 'uses' => 'AuthController@postRegister'));

//Confirm
Route::get('user/confirm', array('as' => 'confirm', 'uses' => 'AuthController@getConfirm'));

// Reset
Route::get('user/reset', array('as' => 'reset', 'uses' => 'AuthController@getResetCode'));
Route::post('user/reset', array('as' => 'reset', 'uses' => 'AuthController@postResetCode'));

Route::get('user/confirmreset', array('as' => 'confirmReset', 'uses' => 'AuthController@getConfirmResetCode'));

Route::get('user/newpassword', array('as' => 'newPassword', 'uses' => 'AuthController@getSetNewPassword'));
Route::post('user/newpassword', array('as' => 'newPassword', 'uses' => 'AuthController@postSetNewPassword'));


// Tests
Route::get('test', 'AuthController@showAdmin');