<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
	public function definition(): array
	{
		$created_at = fake()->dateTimeBetween('-3 months', 'today');

		return [
			'title' => [
				'en' => fake()->word(),
				'ka' => fake()->word(),
			],
			'description' => [
				'en' => fake()->text(300),
				'ka' => fake()->text(300),
			],
			'created_at'  => $created_at,
			'due_date'    => fake()->dateTimeBetween($created_at, '+6 months'),
			'user_id'     => User::inRandomOrder()->first() ?? User::factory(),
		];
	}
}
