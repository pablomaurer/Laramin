<?php

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

$adminMenuItems = function($adminMenu) {
    $adminMenu->add(trans('menu.dashboard'),        array('route'  => 'dashboard'));

    $user = $adminMenu->add(trans('menu.users'),    array('route'  => 'dashboard'));
    $user->add(trans('menu.users'),                 array('route'  => 'dashboard'));
    $user->add(trans('menu.groups'),                array('route'  => 'dashboard'));
    $user->add(trans('menu.permissions'),           array('route'  => 'dashboard'));

    $adminMenu->add('Tabellen',                     array('route'  => 'dashboard'));
};

$userMenuItems = function($userMenu) {
    $userMenu->add(trans('menu.dashboard'), array('route'  => 'dashboard'));
    $userMenu->add('Products',              array('route'  => 'dashboard'));
};

$guestMenuItems = function($guestMenu) {
    $guestMenu->add(trans('menu.dashboard'),    array('route'  => 'dashboard'));
    $guestMenu->add('Produkte',                 array('route'  => 'dashboard'));
};

$loginMenuItems = function($loginMenu) {
    $loginMenu->add(trans('login.login'), array('route'  => 'login'));
    $loginMenu->add(trans('login.register'), array('route'  => 'register'));
};

// If user is logged in
if (Sentry::check())
{
    try {
        $user = Sentry::getUser();
    }
    catch (Cartalyst\Sentry\Users\UserNotFoundException $e) {
        // User wasn't found, should only happen if the user was deleted
        // when they were already logged in or had a "remember me" cookie set
        // and they were deleted.
    }

    $logoutMenuItems = function($logoutMenu) use ($user) {
        $logoutMenu->add(trans('login.logout'), array('route' => 'logout'));
        $logoutMenu->add($user->email, array('route' => 'logout'));
    };

    $adminMenu = null;
    $userMenu = null;
    $logoutMenu = null;

    // Menu if User is in Admin Group
    $adminGroup = Sentry::findGroupByName('Admin');
    if ($user->inGroup($adminGroup)) {
        $adminMenu = Menu::make('mainNav', $adminMenuItems);
    }

    // Menu if User is in User Group
    $userGroup = Sentry::findGroupByName('User');
    if ($user->inGroup($userGroup)) {
        $userMenu = Menu::make('mainNav', $userMenuItems);
    }

    // Menu if User is logged in (items are here because need of username)
    $logoutMenu = Menu::make('logoutNav', $logoutMenuItems);

    // mark member menus as active
    $memberMenus = array($adminMenu, $userMenu, $logoutMenu);
    foreach ($memberMenus as &$menus) {
        if($menus != null) {
            $menus->filter(function($item) {
                if(route($item->link->path['route']) == Request::url()) {
                    $item->active();
                }
                return true;
            });
        }
    }
} else {
    // create guests menus
    $guestMenu = Menu::make('mainNav', $guestMenuItems);
    $loginMenu = Menu::make('loginNav', $loginMenuItems);

    // mark guest menus as active
    $guestMenus = array($guestMenu, $loginMenu);
    foreach ($guestMenus as &$menus) {
        $menus->filter(function($item) {
            if(route($item->link->path['route']) == Request::url()) {
                $item->active();
            }
            return true;
        });
    }
}