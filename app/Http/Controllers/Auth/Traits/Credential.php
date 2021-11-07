<?php

namespace App\Http\Controllers\Auth\Traits;

trait Credential
{
    /**
     * @param string $key
     * @return string
     */
    protected function identifier($key = 'username')
    {
        return $key != 'email' ? config('fortify.username') : config('fortify.email');
    }

    /**
     * @return string
     */
    protected function password()
    {
        return 'password';
    }
}
