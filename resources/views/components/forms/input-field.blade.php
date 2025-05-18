@props(['name'])

<div>
    <div
        class="w-full h-17 px-3 py-2 relative border border-white rounded-xl
            content-center focus-within:border-blue-600 peer-invalid:border-red-500">

        <input name="{{ $name }}" {{ $attributes->merge() }}
            class="peer absolute top-6 w-full bg-transparent 
                text-sm px-3 py-2 transition duration-300
                placeholder-transparent text-gray-800
                focus:outline-none focus:placeholder-slate-400" />

        <label
            class="absolute left-6 top-3 text-xs text-gray-800
                transition-all transform origin-left
                pointer-events-none
                peer-placeholder-shown:top-5 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-600
                peer-focus:top-3 peer-focus:text-xs peer-focus:text-gray-800">
            {{ $slot }}
        </label>
    </div>

    @error($name)
        <p class="pl-6 mt-1 text-xs text-red-500">{{ $message }}</p>
    @enderror
</div>
