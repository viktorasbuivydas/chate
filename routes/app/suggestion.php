<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\App\SuggestionController;

Route::controller(SuggestionController::class)
    ->prefix('/app/suggestions')
    ->middleware(['auth:sanctum'])
    ->name('app.suggestions.')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/create', 'store')->name('store');
        Route::get('/{suggestion}/comments', 'show')->name('show');
        Route::post('/{suggestion}/update-rating', 'updateRating')->name('update-rating');
        Route::post('/{suggestion}/comments', 'storeComment')->name('comments.store');
    });
