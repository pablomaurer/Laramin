<?php

class RegisterController extends Controller {

    // Register
    public function getRegister()
    {
        return View::make('modules.public.register.register');
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
            return Response::json(array('url' => route("confirm")));
        }
        catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
        {
            Notification::danger('Mail Adress  is required.');
            return Response::json(array('notification' => true));
        }
        catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
        {
            Notification::danger('Password field is required.');
            return Response::json(array('notification' => true));
        }
        catch (Cartalyst\Sentry\Users\UserExistsException $e)
        {
            Notification::danger('User with this login already exists.');
            return Response::json(array('notification' => true));
        }
    }

    // Confirm
    // get, because if user click on confirmationLink in mail.. it cannot be post.
    public function getConfirm()
    {
        return View::make('modules.public.register.confirmActivationCode');
    }

    // Confirm
    // if manually entered or in the js in the view triggered the submit btn to automate it.
    public function postConfirm()
    {
        if (Input::has('activationCode'))
        {
            try
            {
                $user = Sentry::findUserByActivationCode(Input::get('activationCode'));
                if ($user->attemptActivation(Input::get('activationCode')))
                {
                    Sentry::login($user, false);
                    return Response::json(array('url' => route("dashboard")));
                }
            }
            catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
            {
                Notification::danger('No User found with this Activation Code. Check your Activation Code!');
                return Response::json(array('notification' => true));
            }
        }
    }
}