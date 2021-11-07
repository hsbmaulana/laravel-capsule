<?php

namespace App\Http\Controllers\Auth;

use Error;
use Exception;
use App\Http\Controllers\Auth\Contracts\AbstractProvider;
use App\Http\Controllers\Auth\Traits\Credential;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\RateLimiter;

class Registration extends AbstractProvider implements \Laravel\Fortify\Contracts\CreatesNewUsers
{
    use Credential;

    /**
     * @param array $input
     * @return \Illuminate\Contracts\Auth\Authenticatable
     */
    public function create($input)
    {
        $auth = $this->provide();

        $validateddata = Validator::make($input,
        [
            $this->identifier('username') => [ 'required', 'string', 'regex:/^[0-9a-zA-Z]+$/', 'min:2', 'max:15', 'unique:' . get_class($auth) . ',' . $this->identifier('username'), ],
            $this->identifier('email') => [ 'required', 'string', 'email', 'min:2', 'max:64', 'unique:' . get_class($auth) . ',' . $this->identifier('email'), ],
            $this->password() => [ 'required', 'string', 'confirmed', ],
        ]
        )->validate();

        $validateddata[$this->password()] = \Illuminate\Support\Facades\Hash::make($validateddata[$this->password()]);

        DB::transaction(function () use (&$auth, $validateddata) {

            $auth = $auth->create($validateddata);
        });

        return $auth;
    }
}