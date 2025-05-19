<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class TaskController extends Controller
{
	public function index(Request $request)
	{
		$user = Auth::user();

		$query = $user->tasks();

		if ($request->query('filter') === 'due_tasks') {
			$query->where('due_date', '<', now());
		}

		$tasks = $query->paginate(8);

		return view('tasks.index', [
			'tasks' => $tasks,
		]);
	}

	public function create()
	{
	}

	public function store(StoreTaskRequest $request)
	{
	}

	public function show(Task $task)
	{
		Gate::authorize('view', $task);

		return view('tasks.show', [
			'task' => $task,
		]);
	}

	public function edit(Task $task)
	{
	}

	public function destroy(Task $task)
	{
		Gate::authorize('delete', $task);

		$task->delete();

		return redirect()->route('tasks.index');
	}

	public function destroyOverdue(Task $task)
	{
		$user = Auth::user();

		$user->tasks()->where('due_date', '<', now())->delete();

		return redirect()->route('tasks.index');
	}
}
