<?php

use App\Http\Controllers\App\Admin\ChatController;
use Illuminate\Support\Facades\Route;

Route::controller(ChatController::class)
    ->prefix('/app/admin/chat')
    ->middleware(['auth:sanctum', 'role:admin|super admin'])
    ->name('app.admin.chat.')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/rooms', 'rooms')->name('rooms');
        Route::get('/create', 'create')->name('room.create');
        Route::post('/create', 'store')->name('room.store');
        Route::get('/{room}', 'room')->name('room.edit');
        Route::patch('/{room}', 'editRoom')->name('room.update');
        Route::delete('/{room}/clear-chat', 'clearChat')
            ->name('room.clear')
            ->middleware('role:super admin');

        Route::delete('/{room}', 'deleteRoom')
            ->name('room.delete')
            ->middleware('role:super admin');
    });
