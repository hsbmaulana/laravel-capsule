<?php

namespace App\Providers\Fortify;

use App\Http\Controllers\Auth\Resetter;
use Laravel\Fortify\Fortify;

class ResetterProvider
{
    /**
     * @return \App\Http\Controllers\Auth\Resetter|null
     */
    public function __invoke()
    {
        Fortify::requestPasswordResetLinkView(function ($request) {

            return view('auth.forgetreset-send');
        });

        Fortify::resetPasswordView(function ($request) {

            return view('auth.forgetreset-receive', [ 'request' => $request, ]);
        });

        Fortify::resetUserPasswordsUsing(get_class($instance = new Resetter()));

        return $instance;
    }
}