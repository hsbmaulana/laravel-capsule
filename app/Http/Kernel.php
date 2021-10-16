<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as NetKernel;

class Kernel extends NetKernel
{
    /**
     * @var array
     */
    protected $middleware =
    [
        // \App\Http\Middleware\TrustHosts::class,
        // \App\Http\Middleware\TrustProxies::class,
        \App\Http\Middleware\Maintenance::class,
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        \App\Http\Middleware\Trimmer::class,
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
    ];

    /**
     * @var array
     */
    protected $middlewareGroups =
    [
        'web' =>
        [
            \App\Http\Middleware\CryptCookie::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\Session\Middleware\AuthenticateSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\XCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],

        'api' => [],
    ];

    /**
     * @var array
     */
    protected $routeMiddleware =
    [
        'guest' => \App\Http\Middleware\Guest::class,
        'auth' => \App\Http\Middleware\Authentication::class,
        'can' => \App\Http\Middleware\Authorization::class,

        'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
        'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'throttle.inmemory' => \Illuminate\Routing\Middleware\ThrottleRequestsWithRedis::class,
        'account.confirmed' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
        'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
    ];
}