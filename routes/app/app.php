<?php

use App\Http\Controllers\AppController;
use Illuminate\Support\Facades\Route;

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/app', [AppController::class, 'index'])->name('app');
});
