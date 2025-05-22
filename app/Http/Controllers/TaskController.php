<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\View\View;

class TaskController extends Controller
{
	use AuthorizesRequests;

	public function index(Request $request): View
	{
		$user = Auth::user();
		$query = $user->tasks();

		$query->when($request->query('filter') === 'due_tasks', function ($query) {
			$query->where('due_date', '<=', now());
		});

		$sort = $request->query('sort', 'created_at');
		$direction = $request->query('direction', 'asc');

		$query->when(
			in_array($sort, ['due_date', 'created_at']) && in_array($direction, ['asc', 'desc']),
			function ($query) use ($sort, $direction) {
				$query->orderBy($sort, $direction);
			}
		);

		$tasks = $query->paginate(8)->withQueryString();

		return view('tasks.index', compact('tasks'));
	}

	public function store(StoreTaskRequest $request): RedirectResponse
	{
		$attributes = $request->validated();

		Task::create([
			'user_id'     => Auth::user()->id,
			'title'       => $attributes['title'],
			'description' => $attributes['description'],
			'due_date'    => Carbon::createFromFormat('d/m/Y', $attributes['due_date'])->format('Y-m-d'),
		]);

		return redirect()->route('tasks.index')->with('success', __('successMsg.add_task'));
	}

	public function show(Task $task): View
	{
		$this->authorize('view', $task);

		return view('tasks.show', [
			'task' => $task,
		]);
	}

	public function edit(Task $task): View
	{
		$this->authorize('update', $task);

		return view('tasks.edit', [
			'task' => $task,
		]);
	}

	public function update(UpdateTaskRequest $request, Task $task): RedirectResponse
	{
		$attributes = $request->validated();

		$task->update([
			'title'       => $attributes['title'],
			'description' => $attributes['description'],
			'due_date'    => Carbon::createFromFormat('d/m/Y', $attributes['due_date'])->format('Y-m-d'),
		]);

		return redirect()->route('tasks.show', $task)->with('success', __('successMsg.edit_task'));
	}

	public function destroy(Task $task): RedirectResponse
	{
		$this->authorize('delete', $task);

		$task->delete();

		return redirect()->route('tasks.index', request()->query());
	}

	public function destroyOverdue(): RedirectResponse
	{
		$user = Auth::user();

		$user->tasks()->where('due_date', '<=', now())->delete();

		return redirect()->route('tasks.index', request()->query());
	}
}
