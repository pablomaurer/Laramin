## Laramin
A Laravel starter Set Backend and Frontend (No Package)

Cause i didnt knew how to work clean with Laravel, i found my own way
with the help of some packages.

Now you can develop easy, clear and you will ever know where you which
files.

### used Packages

used:
* [Sentry](https://github.com/cartalyst/sentry) - for Authenticatoin
* [themify](https://github.com/mpedrera/themify) - for managing Themes
* [widget](https://github.com/gravitano/widget) - for making theme widgets
* [laravel-modules](https://github.com/creolab/laravel-modules) - for cleaner structure 
* [laravel-menu](https://github.com/lavary/laravel-menu) - for managing menus (great guy)
* [Ardent](https://github.com/laravelbook/ardent) - for validating
* [todo](#) - IDE helper for code Completion, alot easyier to work like this...
* [notification](https://github.com/edvinaskrucas/notification) - for creating notifications

Maybe later:
* [presenter] (https://github.com/robclancy/presenter) - for TODO

### new modules may needs
1.model
2.controller
4.route
5.menu
6.view ->title etc..

### Installation
* Git clone
* Install Composer
* Run Composer update
* create new empty database in PhpMyAdmin or console "create database xy"
* Setup Setting in laramin/app/config database.php and mail.php
* Run "php artisan mirgrate"
* Run "php artisan migrate --package=cartalyst/sentry"
* Open laramin at "localhost/laramin/public/user/login"

### Todos
* Set Current Page
* Create Filters

### Menu
Define you're Menu in app/routes.php

### Modules
There are 4 Folders wich can contain modules, they are
* app/modules/backend - modules for managers
* app/modules/frontend - modules for logged in users
* app/modules/shared - modules for managers and logged in users
* app/modules/public - modules for guests

Split you're Application in modules inside these folders.

#### Module Folder contains
* module.json file copy a existing or create a new one.
* routes.php
* folder "controllers" with YourController.php

#### Modules advanced
* use app/config/packages/creolab/ to change settings for this module stuff

### Views
Normally Views are in app/views but because i thing almost everyone should have a cool
Templating system to easy switch out the Views they have to go in "app/themes/default/"
these are at a higher priority than at "app/views" but you dont have to use my themes folder
but if you do, it will just work.

### Widgets
If you have stuff that should be available in all Views ... TODO
