<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\App\InboxController;

Route::controller(InboxController::class)
    ->prefix('/app/profile')
    ->middleware(['auth:sanctum'])
    ->name('app.profile.')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/new', 'new')->name('new');
    });
