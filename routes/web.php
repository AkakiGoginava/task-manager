<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingPageController::class, 'index']);

Route::controller(AuthController::class)->group(function () {
	Route::view('/login', 'auth.login')->middleware('guest')->name('login.index');
	Route::post('/login', 'login')->name('login');
	Route::post('/logout', 'logout')->name('logout');
});

Route::middleware('auth')
	->controller(TaskController::class)
	->prefix('tasks')
	->name('tasks.')
	->group(function () {
		Route::get('/', 'index')->name('index');
		Route::view('/create', 'tasks.create')->name('create');
		Route::get('/{task}', 'show')->name('show');
		Route::get('/{task}/edit', 'edit')->name('edit');
		Route::post('/{task}/edit', 'update')->name('update');
		Route::post('/create', 'store')->name('store');
		Route::delete('/delete/{task}', 'destroy')->name('destroy');
		Route::delete('/delete-overdue', 'destroyOverdue')->name('destroyOverdue');
	});

Route::middleware('auth')->controller(ProfileController::class)->group(function () {
	Route::get('/profile', 'index')->name('profile.index');
	Route::put('/profile', 'update')->name('profile.update');
});
