<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LandingPageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingPageController::class, 'index']);
Route::view('/tasks', 'tasks/index')->middleware('auth')->name('tasks.index');

Route::get('/login', [AuthController::class, 'showLoginPage'])
	->middleware('guest')->name('login.index');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
