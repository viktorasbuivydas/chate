<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\App\Admin\ChatController;

Route::controller(ChatController::class)
    ->prefix('/app/admin/chat')
    ->middleware(['auth:sanctum'])
    ->name('app.admin.chat.')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/rooms', 'rooms')->name('rooms');
        Route::get('/{room}', 'room')->name('room.edit');
    });
