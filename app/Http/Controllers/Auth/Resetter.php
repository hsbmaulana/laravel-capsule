<?php

namespace App\Http\Controllers\Auth;

use Error;
use Exception;
use App\Http\Controllers\Auth\Traits\Credential;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\RateLimiter;

class Resetter implements \Laravel\Fortify\Contracts\ResetsUserPasswords
{
    use Credential;

    /**
     * @param \Illuminate\Contracts\Auth\Authenticatable $auth
     * @param array $input
     * @return void
     */
    public function reset($auth, $input)
    {
        $validateddata = Validator::make($input,
        [
            $this->password() => [ 'required', 'string', 'confirmed', ],
        ]
        )->validate();

        $validateddata[$this->password()] = \Illuminate\Support\Facades\Hash::make($validateddata[$this->password()]);

        DB::transaction(function () use ($auth, $validateddata) {

            $auth->forceFill($validateddata)->save();
        });
    }
}