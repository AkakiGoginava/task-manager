<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTaskRequest extends FormRequest
{
	public function rules(): array
	{
		return [
			'title.en'       => ['required', 'min:3', 'regex:/^[a-zA-Z0-9\s\.,!?\'-]+$/'],
			'title.ka'       => ['required', 'min:3', 'regex:/^[\x{10A0}-\x{10FF}\s\.,!?-]+$/u'],
			'description.en' => ['required', 'min:3', 'regex:/^[a-zA-Z0-9\s\.,!?\'-]+$/'],
			'description.ka' => ['required', 'min:3', 'regex:/^[\x{10A0}-\x{10FF}\s\.,!?-]+$/u'],
			'due_date'       => ['required', 'date_format:d/m/Y', 'after:today'],
		];
	}

	public function messages(): array
	{
		return [
			'title.en.regex'                   => 'Must contain English letters only.',
			'description.en.regex'             => 'Must contain English letters only.',
			'title.ka.regex'                   => 'Must contain Georgian letters only.',
			'description.ka.regex'             => 'Must contain Georgian letters only.',
			'due_date.after'                   => 'Due date must be in the future.',
			'required'                         => 'Field is required.',
			'min'                              => 'Must be at least 3 characters long.',
		];
	}
}
