<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileEditRequest extends FormRequest
{
	public function rules(): array
	{
		return [
			'current_password' => ['required', 'current_password'],
			'password'         => ['required', 'confirmed', 'min:4'],
			'profile_image'    => ['nullable', 'image'],
			'cover_image'      => ['nullable', 'image'],
		];
	}
}
