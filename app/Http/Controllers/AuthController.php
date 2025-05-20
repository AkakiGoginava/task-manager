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
				'email'    => 'Incorrect email or password',
				'password' => 'Incorrect email or password',
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
