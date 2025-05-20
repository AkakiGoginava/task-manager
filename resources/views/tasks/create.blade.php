<x-layout>
    <x-slot:title>Create new task</x-slot:title>

    <section class="flex justify-center mr-40">
        <div class="flex-none">
            <x-forms.form action="{{ route('tasks.store') }}">
                <x-slot:header>
                    <h1 class="text-center">CREATE TASK</h1>
                </x-slot:header>

                <div class="flex flex-col justify-center gap-7 max-h-150 overflow-y-scroll overflow-x-hidden">
                    <x-forms.input-field type="text" name="title_en" value="{{ old('title_en') }}" placeholder="">
                        Task name in English
                    </x-forms.input-field>

                    <x-forms.input-field type="text" name="title_ka" value="{{ old('title_ka') }}" placeholder="">
                        Task name in Georgian
                    </x-forms.input-field>

                    <x-forms.input-field type="textarea" name="description_en" value="{{ old('description_en') }}"
                        placeholder="">
                        Description in English
                    </x-forms.input-field>

                    <x-forms.input-field type="textarea" name="description_ka" value="{{ old('description_ka') }}"
                        placeholder="">
                        Description in Georgian
                    </x-forms.input-field>

                    <x-forms.input-field type="text" placeholder="DD/MM/YY" id="datepicker" name="due_date"
                        value="{{ old('due_date') }}">
                        Due date
                    </x-forms.input-field>
                </div>

                <x-forms.submit-btn>CREATE TASK</x-forms.submit-btn>
            </x-forms.form>
        </div>
    </section>
</x-layout>
