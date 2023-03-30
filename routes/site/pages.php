<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return inertia('Auth/Login');
})->middleware('guest');

Route::get('/roadmap', function () {
    return inertia('Roadmap');
});
