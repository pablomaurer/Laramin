**Table of Contents**  *generated with [DocToc](http://doctoc.herokuapp.com/)*

- [Laramin](#user-content-laramin)
	- [Installation](#user-content-installation)
	- [used Packages](#user-content-used-packages)
- [Menu](#user-content-menu)
- [Modules](#user-content-modules)
- [Views](#user-content-views)
- [Widgets](#user-content-widgets)
- [Todos](#user-content-todos)
- [Images](#user-content-images)

# Laramin
A Laravel starter Set Backend and Frontend based on [Bootstrap 3](http://getbootstrap.com/) and clientside [Bootstrapvalidator](http://bootstrapvalidator.com/). I didnt knew how to work clean with Laravel, so I found my own way with the help of some packages. Now you can develop easy, clear and everybody will ever know what goes where..

## Features
* Default Theme on Bootstrap with easiest Client-side Validator
* Clean structure with Modules, so everyone knows what goes where
* Login, Password reset, Groups, Permission
* Login Activation Mail, Password Reset Mail
* Menu builder
* Themes to overwrite default style

## Installation
* Git clone
* Install Composer
* Run Composer update
* create new empty database in PhpMyAdmin or console "create database xy"
* Setup Settings in `laramin/app/config` database.php and mail.php
* Run `php artisan mirgrate`
* Run `php artisan migrate --package=cartalyst/sentry`
* Open laramin at `localhost/laramin/public/user/login`

## Used Packages

| Name                                              		 | Usage                |
| -------------------------------------------------------------- |----------------------|
| [Sentry](https://github.com/cartalyst/sentry)     		 | Authenticatoin       |
| [themify](https://github.com/mpedrera/themify)		 | Managing Themes      | 
| [widget](https://github.com/gravitano/widget)         	 | Theme Widgets 	|
| [laravel-modules](https://github.com/creolab/laravel-modules)	 | Cleaner structure 	|
| [laravel-menu](https://github.com/lavary/laravel-menu)	 | Managing menus	|
| [Ardent](https://github.com/laravelbook/ardent)    		 | Validating		|
| [todo](#)					     		 | IDE code completion	|
| [notification](https://github.com/edvinaskrucas/notification)	 | Notifications	|

Maybe later:
* [presenter] (https://github.com/robclancy/presenter) - TODO

# Menu
Define you're Menu in `app/menus.php`

Add you're Menu Items
```php
$userMenuItems = function($userMenu) {
    $userMenu->add(trans('menu.dashboard'), array('route'  => 'dashboard'));
    $userMenu->add('Products',              array('route'  => 'dashboard'));
};
```
In the if else `Sentry::check` block create the Menu instance
```php
$userMenu = Menu::make('mainNav', $userMenuItems);
```
Add your Menu to the Array, cause this Array will be looped over, to add the active css class.
```php
$memberMenus = array($adminMenu, $userMenu, $logoutMenu)
```
# Modules
There are 4 Folders wich can contain modules, they are
```
- app/modules/backend  // for Admins
- app/modules/frontend // for registered Users
- app/modules/shared   // for Admins and Users
- app/modules/public   // for Guests
```
Split you're Application in modules inside these folders. For Example a **User CRUD** for the Admin goes in `app/modules/backend/**user**`

##### Module Folder contains
* module.json file copy a existing or create a new one.
* routes.php
* folder "controllers" with YourController.php

##### Modules advanced
* use `app/config/packages/creolab/` to change settings for this module stuff

##### Workflow when adding a new Module
1. Module Folder
2. Model
3. Controller
4. Route
5. Menu
6. View ->title etc..

# Views
Normally Views are in `app/views` but because i thing almost everyone should have a cool
Templating system to easy switch out the Views they have to go in `app/themes/default/`
these are at a higher priority than at `app/views` but you dont have to use my themes folder
but if you do, it will just work.

# Clientside Validation
Never was easier, just add the HTML-Attributes you want for Validation just add to yoou're input tag for example `data-bv-emailaddress="true"` and you're done.
```html
<input type="email" id="email" name="email" class="form-control" placeholder="{{ trans('login.email') }}" required autofocus
    data-bv-emailaddress="true"
    data-bv-stringlength="true"
    data-bv-stringlength-min="6"
    data-bv-stringlength-max="30"
>
```

# Widgets
If you have stuff that should be available in all Views ... TODO

# Todos
- [X] Look how to change Language
- [X] Highlight Current Page
- [X] Imporve active menu filtering when issue closed [laravel-menu] (https://github.com/lavary/laravel-menu/issues/20)
- [ ] Add Clientside Validation to all Forms / now only Login has it
- [ ] Replace / route
- [ ] Improve Language detection
- [ ] Notification also when success not only on errors


# Images
![Laravel Starter Set Login Screen](/readme/img/login.png?raw=true "Login Screen")
![Laravel Starter Set Register Screen](/readme/img/register.png?raw=true "Register Screen")
