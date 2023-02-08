<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\App\AdminController;

Route::controller(AdminController::class)
    ->prefix('/app/admin')
    ->middleware(['auth:sanctum'])
    ->name('app.admin.')
    ->group(function () {
        Route::get('/', 'index')->name('index');
    });
