<?php

namespace App\Providers\Fortify;

use App\Http\Controllers\Auth\Registration;
use Laravel\Fortify\Fortify;

class RegistrationProvider
{
    /**
     * @return \App\Http\Controllers\Auth\Registration|null
     */
    public function __invoke()
    {
        Fortify::registerView(function ($request) {

            return view('auth.register');
        });

        Fortify::createUsersUsing(get_class($instance = new Registration()));

        return $instance;
    }
}