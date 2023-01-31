<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;

Route::controller(ChatController::class)
    ->prefix('/app/chat')
    ->middleware(['auth:sanctum'])
    ->name('app.chat.')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/send-message', 'store')->name('store');
    });
