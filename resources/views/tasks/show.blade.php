@php
    $locale = App::getLocale() ?? 'en';
@endphp

<x-layout>
    <x-slot:title>{{ $task['title'][$locale] }}</x-slot:title>

    <section class="flex flex-col w-full pl-25 pr-10 mt-25 gap-20">
        <header class="flex justify-between">
            <h1 class="font-bold text-[2rem] truncate max-w-200">
                {{ $task['title'][$locale] }}</h1>
            <a class="text-blue-400 font-bold px-6 py-3 flex gap-4 items-center 
                border rounded-xl transition hover:text-blue-400 hover:border-blue-300"
                href="{{ route('tasks.edit', ['task' => $task, 'return_to' => url()->current()]) }}">
                <img src="{{ asset('svg/edit.svg') }}" alt="edit icon">
                {{ __('task/show.edit_task') }}</a>
        </header>
        <main>
            <div class="mb-10.5 pr-50 max-h-125 overflow-y-scroll">
                <h6 class="text-gray-700 mb-4 text-lg">{{ __('task/show.desciption') }}</h6>
                <p>{{ $task['description'][$locale] }}</p>
            </div>
            <div class="flex gap-20">
                <div>
                    <h6 class="text-gray-700">{{ __('task/show.create_date') }}</h6>
                    <p class="text-lg">{{ $task['created_at']->format('d/m/y') }}</p>
                </div>
                <div>
                    <h6 class="text-gray-700">{{ __('task/show.due_date') }}</h6>
                    <p class="text-lg">{{ $task['due_date']->format('d/m/y') }}</p>
                </div>
            </div>
        </main>
    </section>
</x-layout>
