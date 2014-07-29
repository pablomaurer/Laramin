<?php

/*
|--------------------------------------------------------------------------
| Language Detection
|--------------------------------------------------------------------------
|
| Here we detect the Language settings of the Browser and use it to set the
| Application language //todo improve
|
*/
$browser_lang = substr(Request::server('HTTP_ACCEPT_LANGUAGE'), 0, 2);
if ($browser_lang != null) {
    App::setLocale($browser_lang);
}
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
| Test stuff
|--------------------------------------------------------------------------
|
| just if i wanna run a function onetime, todo remove this later..
|
*/
/*
//-------------------------------------------------
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

//------------------------------------------------
// Todo Created in order to have a test User with Group, make this stuff as option in admin section
    $user->addGroup($adminGroup);

//-------------------------------------------------
// Todo Createt for test add this to admin section
    $throttle = Sentry::findThrottlerByUserId(20);
    $throttle->unsuspend();
*/