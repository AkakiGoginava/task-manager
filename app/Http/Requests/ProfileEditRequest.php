<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileEditRequest extends FormRequest
{
	public function withValidator($validator)
	{
		$validator->after(function ($validator) {
			$anyPasswordFieldFilled = $this->filled('current_password') || $this->filled('password') || $this->filled('password_confirmation');

			if ($anyPasswordFieldFilled) {
				if (!$this->filled('current_password')) {
					$validator->errors()->add('current_password', __('validation.current_password_required'));
				}

				if (!$this->filled('password')) {
					$validator->errors()->add('password', __('validation.new_password_required'));
				}

				if (!$this->filled('password_confirmation')) {
					$validator->errors()->add('password_confirmation', __('validation.password_confirmation_required'));
				}
			}
		});
	}

	public function rules(): array
	{
		return [
			'current_password' => ['nullable', 'current_password'],
			'password'         => ['nullable', 'confirmed', 'min:4'],
			'profile_image'    => ['nullable', 'image'],
			'cover_image'      => ['nullable', 'image'],
		];
	}
}
