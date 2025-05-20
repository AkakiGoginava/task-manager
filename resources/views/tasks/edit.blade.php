<x-layout>
    <x-slot:title>Edit Task</x-slot:title>

    <section class="flex justify-center mr-40">
        <div class="flex-none">
            <x-forms.form action="{{ route('tasks.update', $task) }}">
                <x-slot:header>
                    <h1 class="text-center">EDIT TASK</h1>
                </x-slot:header>

                <x-forms.input-field type="text" name="title[en]" value="{{ $task['title']['en'] }}" placeholder="">
                    Task name in English
                </x-forms.input-field>

                <x-forms.input-field type="text" name="title[ka]" value="{{ $task['title']['ka'] }}" placeholder="">
                    Task name in Georgian
                </x-forms.input-field>

                <x-forms.input-field type="textarea" name="description[en]" value="{{ $task['description']['en'] }}"
                    placeholder="">
                    Description in English
                </x-forms.input-field>

                <x-forms.input-field type="textarea" name="description[ka]" value="{{ $task['title']['ka'] }}"
                    placeholder="">
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
