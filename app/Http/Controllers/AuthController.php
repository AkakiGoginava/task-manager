<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
	public function login(LoginRequest $request): RedirectResponse
	{
		$attributes = $request->validated();

		if (!Auth::attempt($attributes)) {
			throw ValidationException::withMessages([
				'email'    => __('validation.login_failed'),
				'password' => __('validation.login_failed'),
			]);
		}

		request()->session()->regenerate();

		return redirect()->route('tasks.index');
	}

	public function logout(): RedirectResponse
	{
		Auth::logout();

		return redirect('/');
	}
}
