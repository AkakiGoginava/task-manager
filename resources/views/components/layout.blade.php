<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>{{ $title ?? '' }}</title>
</head>

<body class="flex h-screen w-screen p-10">
    <x-sidebar />

    <main class="size-full inline-block p-10">
        {{ $slot }}
    </main>
    <p>{{ Session::get('locale') }}</p>
    <footer class="flex justify-center gap-4 absolute bottom-10 right-28">
        <a href="{{ route('lang.switch', 'en') }}">English</a>
        <a href="{{ route('lang.switch', 'ka') }}">ქართული</a>
    </footer>
</body>

</html>
