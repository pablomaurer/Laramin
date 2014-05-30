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
            return Redirect::route('dashboard'); //todo Prio Low: make as a setting
        } //todo Prio Mid: create messages for exceptions
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
        return Redirect::route('login'); //todo Prio Low: redirect to public home
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
            $user = Sentry::register(Input::all(), false);

            // Save activationCode and Email in user
            $data = array(
                'activationCode' => $user->getActivationCode(),
                'email' => Input::get('email'),
            );

            // Send email to new registered user, with previous filled Data. So he can activate the profile.
            Mail::send('emails.confirmation', $data, function($message)
            {
                $message->to(Input::get('email'), Input::get('email'))->subject(trans('login.confirmMailTitle'));
            });

            // After Sending the mail, redirect to the profileActivation Page
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
    // only get, because if user click on confirmationLink in mail.. it cannot be post.
    public function getConfirm()
    {
        if (Input::has('activationCode'))
        {
            try
            {
                $user = Sentry::findUserByActivationCode(Input::get('activationCode'));
                if ($user->attemptActivation(Input::get('activationCode')))
                {
                    Sentry::login($user, false);
                    return Redirect::route('dashboard');
                }
                else
                {
                    echo "wrong activation code"; //todo fix exception handling
                }
            }
            catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
            {
                echo 'User was not found.';
            }
        }
        return View::make('auth.confirm');
    }

    // ResetCode
    public function getResetCode()
    {
        return View::make('auth.reset');
    }

    public function postResetCode()
    {
        try
        {
            // Find the user using the user email address
            $user = Sentry::findUserByLogin(Input::get('email'));

            // Save ResetCode and Email in user
            $data = array(
                'resetCode' => $user->getResetPasswordCode(),
                'email' => Input::get('email'),
            );

            // Send email to new registered user, with previous filled Data. So he can activate the profile.
            Mail::send('emails.reset', $data, function($message)
            {
                $message->to(Input::get('email'), Input::get('email'))->subject(trans('login.confirmResetMailTitle'));
            });

            // After Sending the mail, redirect to the PasswordReset-Confirmation Page
            return Redirect::route('confirmReset');
        }
        catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
        {
            echo 'User was not found.';
        }
    }

    // Confirm ResetCode
    // only get, because if user click on confirmationLink in mail.. it cannot be post.
    public function getConfirmResetCode() {
        if (Input::has('resetCode'))
        {
            try
            {
                $user = Sentry::findUserByResetPasswordCode(Input::get('resetCode'));
                if ($user->checkResetPasswordCode(Input::get('resetCode')))
                {
                    return Redirect::route('newPassword')->withInput();
                }
                else
                {
                    echo "wrong ResetCode"; //todo fix exception handling
                }
            }
            catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
            {
                echo 'User was not found.';
            }
        }
        return View::make('auth.confirmResetCode');
    }

    // New Password
    public function getSetNewPassword() {
        if (Input::has('resetCode') || Input::old()) {

            if (Input::has('resetCode')) {
                $resetCode = Input::get('resetCode');
            } else {
                $resetCode = Input::old('resetCode');
            }
            return View::make('auth.newPassword',array('resetCode' => $resetCode));
        } else {
            echo "We didnt get the resetCode";
        }
    }

    public function postSetNewPassword() {
        if ((Input::has('resetCode')) && (Input::has('password')))
        {
            $user = Sentry::findUserByResetPasswordCode(Input::get('resetCode'));
            if ($user->attemptResetPassword(Input::get('resetCode'), Input::get('password')))
            {
                Sentry::login($user, false);
                return Redirect::route('dashboard');
            }
            else
            {
                echo "Password Reset failed";
            }
        }
        else
        {
            echo "We didnt get the ResetCode or Password!";
        }
    }

    // Test
    public function showAdmin()
    {
        return View::make('test');
    }
}