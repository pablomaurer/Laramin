## Laramin
A Laravel starter Set (No Package)

### used Packages

used:
* [Sentry](https://github.com/cartalyst/sentry) - for Authenticatoin
* [themify](https://github.com/mpedrera/themify) - for managing Themes
* [widget](https://github.com/gravitano/widget) - for making theme widgets
* [laravel-modules](https://github.com/creolab/laravel-modules) - for cleaner structure 
* [laravel-menu](https://github.com/lavary/laravel-menu) - for managing menus (great guy)
* [Ardent](https://github.com/laravelbook/ardent) - for validating
* [todo](#) - IDE helper for code Completion, alot easyier to work like this... 

Maybe later:
* [notification](https://github.com/edvinaskrucas/notification) - for creating notifications

### usage
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
* Open laramin at "localhost/laramin/public/user/login"

### Todos
* Find a Ajax Notification Way
* Set Current Page
* Create Filters

### Menu
Define you're Menu in app/routes.php

### Modules
* Split you're Application in parts, they go in the app/modules/xy folder
* Add a module.json file, or copy it from an existing one
* create a routes.php
* create a folder "controllers" with YourController.php

### Views
Normally Views are in app/views but because i thing almost everyone should have a cool
Templating system to easy switch out the Views they have to go in "app/themes/default/"
these are at a higher priority than at "app/views" but you dont have to use my themes folder
but if you do, it will just work.

### Widgets
If you have stuff that should be available in all Views ... TODO
