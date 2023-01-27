<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::controller(AuthController::class)
    ->group(function () {
        Route::get('/login', 'login');
        Route::post('/login', 'loginUser')->name('login');
    });
