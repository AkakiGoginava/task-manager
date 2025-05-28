<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

@props(['name', 'type', 'value' => '', 'placeholder' => ''])

<div>
    <div @class([
        'w-full h-17 px-3 py-2 relative border border-white rounded-xl bg-gray-200 content-center focus-within:border-blue-400',
        'h-17' => $type !== 'textarea',
        'h-34' => $type === 'textarea',
    ])>
        @if ($type !== 'textarea')
            <input type="{{ $type }}" name="{{ $name }}" value="{{ $value }}"
                placeholder="{{ $placeholder }}" {!! $attributes->merge([
                    'class' =>
                        'form-input peer absolute top-6 w-100 bg-transparent text-sm px-3 py-2 transition duration-300 placeholder-transparent text-gray-800 focus:outline-none focus:placeholder-slate-400',
                ]) !!} />
        @else
            <textarea name="{{ $name }}" rows="4" placeholder="{{ $placeholder }}" {!! $attributes->merge([
                'class' =>
                    'form-input resize-none peer absolute top-6 w-full bg-transparent text-sm px-3 py-2 transition duration-300 placeholder-transparent text-gray-800 focus:outline-none focus:placeholder-slate-400',
            ]) !!}>{{ $value }}</textarea>
        @endif

        @if ($type === 'password')
            <button type="button" class="toggle-password-btn hide absolute top-5 right-6 hover:cursor-pointer">
                <img src="{{ asset('svg/crossedEye.svg') }}" alt="Show password" class="size-6">
            </button>
        @endif

        <label
            class="absolute left-6 top-3 text-xs text-gray-800 transition-all 
                ransform origin-left pointer-events-none peer-placeholder-shown:top-5 
                peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-600 
                peer-focus:top-3 peer-focus:text-xs peer-focus:text-gray-800">
            {{ $slot }}
        </label>
    </div>

    @php
        $errorKey = str_replace(['[', ']'], ['.', ''], $name);
    @endphp

    @error($errorKey)
        <p class="pl-6 mt-1 text-xs text-red-500">{{ $message }}</p>
    @enderror
</div>

<script>
    flatpickr("#datepicker", {
        dateFormat: "d/m/Y",
        allowInput: false
    });
</script>
