<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class XCsrfToken extends Middleware
{
    /**
     * @var array
     */
    protected $except = [];
}