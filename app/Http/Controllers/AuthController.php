<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
	public function showLoginPage()
	{
		return view('auth/login');
	}

	public function login(LoginRequest $request)
	{
		$attributes = $request->validated(['email', 'password']);

		if (!Auth::attempt($attributes)) {
			throw ValidationException::withMessages([
				'email'    => 'Incorrect email or password',
				'password' => 'Incorrect email or password',
			]);
		}

		request()->session()->regenerate();

		return redirect()->route('tasks.index');
	}

	public function logout()
	{
		Auth::logout();

		return redirect('/');
	}
}
