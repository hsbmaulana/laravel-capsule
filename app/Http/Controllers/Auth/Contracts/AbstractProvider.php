<?php

namespace App\Http\Controllers\Auth\Contracts;

use Error;
use Exception;

abstract class AbstractProvider
{
    /**
     * @return \Illuminate\Contracts\Auth\Authenticatable
     * @throws \Exception
     */
    protected function provide()
    {
        $provider = auth()->guard()->getProvider();

        if ($provider instanceof \Illuminate\Auth\EloquentUserProvider) {

            return $provider->createModel();

        } else if ($provider instanceof \Illuminate\Auth\DatabaseUserProvider) {

            throw new Exception("Not supported provider yet.");

        } else {

            throw new Exception("Undefined provider.");
        }
    }
}