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
    <nav class="flex flex-col items-center h-full w-42 py-4 pl-5">
        <img class="w-16 h-16 rounded-4xl mb-32" src="https://placehold.co/64x64" alt="profile picture">

        <ul class="flex flex-col h-full gap-7 text-lg">
            <li>
                <a class="flex items-center gap-2 transition duration-300 hover:text-neutral-500"
                    href="{{ route('tasks.index') }}">
                    <img src="{{ asset('svg/tasksIcon.svg') }}" alt="tasks icon">
                    My tasks
                </a>
            </li>
            <li>
                <a class="flex items-center gap-2 transition duration-300 hover:text-neutral-500" href="">
                    <img src="{{ asset('svg/hourglass.svg') }}" alt="hourglass icon">
                    Due tasks
                </a>
            </li>
            <li>
                <a class="flex items-center gap-2 transition duration-300 hover:text-neutral-500" href="">
                    <img src="{{ asset('svg/profileIcon.svg') }}" alt="profile icon">
                    Profile
                </a>
            </li>
            <li class="mt-auto">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button
                        class="flex items-center gap-2 transition duration-300 hover:text-neutral-500 hover:cursor-pointer">
                        <img src="{{ asset('svg/logoutIcon.svg') }}" alt="logout icon">
                        Log out
                    </button>
                </form>
            </li>
        </ul>
    </nav>

    <main class="size-full inline-block p-10">
        {{ $slot }}
    </main>

    <footer class="flex justify-center gap-4 absolute bottom-10 right-28">
        <p>English</p>
        <p>ქართული</p>
    </footer>
</body>

</html>
