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

Route::middleware('auth')->controller(TaskController::class)->group(function () {
	Route::get('/tasks', 'index')->name('tasks.index');
	Route::get('/tasks/create', 'create')->name('tasks.create');
	Route::get('/tasks/{task}', 'show')->name('tasks.show');
	Route::get('/tasks/{task}/edit', 'edit')->name('tasks.edit');
	Route::post('/tasks/{task}/edit', 'update')->name('tasks.update');
	Route::post('/tasks/create', 'store')->name('tasks.store');
	Route::delete('/tasks/delete/{task}', 'destroy')->name('tasks.destroy');
	Route::delete('/tasks/delete-overdue', 'destroyOverdue')->name('tasks.destroyOverdue');
});
