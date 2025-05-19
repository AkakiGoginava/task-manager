<x-layout>
    <section>
        <header class="flex gap-4 p-10">
            <h1 class="font-bold text-[2rem] mr-auto">YOUR TASKS</h1>
            <form action="{{ route('tasks.destroyOverdue') }}" method="post" class="flex justify-center">
                @csrf
                @method('DELETE')
                <button
                    class="text-blue-500 font-bold py-3 px-6 border rounded-xl transition
                        hover:border-blue-400 hover:text-blue-400 hover:cursor-pointer">
                    DELETE OLD TASKS
                </button>
            </form>
            <a href=""
                class="flex justify-center gap-3 items-center text-white font-bold py-3 px-6 
                        rounded-xl transition bg-blue-500 hover:bg-blue-400">
                <img src="{{ asset('svg/plus-circle.svg') }}" alt="plus icon">
                ADD TASK
            </a>
        </header>
        <main>
            <div class="flex w-full gap-4 border-b border-gray-200 px-10 py-7">
                <p class="flex-2">Task name</p>
                <p class="flex-3">Description</p>
                <p class="flex-1">Created at</p>
                <p class="flex-1">Due Date</p>
                <p class="flex-2">Actions</p>
            </div>

            <div>
                @foreach ($tasks as $task)
                    <div class="flex w-385 gap-4 text-gray-500 px-10 py-5">
                        <p class="flex-2 overflow-hidden whitespace-nowrap">{{ $task['title'] }}</p>
                        <p class="flex-3 overflow-hidden whitespace-nowrap">{{ $task['description'] }}</p>
                        <p class="flex-1">{{ $task['created_at']->format('d/m/Y') }}</p>
                        <p class="flex-1 {{ $task['due_date'] < now() ? 'text-red-500' : '' }}">
                            {{ $task['due_date']->format('d/m/Y') }}</p>
                        <div class="flex gap-7 flex-2 text-gray-900">
                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="underline hover:cursor-pointer hover:text-gray-700">
                                    Delete
                                </button>
                            </form>
                            <a href="" class="underline hover:cursor-pointer hover:text-gray-700">
                                Edit
                            </a>
                            <a href="" class="underline hover:cursor-pointer hover:text-gray-700">
                                Show
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
