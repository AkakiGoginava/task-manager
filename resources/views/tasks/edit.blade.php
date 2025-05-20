<x-layout>
    <x-slot:title>Edit Task</x-slot:title>

    <section class="flex justify-center mr-40">
        <div class="flex-none">
            <x-forms.form action="{{ route('tasks.update', $task) }}">
                <x-slot:header>
                    <h1 class="text-center">EDIT TASK</h1>
                </x-slot:header>

                <x-forms.input-field type="text" name="title_en" value="{{ $task['title'] }}" placeholder="">
                    Task name in English
                </x-forms.input-field>

                <x-forms.input-field type="text" name="title_ka" value="" placeholder="">
                    Task name in Georgian
                </x-forms.input-field>

                <x-forms.input-field type="textarea" name="description_en" value="{{ $task['description'] }}"
                    placeholder="">
                    Description in English
                </x-forms.input-field>

                <x-forms.input-field type="textarea" name="description_ka" value="" placeholder="">
                    Description in Georgian
                </x-forms.input-field>

                <x-forms.input-field type="text" placeholder="DD/MM/YY" id="datepicker" name="due_date"
                    value="{{ \Carbon\Carbon::parse($task['due_date'])->format('d/m/y') }}">
                    Due date
                </x-forms.input-field>

                <x-forms.submit-btn>EDIT TASK</x-forms.submit-btn>
            </x-forms.form>
        </div>
    </section>
</x-layout>
