<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Validator;

class RegisterUser extends Command
{
	protected $signature = 'app:register-user';

	protected $description = 'Register user';

	public function handle()
	{
		do {
			$name = $this->ask('Enter your name');

			$validator = Validator::make(
				['name' => $name],
				['name' => 'required']
			);

			if ($validator->fails()) {
				$this->error($validator->errors()->first('email'));
			}
		} while ($validator->fails());

		do {
			$email = $this->ask('Enter your email');

			$validator = Validator::make(
				['email' => $email],
				['email' => 'required|email|unique:users']
			);

			if ($validator->fails()) {
				$this->error($validator->errors()->first('email'));
			}
		} while ($validator->fails());

		do {
			$password = $this->secret('Enter your password');

			$validator = Validator::make(
				['password' => $password],
				['password' => 'required|min:4']
			);

			if ($validator->fails()) {
				$this->error($validator->errors()->first('password'));
			}
		} while ($validator->fails());

		do {
			$passwordConfirmation = $this->secret('Confirm password');

			if ($password !== $passwordConfirmation) {
				$this->error('Passwords do not match, try again');
			}
		} while ($password !== $passwordConfirmation);

		User::create([
			'name'     => $name,
			'email'    => $email,
			'password' => $password,
		]);

		$this->info('User created successfully');
	}
}
