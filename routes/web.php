<?php

use Illuminate\Support\Facades\Route;

Route::get(\App\Providers\RouteServiceProvider::HOME, function () {

    return auth()->user();

})->name('home')->middleware([ 'auth' . ':' . config('auth.defaults.guard'), 'account.confirmed', ]);