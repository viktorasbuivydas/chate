<?php

use App\Http\Controllers\App\InboxController;
use Illuminate\Support\Facades\Route;

Route::controller(InboxController::class)
    ->prefix('/app/inbox')
    ->middleware(['auth:sanctum'])
    ->name('app.inbox.')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/{conversation}', 'show')->name('show');
        Route::post('/{conversation}/messages', 'store')->name('store');
    });
