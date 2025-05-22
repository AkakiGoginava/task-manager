<x-layout>
    <x-slot:title>Create new task</x-slot:title>

    <section class="flex justify-center mr-40">
        <div class="flex-none">
            <x-forms.form action="{{ route('tasks.store') }}">
                <x-slot:header>
                    <h1 class="text-center">{{ __('task/form.create_task') }}</h1>
                </x-slot:header>

                <x-forms.input-field type="text" name="title[en]" value="{{ old('title.en') }}" :placeholder="__('task/form.name_placeholder')">
                    {{ __('task/form.name_label_english') }}
                </x-forms.input-field>

                <x-forms.input-field type="text" name="title[ka]" value="{{ old('title.ka') }}" :placeholder="__('task/form.name_placeholder')">
                    {{ __('task/form.name_label_georgian') }}
                </x-forms.input-field>

                <x-forms.input-field type="textarea" name="description[en]" value="{{ old('description.en') }}"
                    :placeholder="__('task/form.description_placeholder')">
                    {{ __('task/form.description_label_english') }}
                </x-forms.input-field>

                <x-forms.input-field type="textarea" name="description[ka]" value="{{ old('description.ka') }}"
                    :placeholder="__('task/form.description_placeholder')">
                    {{ __('task/form.description_label_georgian') }}
                </x-forms.input-field>

                <x-forms.input-field type="text" placeholder="DD/MM/YY" id="datepicker" name="due_date"
                    value="{{ old('due_date') }}">
                    {{ __('task/form.due_date') }}
                </x-forms.input-field>

                <x-forms.submit-btn>{{ __('task/form.create_task') }}</x-forms.submit-btn>
            </x-forms.form>
        </div>
    </section>
</x-layout>
