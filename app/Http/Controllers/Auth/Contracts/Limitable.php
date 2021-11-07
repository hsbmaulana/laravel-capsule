<?php

namespace App\Http\Controllers\Auth\Contracts;

interface Limitable
{
    /**
     * @return void
     */
    public function limit();
}