<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;

Route::controller(AppController::class)
    ->middleware(['auth:sanctum', 'verified'])
    ->group(function () {
        Route::get('/app', 'index')->name('app.index');
    });
