<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\RateLimiter;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * @var string
     */
    public const HOME = '/home';

    /**
     * @return void
     */
    // public function register() {}

    /**
     * @return void
     */
    public function boot()
    {
        $this->configureLimit();

        $this->routes(function () {

            // Route::prefix('api')->middleware('api')->namespace($this->namespace)->group(base_path('routes/api.php'));
            Route::middleware('web')->namespace($this->namespace)->group(base_path('routes/web.php'));
        });
    }

    /**
     * @return void
     */
    protected function configureLimit() {}
}