<?php

// Dashboard
Route::get('user/dashboard', array('as' => 'dashboard', 'uses' => 'UserController@getDashboard'));