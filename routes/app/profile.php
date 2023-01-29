<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\App\ProfileController;
use App\Http\Controllers\App\ProfileInformationController;

Route::controller(ProfileController::class)
    ->prefix('/app/profile')
    ->middleware(['auth:sanctum'])
    ->name('app.profile.')
    ->group(function () {
        Route::get('/', [ProfileController::class, 'index'])->name('index');
    });

Route::put('/user/profile-information', [ProfileInformationController::class, 'update'])
    ->middleware([config('fortify.auth_middleware', 'auth') . ':' . config('fortify.guard')])
    ->name('user-profile-information.update');
