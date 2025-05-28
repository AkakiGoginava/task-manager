<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>{{ $title ?? '' }}</title>
</head>

<body class="h-screen w-screen">
    @if (session('success'))
        <div id="success-message"
            class="flex items-center gap-3 fixed top-4 right-4 bg-white border-b border-green-500 px-4 py-2 transition-opacity duration-300">
            <img src="{{ asset('svg/successSmile.svg') }}">
            <p>{{ session('success') }} </p>
        </div>

        <script>
            setTimeout(() => {
                const msg = document.getElementById('success-message');
                if (msg) {
                    msg.style.opacity = '0';
                    setTimeout(() => msg.remove(), 300);
                }
            }, 3000);
        </script>
    @endif

    <main class="flex w-360 h-full mx-auto relative">
        <x-sidebar />

        <section class="h-full w-295 inline-block relative">
            {{ $slot }}

        </section>
        <footer class="flex justify-center gap-4 absolute bottom-10 right-0">
            <footer class="flex justify-center gap-4">
                <a href="{{ route('lang.switch', 'en') }}"
                    class="{{ (App::getLocale() ?? 'en') === 'en' ? '' : 'text-gray-500' }}">English</a>
                <a href="{{ route('lang.switch', 'ka') }}"
                    class="{{ (App::getLocale() ?? 'en') === 'ka' ? '' : 'text-gray-500' }}">ქართული</a>
            </footer>
        </footer>
    </main>
</body>

</html>
