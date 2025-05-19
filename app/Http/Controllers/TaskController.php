<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class TaskController extends Controller
{
	public function index()
	{
		$user = Auth::user();
		$tasks = $user->tasks()->paginate(8);

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
}
