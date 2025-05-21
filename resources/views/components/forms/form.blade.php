<form {{ $attributes->merge(['class' => 'w-[28.875rem] flex-1 flex flex-col justify-center gap-7']) }} nonvalidate
    method="POST">
    @csrf

    <div class="text-[2rem] font-bold">
        {{ $header ?? '' }}
    </div>

    {{ $slot }}
</form>
