<x-layout>
    <x-slot:title>{{ $task['title']['en'] }}</x-slot:title>

    <section class="flex flex-col w-full pl-25 pr-10 py-10 gap-20">
        <header class="flex justify-between">
            <h1 class="font-bold text-[2rem]">{{ $task['title']['en'] }}</h1>
            <a class="text-blue-500 font-bold px-6 py-3 flex gap-4 items-center 
                border rounded-xl transition hover:text-blue-400 hover:border-blue-400"
                href="{{ route('tasks.edit', ['task' => $task, 'return_to' => url()->current()]) }}">
                <img src="{{ asset('svg/edit.svg') }}" alt="edit icon">
                EDIT TASK</a>
        </header>
        <main>
            <div class="mb-10 pr-50 h-125 overflow-y-scroll">
                <h6 class="text-gray-700 mb-4 text-lg">Description</h6>
                <p>{{ $task['description']['en'] }}</p>
            </div>
            <div class="flex gap-20">
                <div>
                    <h6 class="text-gray-700">Create Date</h6>
                    <p class="text-lg">{{ $task['created_at']->format('d/m/y') }}</p>
                </div>
                <div>
                    <h6 class="text-gray-700">Due Date</h6>
                    <p class="text-lg">{{ $task['due_date']->format('d/m/y') }}</p>
                </div>
            </div>
        </main>
    </section>
</x-layout>
