<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Your Tasks</title>
</head>

<body class="flex h-screen w-screen p-10">
    <x-sidebar />

    <main class="size-full inline-block p-10">
        {{ $slot }}
    </main>

    <footer class="flex justify-center gap-4 absolute bottom-10 right-28">
        <p>English</p>
        <p>ქართული</p>
    </footer>
</body>

</html>
