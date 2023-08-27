<?php

use App\Http\Controllers\App\OnlineController;
use Illuminate\Support\Facades\Route;

Route::controller(OnlineController::class)
    ->prefix('/app/online')
    ->middleware(['auth:sanctum'])
    ->name('app.online.')
    ->group(function () {
        Route::get('/', 'index')->name('index');
    });
