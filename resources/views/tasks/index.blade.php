@php
    $locale = App::getLocale() ?? 'en';
    $query = request()->query();

    $sortIconClass = [
        'created_at' => 'opacity-70',
        'due_date' => 'opacity-70',
    ];

    function nextSortDirection($column, $query, &$sortIconClass)
    {
        $currentSort = $query['sort'] ?? null;
        $direction = $query['direction'] ?? null;

        if ($currentSort === $column && $direction === 'asc') {
            $sortIconClass[$column] = 'opacity-70 bottom-0';
            return ['sort' => $column, 'direction' => 'desc'];
        } elseif ($currentSort === $column && $direction === 'desc') {
            $sortIconClass[$column] = 'opacity-70 top-0';
            return ['sort' => null, 'direction' => null];
        } else {
            $sortIconClass[$column] = 'opacity-0';
            return ['sort' => $column, 'direction' => 'asc'];
        }
    }

    $createdAtSort = nextSortDirection('created_at', $query, $sortIconClass);
    $dueDateSort = nextSortDirection('due_date', $query, $sortIconClass);
@endphp

<x-layout>
    <x-slot:title>Your Tasks</x-slot:title>
    <section class="mx-4 mt-15">
        <header class="flex gap-4 px-10 py-6">
            <h1 class="font-bold text-[2rem] mr-auto">{{ __('task/index.your_tasks') }}</h1>
            <form action="{{ route('tasks.destroyOverdue') }}?{{ http_build_query(request()->query()) }}" method="POST"
                class="flex justify-center">
                @csrf
                @method('DELETE')
                <button
                    class="text-blue-400 font-bold py-3 px-6 border rounded-xl transition
                        hover:border-blue-300 hover:text-blue-300 hover:cursor-pointer">
                    {{ __('task/index.delete_old_tasks') }}
                </button>
            </form>
            <a href="{{ route('tasks.create') }}"
                class="flex justify-center gap-3 items-center text-white font-bold py-3 px-6 
                        rounded-xl transition bg-blue-400 hover:bg-blue-300">
                <img src="{{ asset('svg/plus-circle.svg') }}" alt="plus icon">
                {{ __('task/index.add_task') }}
            </a>
        </header>
        <main class="h-167 flex flex-col">
            <div class="flex w-full gap-2 border-b border-gray-200 px-10 py-7">
                <p class="w-69">{{ __('task/index.task_name') }}</p>
                <p class="w-81">{{ __('task/index.description') }}</p>
                <div class="w-30.5 flex items-center">
                    <a class="hover:text-gray-700 hover:cursor-pointer"
                        href=" {{ route('tasks.index', array_merge($query, $createdAtSort)) }}">
                        {{ __('task/index.created_at') }}
                    </a>
                    <div class="relative w-4 h-4">
                        <svg class="absolute top-0.5 left-2 w-full h-full text-gray-400 dark:text-gray-300"
                            viewBox="0 0 24 24">
                            {!! file_get_contents(public_path('svg/sortArrows.svg')) !!}
                        </svg>

                        <div
                            class="absolute left-0 w-full h-1/2 bg-white pointer-events-none {{ $sortIconClass['created_at'] }}">
                        </div>
                    </div>
                </div>
                <div class="w-30.5 flex items-center">
                    <a class="hover:text-gray-700 hover:cursor-pointer"
                        href=" {{ route('tasks.index', array_merge($query, $dueDateSort)) }}">
                        {{ __('task/index.due_date') }}
                    </a>
                    <div class="relative w-4 h-4">
                        <svg class="absolute top-0.5 left-2 w-full h-full text-gray-400 dark:text-gray-300"
                            viewBox="0 0 24 24">
                            {!! file_get_contents(public_path('svg/sortArrows.svg')) !!}
                        </svg>

                        <div
                            class="absolute left-0 w-full h-1/2 bg-white pointer-events-none {{ $sortIconClass['due_date'] }}">
                        </div>

                    </div>
                </div>
                <p class="w-61">{{ __('task/index.actions') }}</p>
            </div>

            <div>
                @foreach ($tasks as $task)
                    <div class="flex w-full gap-2 text-gray-500 px-10 py-5">
                        <p class="w-69 overflow-hidden whitespace-nowrap ">{{ $task['title'][$locale] }}</p>
                        <p class="w-81 overflow-hidden whitespace-nowrap ">{{ $task['description'][$locale] }}
                        </p>
                        <p class="w-30.5">{{ $task['created_at']->format('d/m/Y') }}</p>
                        <p class="w-30.5 {{ $task['due_date'] <= now() ? 'text-red-500' : '' }}">
                            {{ $task['due_date']->format('d/m/Y') }}</p>
                        <div class="flex gap-7 w-61 text-gray-900">
                            <form
                                action="{{ route('tasks.destroy', $task->id) }}?{{ http_build_query(request()->query()) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="underline hover:cursor-pointer hover:text-gray-700">
                                    {{ __('task/index.delete') }}
                                </button>
                            </form>
                            <a href="{{ route('tasks.edit', ['task' => $task, 'return_to' => url()->current()]) }}"
                                class="underline hover:cursor-pointer hover:text-gray-700">
                                {{ __('task/index.edit') }}
                            </a>
                            <a href="{{ route('tasks.show', $task->id) }}"
                                class="underline hover:cursor-pointer hover:text-gray-700">
                                {{ __('task/index.show') }}
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-auto">
                {{ $tasks->links() }}
            </div>
        </main>
    </section>
</x-layout>
