<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\App\InboxController;

Route::controller(InboxController::class)
    ->prefix('/app/inbox')
    ->middleware(['auth:sanctum'])
    ->name('app.inbox.')
    ->group(function () {
        Route::get('/', 'index')->name('index');
    });
