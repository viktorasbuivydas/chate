<?php

use App\Http\Controllers\App\AdminController;
use Illuminate\Support\Facades\Route;

Route::controller(AdminController::class)
    ->prefix('/app/admin')
    ->middleware(['auth:sanctum'])
    ->name('app.admin.')
    ->group(function () {
        Route::get('/', 'index')->name('index');
    });
