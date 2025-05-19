<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingPageController::class, 'index']);

Route::controller(AuthController::class)->group(function () {
	Route::get('/login', 'showLoginPage')->middleware('guest')->name('login.index');
	Route::post('/login', 'login')->name('login');
	Route::post('/logout', 'logout')->name('logout');
});

Route::controller(TaskController::class)->group(function () {
	Route::get('/tasks', 'index')->middleware('auth')->name('tasks.index');
});
