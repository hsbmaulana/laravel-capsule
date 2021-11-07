<?php

namespace App\Providers;

use App\Http\Controllers\Auth\Contracts\Limitable;
use Illuminate\Support\ServiceProvider;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * @var array
     */
    protected $providers =
    [
        \App\Providers\Fortify\LoginProvider::class,
        \App\Providers\Fortify\LogoutProvider::class,
        \App\Providers\Fortify\ConfirmerpasswordProvider::class,
        \App\Providers\Fortify\ConfirmeremailProvider::class,
        \App\Providers\Fortify\ResetterProvider::class,
        \App\Providers\Fortify\RegistrationProvider::class,
    ];

    /**
     * @return void
     */
    // public function register() {}

    /**
     * @return void
     */
    public function boot()
    {
        foreach ($this->providers as $provider) {

            if (($fortify = call_user_func(new $provider)) != null && $fortify instanceof Limitable) {

                $fortify->limit();
            }
        }
    }
}