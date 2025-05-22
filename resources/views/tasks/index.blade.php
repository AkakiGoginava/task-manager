@php
    $query = request()->query();
    $currentSort = request('sort');
    $direction = request('direction');
    $locale = App::getLocale();
@endphp

<x-layout>
    <x-slot:title>Your Tasks</x-slot:title>

    <section>
        <header class="flex gap-4 p-10">
            <h1 class="font-bold text-[2rem] mr-auto">{{ __('task/index.your_tasks') }}</h1>
            <form action="{{ route('tasks.destroyOverdue') }}?{{ http_build_query(request()->query()) }}" method="POST"
                class="flex justify-center">
                @csrf
                @method('DELETE')
                <button
                    class="text-blue-500 font-bold py-3 px-6 border rounded-xl transition
                        hover:border-blue-400 hover:text-blue-400 hover:cursor-pointer">
                    {{ __('task/index.delete_old_tasks') }}
                </button>
            </form>
            <a href="{{ route('tasks.create') }}"
                class="flex justify-center gap-3 items-center text-white font-bold py-3 px-6 
                        rounded-xl transition bg-blue-500 hover:bg-blue-400">
                <img src="{{ asset('svg/plus-circle.svg') }}" alt="plus icon">
                {{ __('task/index.add_task') }}
            </a>
        </header>
        <main>
            <div class="flex w-full gap-4 border-b border-gray-200 px-10 py-7">
                <p class="flex-2">{{ __('task/index.task_name') }}</p>
                <p class="flex-3">{{ __('task/index.description') }}</p>
                <div class="flex-1 flex items-center">
                    <a class="hover:text-gray-700 hover:cursor-pointer"
                        href=" {{ route(
                            'tasks.index',
                            array_merge($query, [
                                'sort' => 'created_at',
                                'direction' => $direction === 'asc' ? 'desc' : 'asc',
                            ]),
                        ) }}">
                        {{ __('task/index.created_at') }}
                    </a>
                    <div class="relative w-4 h-4">
                        <svg class="absolute top-0.5 left-2 w-full h-full text-gray-400 dark:text-gray-300"
                            viewBox="0 0 24 24">
                            {!! file_get_contents(public_path('svg/sortArrows.svg')) !!}
                        </svg>

                        @if ($currentSort === 'created_at' && $direction === 'asc')
                            <div class="absolute top-0 left-0 w-full h-1/2 bg-white opacity-100 pointer-events-none">
                            </div>
                        @elseif ($currentSort === 'created_at' && $direction === 'desc')
                            <div class="absolute bottom-0 left-0 w-full h-1/2 bg-white opacity-100 pointer-events-none">
                            </div>
                        @endif
                    </div>
                </div>
                <div class="flex-1 flex items-center">
                    <a class="hover:text-gray-700 hover:cursor-pointer"
                        href=" {{ route(
                            'tasks.index',
                            array_merge($query, [
                                'sort' => 'due_date',
                                'direction' => $direction === 'asc' ? 'desc' : 'asc',
                            ]),
                        ) }}">
                        {{ __('task/index.due_date') }}
                    </a>
                    <div class="relative w-4 h-4">
                        <svg class="absolute top-0.5 left-2 w-full h-full text-gray-400 dark:text-gray-300"
                            viewBox="0 0 24 24">
                            {!! file_get_contents(public_path('svg/sortArrows.svg')) !!}
                        </svg>

                        @if ($currentSort === 'due_date' && $direction === 'asc')
                            <div class="absolute top-0 left-0 w-full h-1/2 bg-white opacity-100 pointer-events-none">
                            </div>
                        @elseif ($currentSort === 'due_date' && $direction === 'desc')
                            <div class="absolute bottom-0 left-0 w-full h-1/2 bg-white opacity-100 pointer-events-none">
                            </div>
                        @endif
                    </div>
                </div>
                <p class="flex-2">{{ __('task/index.actions') }}</p>
            </div>

            <div>
                @foreach ($tasks as $task)
                    <div class="flex w-385 gap-4 text-gray-500 px-10 py-5">
                        <p class="flex-2 overflow-hidden whitespace-nowrap">{{ $task['title'][$locale] }}</p>
                        <p class="flex-3 overflow-hidden whitespace-nowrap">{{ $task['description'][$locale] }}</p>
                        <p class="flex-1">{{ $task['created_at']->format('d/m/Y') }}</p>
                        <p class="flex-1 {{ $task['due_date'] <= now() ? 'text-red-500' : '' }}">
                            {{ $task['due_date']->format('d/m/Y') }}</p>
                        <div class="flex gap-7 flex-2 text-gray-900">
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

            <div>
                {{ $tasks->links() }}
            </div>
        </main>
    </section>
</x-layout>
