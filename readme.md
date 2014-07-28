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
A Laravel starter Set Backend and Frontend (No Package)

Cause i didnt knew how to work clean with Laravel, i found my own way
with the help of some packages.

Now you can develop easy, clear and you will ever know where you which
files.

## Installation
* Git clone
* Install Composer
* Run Composer update
* create new empty database in PhpMyAdmin or console "create database xy"
* Setup Settings in laramin/app/config database.php and mail.php
* Run "php artisan mirgrate"
* Run "php artisan migrate --package=cartalyst/sentry"
* Open laramin at "localhost/laramin/public/user/login"

## used Packages

used:
* [Sentry](https://github.com/cartalyst/sentry) -  Authenticatoin
* [themify](https://github.com/mpedrera/themify) - managing Themes
* [widget](https://github.com/gravitano/widget) -  making theme widgets
* [laravel-modules](https://github.com/creolab/laravel-modules) - cleaner structure 
* [laravel-menu](https://github.com/lavary/laravel-menu) - managing menus (great guy)
* [Ardent](https://github.com/laravelbook/ardent) - validating
* [todo](#) - IDE helper code completion
* [notification](https://github.com/edvinaskrucas/notification) - notifications

Maybe later:
* [presenter] (https://github.com/robclancy/presenter) - TODO

# Menu
Define you're Menu in app/routes.php

# Modules
There are 4 Folders wich can contain modules, they are
* app/modules/backend - modules for managers
* app/modules/frontend - modules for logged in users
* app/modules/shared - modules for managers and logged in users
* app/modules/public - modules for guests

Split you're Application in modules inside these folders.

##### Module Folder contains
* module.json file copy a existing or create a new one.
* routes.php
* folder "controllers" with YourController.php

##### Modules advanced
* use app/config/packages/creolab/ to change settings for this module stuff

##### Most new Stuff you do will need
1.model
2.controller
4.route
5.menu
6.view ->title etc..

# Views
Normally Views are in app/views but because i thing almost everyone should have a cool
Templating system to easy switch out the Views they have to go in "app/themes/default/"
these are at a higher priority than at "app/views" but you dont have to use my themes folder
but if you do, it will just work.

# Widgets
If you have stuff that should be available in all Views ... TODO

# Todos
* Set Current Page
* Create Filters

# Images
