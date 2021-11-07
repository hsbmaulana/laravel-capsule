<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Auth\Contracts\Limitable;
use App\Http\Controllers\Auth\Traits\Credential;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\RateLimiter;

class Login implements Limitable
{
    use Credential;

    /**
     * @return void
     */
    public function limit()
    {
        $identifier = $this->identifier();

        RateLimiter::for('limit-login', function ($request) use ($identifier) {

            return \Illuminate\Cache\RateLimiting\Limit::perMinute(3)->by($request->ip() . '.' . $request->input($identifier));
        });
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Auth\Authenticatable
     */
    public function __invoke($request)
    {
        $provider = auth()->guard()->getProvider();
        $keyidentity = $request->input($this->identifier());
        $keypassword = $request->input($this->password());

        $key = ! filter_var($keyidentity, FILTER_VALIDATE_EMAIL) ? $this->identifier() : $this->identifier('email');
        $prover = $provider->retrieveByCredentials([ $key => $keyidentity, ]);

        if ($prover && $provider->validateCredentials($prover, [ $this->password() => $keypassword, ])) return $prover;
    }
}