<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LandingPageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingPageController::class, 'index']);
Route::view('/tasks', 'tasks/index')->middleware('auth')->name('tasks.index');

Route::controller(AuthController::class)->group(function () {
	Route::get('/login', 'showLoginPage')->middleware('guest')->name('login.index');
	Route::post('/login', 'login')->name('login');
	Route::post('/logout', 'logout')->name('logout');
});
