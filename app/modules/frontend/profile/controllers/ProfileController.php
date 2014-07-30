<?php

class ProfileController extends Controller {

    // Dashboard
    public function getDashboard()
    {
        return View::make('modules.frontend.profile.dashboard');
    }

}