<?php

/*
|--------------------------------------------------------------------------
| Global Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

/*
|--------------------------------------------------------------------------
| Menu
|--------------------------------------------------------------------------
|
| Define here your Menus! see: https://github.com/lavary/laravel-menu
| Track: https://github.com/lavary/laravel-menu/issues?page=1&state=open
|
*/
// todo replace sample menu
Menu::make('mainNav', function($menu){
    $menu->add(trans('menu.dashboard'), array('route'  => 'dashboard'));

    $user = $menu->add(trans('menu.users'), 'about');
    $user->add(trans('menu.users'),'user');
    $user->add(trans('menu.groups'), 'groups');
    $user->add(trans('menu.permissions'), 'permission');

    $menu->add('services', 'services');
    $menu->add('Contact','contact');
});


Menu::make('loginNav', function($menu){

    $menu->add(trans('login.login'), array('route'  => 'login'))
            ->meta('loggedIn', false);
    $menu->add(trans('login.register'), array('route'  => 'register'))
            ->meta('loggedIn', false);
    $menu->add(trans('login.logout'), array('route' => 'logout'))
            ->meta('loggedIn', true);
    $menu->add('Name', 'services')
            ->meta('loggedIn', true);

})->filter(function($item) {
        if($item->meta('loggedIn')) {
            return Sentry::check();
        }
        return !Sentry::check();
    });