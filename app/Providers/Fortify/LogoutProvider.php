<?php

namespace App\Providers\Fortify;

use App\Http\Controllers\Auth\Logout;
use Laravel\Fortify\Fortify;

class LogoutProvider
{
    /**
     * @return \App\Http\Controllers\Auth\Logout|null
     */
    public function __invoke()
    {
        return $instance = new Logout();
    }
}