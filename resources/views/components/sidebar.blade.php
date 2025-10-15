<nav class="flex flex-col items-center min-w-42 h-full pt-6 pb-8 px-5.5 bg-gray-300 rounded-xl">
    <img class="size-16 rounded-full mb-32 object-cover flex-shrink-0"
        src="{{ Auth::user()->profile_image ? asset('storage/' . Auth::user()->profile_image) : asset('images/default_profile.png') }}"
        alt="profile picture">

    <ul class="flex flex-col h-full gap-7 text-lg">
        <li>
            <a class="flex items-center gap-2 transition duration-300 hover:text-neutral-500"
                href="{{ route('tasks.index', ['sort' => request()->query('sort'), 'direction' => request()->query('direction')]) }}">
                <img src="{{ asset('svg/tasksIcon.svg') }}" alt="tasks icon">
                {{ __('sidebar.my_tasks') }}
            </a>
        </li>
        <li>
            <a class="flex items-center gap-2 transition duration-300 hover:text-neutral-500"
                href="{{ route('tasks.index', array_merge(['filter' => 'due_tasks'], request()->query())) }}">
                <img src="{{ asset('svg/hourglass.svg') }}" alt="hourglass icon">
                {{ __('sidebar.due_tasks') }}
            </a>
        </li>
        <li>
            <a class="flex items-center gap-2 transition duration-300 hover:text-neutral-500"
                href="{{ route('profile.index') }}">
                <img src="{{ asset('svg/profileIcon.svg') }}" alt="profile icon">
                {{ __('sidebar.profile') }}
            </a>
        </li>
        <li class="mt-auto mx-auto">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button
                    class="flex items-center gap-2 transition duration-300 hover:text-neutral-500 hover:cursor-pointer">
                    <img src="{{ asset('svg/logoutIcon.svg') }}" alt="logout icon">
                    {{ __('sidebar.log_out') }}
                </button>
            </form>
        </li>
    </ul>
</nav>
