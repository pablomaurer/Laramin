<?php

class AuthController extends Controller {

    // Login
    public function getLogin()
    {
        return View::make('auth.login');
    }

    public function postLogin() //todo add throttling?
    {
        try
        {
            $credentials = array(
                'email'    => Input::get('email'),
                'password' => Input::get('password'),
            );

            $user = Sentry::authenticate($credentials, Input::get('remember'));
            return Redirect::route('dashboard'); //todo Prio Critical: change redirect after login, to dashboard or home or whatever make setting for this..
        }
        catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
        {
            echo 'Login field is required.';
        }
        catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
        {
            echo 'Password field is required.';
        }
        catch (Cartalyst\Sentry\Users\WrongPasswordException $e)
        {
            echo 'Wrong password, try again.';
        }
        catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
        {
            echo 'User was not found.';
        }
        catch (Cartalyst\Sentry\Users\UserNotActivatedException $e)
        {
            echo 'User is not activated.';
        }
    }

    // Logout
    public function getLogout()
    {
        Sentry::logout();
        return Redirect::route('login'); //todo redirect to public home
    }

    // Register
    public function getRegister()
    {
        return View::make('auth.register');
    }

    public function postRegister()
    {
        try
        {
            // Let's register a user.
            $user = Sentry::register(Input::all(), true); //todo remove true, because should no activate on reg, but later if mail confirm is succseful

            // todo email activation
            $activationCode = $user->getActivationCode();
            // Send activation code to the user so he can activate the account
            return Redirect::route('confirm');
        }
        catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
        {
            echo 'Login field is required.';
        }
        catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
        {
            echo 'Password field is required.';
        }
        catch (Cartalyst\Sentry\Users\UserExistsException $e)
        {
            echo 'User with this login already exists.';
        }
    }

    // Confirm
    public function getConfirm()
    {
        return View::make('auth.confirm');
    }

    public function postConfirm()
    {

    }

    // Reset
    public function getReset()
    {
        return View::make('auth.reset');
    }

    public function postReset()
    {
        //return View::make('auth.login');
    }

    // Test
    public function showAdmin()
    {
        return View::make('test');
    }
}