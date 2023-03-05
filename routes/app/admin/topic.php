<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\App\Admin\TopicController;

Route::controller(TopicController::class)
    ->prefix('/app/admin/topic')
    ->middleware(['auth:sanctum', 'role:admin|super admin'])
    ->name('app.admin.topic.')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/{topic}', 'edit')->name('edit');
        Route::patch('/{topic}', 'update')->name('update');
    });
