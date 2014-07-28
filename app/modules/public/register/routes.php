<?php

// Register
Route::get('user/register', array('as' => 'register', 'uses' => 'RegisterController@getRegister'));
Route::post('user/register', array('as' => 'register', 'uses' => 'RegisterController@postRegister'));

//Confirm
Route::get('user/confirm', array('as' => 'confirm', 'uses' => 'RegisterController@getConfirm'));
Route::post('user/confirm', array('as' => 'confirm', 'uses' => 'RegisterController@postConfirm'));
