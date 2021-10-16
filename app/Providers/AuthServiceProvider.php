<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * @var array
     */
    protected $policies = [];

    /**
     * @return void
     */
    // public function register() {}

    /**
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        $this->authenticate();
        $this->authorize();
    }

    /**
     * @return void
     */
    protected function authenticate()
    {}

    /**
     * @return void
     */
    protected function authorize()
    {}
}