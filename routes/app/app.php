<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    Route::get('/app', function () {
        return Inertia::render('App/Index');
    })->name('dashboard');
});
