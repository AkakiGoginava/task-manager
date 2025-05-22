<form {{ $attributes->merge(['class' => 'w-[28.875rem] flex-1 flex flex-col justify-center gap-7']) }} novalidate
    method="POST">
    @csrf

    <div class="text-[2rem] font-bold">
        {{ $header ?? '' }}
    </div>

    {{ $slot }}
</form>

<script>
    const inputFields = document.querySelectorAll('form .form-input');

    const errors = @json($errors->toArray());

    document.addEventListener('DOMContentLoaded', function() {
        inputFields.forEach(inputField => {
            let fieldName = inputField.getAttribute('name');

            fieldName = fieldName.replace(/\[(\w+)\]/g, '.$1');

            if (errors[fieldName]) {
                inputField.closest('div').classList.remove('border-white');
                inputField.closest('div').classList.add('border-red-500');
            }
        });
    });
</script>
