<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\App\ProfileController;
use App\Http\Controllers\App\ProfileInformationController;

Route::controller(ProfileController::class)
    ->prefix('/app/profile')
    ->middleware(['auth:sanctum'])
    ->name('app.profile.')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/password', 'password')->name('password');
        Route::get('/sessions', 'sessions')->name('sessions');
        Route::get('/about/{name}', 'about')->name('about');
    });

Route::put('/user/profile-information', [ProfileInformationController::class, 'update'])
    ->middleware([config('fortify.auth_middleware', 'auth') . ':' . config('fortify.guard')])
    ->name('user-profile-information.update');
