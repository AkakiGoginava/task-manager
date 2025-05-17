<form action="/login" method="POST" class="w-[462px] flex-1 flex flex-col justify-center gap-7">
    @csrf

    <div class="text-[32px] font-bold">
        {{ $header ?? '' }}
    </div>

    {{ $slot }}
</form>
