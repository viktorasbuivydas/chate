<?php

use App\Http\Controllers\App\Admin\TopicController;
use Illuminate\Support\Facades\Route;

Route::controller(TopicController::class)
    ->prefix('/app/admin/topic')
    ->middleware(['auth:sanctum', 'role:admin|super admin'])
    ->name('app.admin.topic.')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/{topic}', 'edit')->name('edit');
        Route::patch('/{topic}', 'update')->name('update');
    });
