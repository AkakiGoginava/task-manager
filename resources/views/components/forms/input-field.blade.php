<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

@props(['name', 'type', 'value' => '', 'placeholder' => ''])

<div>
    <div @class([
        'w-full h-17 px-3 py-2 relative border border-white rounded-xl content-center focus-within:border-blue-600 peer-invalid:border-red-500',
        'h-17' => $type !== 'textarea',
        'h-34' => $type === 'textarea',
    ])>
        @if ($type !== 'textarea')
            <input type="{{ $type }}" name="{{ $name }}" value="{{ $value }}"
                placeholder="{{ $placeholder }}" {!! $attributes->merge([
                    'class' => 'peer absolute top-6 w-full bg-transparent text-sm px-3 py-2 
                                                transition duration-300 placeholder-transparent text-gray-800 
                                                focus:outline-none focus:placeholder-slate-400',
                ]) !!} />
        @else
            <textarea name="{{ $name }}" rows="4" placeholder="{{ $placeholder }}" {!! $attributes->merge([
                'class' => 'resize-none peer absolute top-6 w-full bg-transparent text-sm px-3 py-2 
                                        transition duration-300 placeholder-transparent text-gray-800 
                                        focus:outline-none focus:placeholder-slate-400',
            ]) !!}>{{ $value }}</textarea>
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
