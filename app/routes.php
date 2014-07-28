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
| Filter: You could Filter each Menulink (like loginNav Menu), but i
| think it's easier to swap the whole menu depending on his Group
|
*/

// If user is logged in
if (Sentry::check())
{
    // get current user
    try {
        $user = Sentry::getUser();
    }
    catch (Cartalyst\Sentry\Users\UserNotFoundException $e) {
        // User wasn't found, should only happen if the user was deleted
        // when they were already logged in or had a "remember me" cookie set
        // and they were deleted.
    }

    // Menu if User is in Admin Group
    $adminGroup = Sentry::findGroupByName('Admin');

    if ($user->inGroup($adminGroup)) {
        Menu::make('mainNav', function($menu){
            $menu->add(trans('menu.dashboard'), array('route'  => 'dashboard'));

            $user = $menu->add(trans('menu.users'), 'about');
            $user->add(trans('menu.users'),'user');
            $user->add(trans('menu.groups'), 'groups');
            $user->add(trans('menu.permissions'), 'permission');

            $menu->add('Tabellen', 'todo');
        });
    }

    // Menu if User is in User Group
    $userGroup = Sentry::findGroupByName('User');

    if ($user->inGroup($userGroup)) {
        Menu::make('mainNav', function($menu){
            $menu->add(trans('menu.dashboard'), array('route'  => 'dashboard'));
            $menu->add('Products', 'services');
        });
    }
} else {
    // Menu if is guest
    Menu::make('mainNav', function($menu){
        $menu->add(trans('menu.dashboard'), array('route'  => 'dashboard'));
        $menu->add('Produkte', 'services');
    });
}

// Login logout Nav
Menu::make('loginNav', function($menu){
    if (Sentry::check()) {
        $user = Sentry::getUser();

        $menu->add(trans('login.logout'), array('route' => 'logout'));
        $menu->add($user->email, 'profile');
    }
    else
    {
    $menu->add(trans('login.login'), array('route'  => 'login'));
    $menu->add(trans('login.register'), array('route'  => 'register'));
    }
});

/*
// Todo Created in order to have a testgroup, make this stuff as option in admin section
try
{
    // Create the group
    $group = Sentry::createGroup(array(
        'name'        => 'User',
    ));
}
catch (Cartalyst\Sentry\Groups\NameRequiredException $e)
{
    echo 'Name field is required';
}
catch (Cartalyst\Sentry\Groups\GroupExistsException $e)
{
    echo 'Group already exists';
}
*/

/*
// Todo Created in order to have a test User with Group, make this stuff as option in admin section
    $user->addGroup($adminGroup);
*/

/*
// Todo Createt for test add this to admin section
    $throttle = Sentry::findThrottlerByUserId(20);
    $throttle->unsuspend();
*/