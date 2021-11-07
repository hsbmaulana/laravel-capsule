<?php

namespace App\Providers\Fortify;

use Laravel\Fortify\Fortify;

class ConfirmeremailProvider
{
    /**
     * @return null
     */
    public function __invoke()
    {
        Fortify::verifyEmailView(function ($request) {

            return view('auth.confirm-email');
        });

        return $instance = null;
    }
}