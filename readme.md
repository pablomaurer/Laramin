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
A Laravel starter Set Backend and Frontend based on Bootstrap. I didnt knew how to work clean with Laravel, so I found my own way with the help of some packages. Now you can develop easy, clear and everybody will ever know what goes where..

## Installation
* Git clone
* Install Composer
* Run Composer update
* create new empty database in PhpMyAdmin or console "create database xy"
* Setup Settings in `laramin/app/config` database.php and mail.php
* Run "php artisan mirgrate"
* Run "php artisan migrate --package=cartalyst/sentry"
* Open laramin at "localhost/laramin/public/user/login"

## used Packages

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
Define you're Menu in app/routes.php

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

# Widgets
If you have stuff that should be available in all Views ... TODO

# Todos
[ ] Set Current Page
[ ]  

# Images
