<?php

use Illuminate\Support\Facades\Route;

Route::name('auth.')->prefix('auth')->middleware('auth')->group(function () {

    Route::prefix('setting')->group(function () {

        Route::post('activation', [ \App\Http\Controllers\Auth\Setting\Activation::class, 'store', ])->name('activation');
        Route::post('deactivation', [ \App\Http\Controllers\Auth\Setting\Deactivation::class, 'store', ])->name('deactivation');
    });
});