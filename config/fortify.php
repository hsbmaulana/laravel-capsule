<?php

use Laravel\Fortify\Features;

return [

    // Start of Configuration //

    'username' => 'name',
    'email' => 'email',

    'prefix' => 'auth',
    'domain' => null,
    'middleware' => [ 'web', ],

    'views' => true,

    // End of Configuration //



    // Start of Provides //

    'features' => [

        // Features::emailVerification(), //
        // Features::resetPasswords(), //
        // Features::registration(), //
    ],

    'redirects' => [

        // 'login' => null, 'logout' => null, 'password-confirmation' => null, //
        // 'email-verification' => null, //
        // 'password-reset' => null, //
        // 'register' => null, //
    ],

    'limiters' => [

        'login' => 'limit-login',
        // 'logout' => 'limit-logout', //
        'verification' => '2,1',
    ],

    'pipelines' => [

        // 'login' => null, //
        // 'logout' => null, //
    ],

    // End of Provides //



    'guard' => config('auth.defaults.guard'), 'passwords' => config('auth.defaults.passwords'), 'home' => App\Providers\RouteServiceProvider::HOME,
];