<?php

namespace App\Providers\Fortify;

use App\Http\Controllers\Auth\Login;
use Laravel\Fortify\Fortify;

class LoginProvider
{
    /**
     * @return \App\Http\Controllers\Auth\Login|null
     */
    public function __invoke()
    {
        Fortify::loginView(function ($request) {

            return view('auth.login');
        });

        Fortify::authenticateUsing($instance = new Login());

        return $instance;
    }
}