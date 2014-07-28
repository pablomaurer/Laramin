<?php

class LoginController extends Controller {

    // Login
    public function getLogin()
    {
        return View::make('modules.shared.login.login');
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
            return Response::json(array('notification' => route("dashboard"))); //todo Prio Low: make as a setting
        }
        catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
        {
            Notification::danger('Login field is required.');
            return Response::json(array('notification' => true));
        }
        catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
        {
            Notification::danger('Password field is required.');
            return Response::json(array('notification' => true));
        }
        catch (Cartalyst\Sentry\Users\WrongPasswordException $e)
        {
            Notification::danger('Wrong password, try again.');
            return Response::json(array('notification' => true));
        }
        catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
        {
            Notification::danger('User not found');
            return Response::json(array('notification' => true));
        }
        catch (Cartalyst\Sentry\Users\UserNotActivatedException $e)
        {
            Notification::danger('User is not activated.');
            return Response::json(array('notification' => true));
        }
    }

    // Logout
    public function getLogout()
    {
        Sentry::logout();
        return Redirect::route('login'); //todo Prio Low: redirect to public home
    }

    // ResetCode
    public function getResetCode()
    {
        return View::make('modules.shared.login.reset');
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
            Notification::danger('User was not found.');
            return Response::json(array('notification' => true));
        }
    }

    // Confirm ResetCode
    // only get, because if user click on confirmationLink in mail.. it cannot be post.
    public function getConfirmResetCode()
    {
        return View::make('modules.shared.login.confirmResetCode');
    }

    // Confirm
    // if manually entered or in the js in the view triggered the submit btn to automate it.
    public function postConfirmResetCode()
    {
        if (Input::has('resetCode'))
        {
            try
            {
                $user = Sentry::findUserByResetPasswordCode(Input::get('resetCode'));
                if ($user->checkResetPasswordCode(Input::get('resetCode')))
                {
                    Session::put('resetCode', Input::get('resetCode'));
                    return Response::json(array('url' => route("newPassword"))); //->withInput();
                }
            }
            catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
            {
                Notification::danger('No User found with this Reset Code. Check your Reset Code!');
                return Response::json(array('notification' => true));
            }
        }
    }

    // New Password
    public function getSetNewPassword()
    {
        if (Session::has('resetCode')) {
            $resetCode = Session::get('resetCode');
            Session::forget('resetCode');
            return View::make('modules.shared.login.newPassword',array('resetCode' => $resetCode));
        } else {
            Notification::danger('We didnt get the Reset Code.');
            return Response::json(array('notification' => true));
        }
        /*if (Input::has('resetCode') || Input::old()) { k todo j

            if (Input::has('resetCode')) {
                $resetCode = Input::get('resetCode');
            } else {
                $resetCode = Input::old('resetCode');
            }
            return View::make('modules.shared.login.newPassword',array('resetCode' => $resetCode));
        } else {
            Notification::danger('We didnt get the Reset Code.');
            return Response::json(array('notification' => true));
        }*/
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
                Notification::danger('Password Reset failed');
                return Response::json(array('notification' => true));
            }
        }
        else
        {
            Notification::danger('We didnt get the ResetCode or Password!');
            return Response::json(array('notification' => true));
        }
    }
}