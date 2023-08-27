<?php

use App\Http\Controllers\App\SuggestionController;
use Illuminate\Support\Facades\Route;

Route::controller(SuggestionController::class)
    ->prefix('/app/suggestions')
    ->middleware(['auth:sanctum'])
    ->name('app.suggestions.')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/create', 'store')->name('store');
        Route::post('/{suggestion}/update-rating', 'updateRating')->name('update-rating');
        Route::post('/{suggestion}/comments', 'storeComment')->name('comments.store');
        Route::get('/{suggestion}/comments/', 'comments')->name('comments.index');
        Route::get('/{suggestion}', 'show')->name('show');
    });
