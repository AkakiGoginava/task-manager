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
        <img src="https://placehold.co/700x944" class="size-max rounded-l-[3rem]">

        <section class="flex flex-col py-3">
            <x-forms.form action="{{ route('login') }}">
                <x-slot:header>
                    <div class="flex justify-between">
                        <div>
                            <h1>Welcome Back!</h1>
                            <h6 class="text-base font-normal text-gray-600">Please enter your details</h6>
                        </div>
                        <img src="{{ asset('svg/smile.svg') }}" alt="Smile icon" class="w-15 h-12 mt-2">
                    </div>
                </x-slot:header>

                <x-forms.input-field type="email" name="email" placeholder="Write your e-mail"
                    value="{{ old('email') }}" required>
                    E-mail
                </x-forms.input-field>

                <x-forms.input-field type="password" name="password" placeholder="Write your password" minlength='4'
                    required>
                    Password
                </x-forms.input-field>

                <x-forms.submit-btn>Log In</x-forms.submit-btn>

            </x-forms.form>

            <footer class="flex justify-center gap-4">
                <p>English</p>
                <p>ქართული</p>
            </footer>
        </section>
    </main>
</body>

</html>
