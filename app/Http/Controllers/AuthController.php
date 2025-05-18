<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
	public function showLoginPage()
	{
		return view('auth/login');
	}

	public function login()
	{
		$attributes = request()->validate([
			'email'    => ['required', 'email'],
			'password' => ['required', 'min:4'],
		], [
			'email.required'    => 'Enter your email address',
			'email.email'       => 'Enter a valid email address',
			'password.required' => 'Enter your password',
			'password.min'      => 'Password must be at least 4 characters long',
		]);

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
