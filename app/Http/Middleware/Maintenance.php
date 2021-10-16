<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as Middleware;

class Maintenance extends Middleware
{
    /**
     * @var array
     */
    protected $except = [];
}