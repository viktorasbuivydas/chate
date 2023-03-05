<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\App\OnlineController;

Route::controller(OnlineController::class)
    ->prefix('/app/online')
    ->middleware(['auth:sanctum'])
    ->name('app.online.')
    ->group(function () {
        Route::get('/', 'index')->name('index');
    });
