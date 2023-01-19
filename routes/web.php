<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('App/Index');
});

Route::group([], base_path('routes/app/chat.php'));
Route::group([], base_path('routes/site/auth.php'));
