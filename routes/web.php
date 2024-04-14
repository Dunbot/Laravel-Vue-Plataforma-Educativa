<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\RoleController;

#Here we would work the routes for the user panel admin

#Dont mix logic with routes function

#Public Routes
Route::get('/', [DashboardController::class, 'index']);


#Private Routes
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard',[DashboardController::class, 'dashboard'])->name('dashboard');
    Route::resource('/categories',CategoryController::class);
    Route::resource('/lessons',LessonController::class);
    Route::resource('/roles',RoleController::class);
});

#Resource help us with crud routes in one instruction


