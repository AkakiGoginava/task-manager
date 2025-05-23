<x-layout>
    <x-slot:title>Edit Task</x-slot:title>

    <section class="flex-col items-center mr-22 mt-15">
        <div class="flex gap-2 w-full pt pl-40"> <img src="{{ asset('svg/backArrow.svg') }}" alt="back icon">
            <a href="{{ request('return_to', route('tasks.index')) }}"
                class="transition hover:text-gray-700">{{ __('task/form.back') }}</a>
        </div>

        <x-forms.form class="mx-auto" action="{{ route('tasks.update', $task) }}">
            <x-slot:header>
                <h1 class="text-center">{{ __('task/form.edit_task') }}</h1>
            </x-slot:header>

            <x-forms.input-field type="text" name="title[en]" value="{{ old('title.en') ?? $task['title']['en'] }}"
                :placeholder="__('task/form.name_placeholder')">
                {{ __('task/form.name_label_english') }}
            </x-forms.input-field>

            <x-forms.input-field type="text" name="title[ka]" value="{{ old('title.ka') ?? $task['title']['ka'] }}"
                :placeholder="__('task/form.name_placeholder')">
                {{ __('task/form.name_label_georgian') }}
            </x-forms.input-field>

            <x-forms.input-field type="textarea" name="description[en]"
                value="{{ old('description.en') ?? $task['description']['en'] }}" :placeholder="__('task/form.description_placeholder')">
                {{ __('task/form.description_label_english') }}
            </x-forms.input-field>

            <x-forms.input-field type="textarea" name="description[ka]"
                value="{{ old('description.ka') ?? $task['title']['ka'] }}" :placeholder="__('task/form.description_placeholder')">
                {{ __('task/form.description_label_georgian') }}
            </x-forms.input-field>

            <x-forms.input-field type="text" placeholder="DD/MM/YY" id="datepicker" name="due_date"
                value="{{ old('due_date') ?? \Carbon\Carbon::parse($task['due_date'])->format('d/m/y') }}">
                {{ __('task/form.due_date') }}
            </x-forms.input-field>

            <x-forms.submit-btn>{{ __('task/form.edit_task') }}</x-forms.submit-btn>
        </x-forms.form>

    </section>
</x-layout>
