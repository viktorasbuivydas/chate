<?php

use App\Http\Controllers\App\ChatController;
use Illuminate\Support\Facades\Route;

Route::controller(ChatController::class)
    ->prefix('/app/chat')
    ->middleware(['auth:sanctum'])
    ->name('app.chat.')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/users', 'users')->name('users');
        Route::name('messages.')
            ->prefix('/{chat:uuid}')
            ->group(function () {
                Route::get('/', 'messages')->name('index');
                Route::post('/send-message', 'store')->name('store');
            });
    });
