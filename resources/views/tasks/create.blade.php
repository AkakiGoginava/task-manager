<x-layout>
    <x-slot:title>Create new task</x-slot:title>

    <section class="flex justify-center mr-40">
        <div class="flex-none">
            <x-forms.form action="{{ route('tasks.store') }}">
                <x-slot:header>
                    <h1 class="text-center">CREATE TASK</h1>
                </x-slot:header>

                <x-forms.input-field type="text" name="title[en]" value="{{ old('title.en') }}" placeholder="">
                    Task name in English
                </x-forms.input-field>

                <x-forms.input-field type="text" name="title[ka]" value="{{ old('title.ka') }}" placeholder="">
                    Task name in Georgian
                </x-forms.input-field>

                <x-forms.input-field type="textarea" name="description[en]" value="{{ old('description.en') }}"
                    placeholder="">
                    Description in English
                </x-forms.input-field>

                <x-forms.input-field type="textarea" name="description[ka]" value="{{ old('description.ka') }}"
                    placeholder="">
                    Description in Georgian
                </x-forms.input-field>

                <x-forms.input-field type="text" placeholder="DD/MM/YY" id="datepicker" name="due_date"
                    value="{{ old('due_date') }}">
                    Due date
                </x-forms.input-field>

                <x-forms.submit-btn>CREATE TASK</x-forms.submit-btn>
            </x-forms.form>
        </div>
    </section>
</x-layout>
