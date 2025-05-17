<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Document</title>
</head>

<body class="px-10 py-2 w-screen h-screen">
    <main class="flex gap-25 width-full height-full justify-center">
        <img src="https://placehold.co/700x944" class="size-max rounded-l-[48px]">

        <section class="flex flex-col py-3">
            <form action="/login" method="POST" class="w-[462px] flex-1 flex flex-col justify-center gap-7">
                @csrf

                <div class="flex justify-between">
                    <div>
                        <h1 class="text-[32px] font-bold">Welcome Back!</h1>
                        <h6 class="text-gray-600">Please enter your details</h6>
                    </div>
                    <img src="{{ asset('svg/smile.svg') }}" alt="Smile icon" class="w-15 h-12 mt-2">
                </div>

                <div>
                    <div
                        class="w-full h-17 px-3 py-2 relative border border-white rounded-xl
                            content-center focus-within:border-blue-600 peer-invalid:border-red-500">

                        <input type="email" required placeholder="Write your e-mail"
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
                            E-mail
                        </label>
                    </div>

                    <label for="email" class="pl-6 mt-1 text-xs text-red-500">Invalid email</label>
                </div>

                <div>
                    <div
                        class="w-full h-17 px-3 py-2 relative border border-white rounded-xl
                            content-center focus-within:border-blue-600 peer-invalid:border-red-500">

                        <input type="password" required placeholder="Write your password"
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
                            Password
                        </label>
                    </div>

                    <label for="email" class="pl-6 mt-1 text-xs text-red-500">Invalid password</label>
                </div>

                <button type="submit"
                    class="w-full h-17 bg-blue-400 text-white font-bold rounded-xl transition 
                        duration-200 hover:bg-blue-300 hover:cursor-pointer">
                    Log In</button>

            </form>

            <footer class="flex justify-center gap-4">
                <p>English</p>
                <p>ქართული</p>
            </footer>
        </section>
    </main>
</body>

</html>
