<?php

namespace App\Policies;

use App\Models\Task;
use App\Models\User;

class TaskPolicy
{
	public function view(User $user, Task $task): bool
	{
		return false;
	}

	public function update(User $user, Task $task): bool
	{
		return false;
	}

	public function delete(User $user, Task $task): bool
	{
		return $task->user_id === $user->id;
	}
}
