<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Auth\Traits\Credential;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\RateLimiter;

class Logout
{
    use Credential;

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Auth\Authenticatable
     */
    public function __invoke($request)
    {}
}