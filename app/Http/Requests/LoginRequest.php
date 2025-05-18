<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
	public function authorize(): bool
	{
		return true;
	}

	public function rules(): array
	{
		return [
			'email'    => ['required', 'email'],
			'password' => ['required', 'min:4'],
		];
	}

	public function messages()
	{
		return [
			'email.required'    => 'Enter your email address',
			'email.email'       => 'Enter a valid email address',
			'password.required' => 'Enter your password',
			'password.min'      => 'Password must be at least 4 characters long',
		];
	}
}
