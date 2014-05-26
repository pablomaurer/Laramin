<?php

class UserController extends Controller {

    // Dashbaord
    public function getDashboard()
    {
        return View::make('user.dashboard');
    }

}