<?php

namespace App\Http\Middleware;

use Illuminate\Cookie\Middleware\EncryptCookies as Middleware;

class CryptCookie extends Middleware
{
    /**
     * @var array
     */
    protected $except = [];
}