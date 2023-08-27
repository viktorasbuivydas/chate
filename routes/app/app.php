<?php

use App\Http\Controllers\AppController;
use Illuminate\Support\Facades\Route;

Route::controller(AppController::class)
    ->middleware(['auth:sanctum', 'verified'])
    ->group(function () {
        Route::get('/app', 'index')->name('app.index');
    });
