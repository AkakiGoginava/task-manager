<form {{ $attributes->merge(['class' => 'w-[28.875rem] flex-1 flex flex-col justify-center gap-7']) }} novalidate
    method="POST">
    @csrf

    <div class="text-[2rem] font-bold">
        {{ $header ?? '' }}
    </div>

    {{ $slot }}
</form>

<script>
    // Invalid input red outline
    const inputFields = document.querySelectorAll('form .form-input');

    const errors = @json($errors->toArray());


    inputFields.forEach(inputField => {
        let fieldName = inputField.getAttribute('name');

        fieldName = fieldName.replace(/\[(\w+)\]/g, '.$1');

        if (errors[fieldName]) {
            inputField.closest('div').classList.remove('border-white');
            inputField.closest('div').classList.add('border-red-500');
        }
    });

    // Password show/hide
    const togglePasswordBtns = document.querySelectorAll('.toggle-password-btn');

    togglePasswordBtns.forEach(button => {
        button.addEventListener('click', function() {
            const toggleIcon = button.querySelector('img');

            if (button.classList.contains('hide')) {
                button.closest('div').querySelector('input').type = 'text';
                button.classList.remove('hide');
                toggleIcon.src = @json(asset('svg/eye.svg'));
            } else {
                button.closest('div').querySelector('input').type = 'password';
                button.classList.add('hide');
                toggleIcon.src = @json(asset('svg/crossedEye.svg'));
            }
        });
    });
</script>
