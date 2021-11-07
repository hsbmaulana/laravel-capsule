<?php

namespace App\Providers\Fortify;

use Laravel\Fortify\Fortify;

class ConfirmerpasswordProvider
{
    /**
     * @return null
     */
    public function __invoke()
    {
        Fortify::confirmPasswordView(function ($request) {

            return view('auth.confirm-password');
        });

        return $instance = null;
    }
}