<x-layout>
    <section>
        <header class="flex gap-4 p-10">
            <h1 class="font-bold text-[2rem] mr-auto">YOUR TASKS</h1>
            <form action="" method="post" class="flex justify-center">
                @csrf
                @method('DELETE')
                <button
                    class="text-blue-500 font-bold py-3 px-6 border rounded-xl transition
                        hover:border-blue-400 hover:text-blue-400 hover:cursor-pointer">
                    DELETE OLD TASKS
                </button>
            </form>
            <a href=""
                class="flex justify-center gap-3 items-center text-white font-bold py-3 px-6 
                        rounded-xl transition bg-blue-500 hover:bg-blue-400">
                <img src="{{ asset('svg/plus-circle.svg') }}" alt="plus icon">
                ADD TASK
            </a>
        </header>
        <main>
            <div class="flex w-full gap-4 border-b border-gray-200 px-10 py-7">
                <p class="flex-2">Task name</p>
                <p class="flex-3">Description</p>
                <p class="flex-1">Created at</p>
                <p class="flex-1">Due Date</p>
                <p class="flex-2">Actions</p>
            </div>

            <div>
                <div class="flex w-full gap-4 text-gray-500 px-10 py-5">
                    <p class="flex-2 overflow-hidden whitespace-nowrap">Call Jim and ask about the quote</p>
                    <p class="flex-3 overflow-hidden whitespace-nowrap">Call Jim and ask about the quote</p>
                    <p class="flex-1">22/22/2222</p>
                    <p class="flex-1">33/33/3333</p>
                    <div class="flex gap-7 flex-2 text-gray-900">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="underline hover:cursor-pointer hover:text-gray-700">
                                Delete
                            </button>
                        </form>
                        <a href="" class="underline hover:cursor-pointer hover:text-gray-700">
                            Edit
                        </a>
                        <a href="" class="underline hover:cursor-pointer hover:text-gray-700">
                            Show
                        </a>
                    </div>
                </div>
            </div>
        </main>
    </section>
</x-layout>
