<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Log In</title>
</head>

<body class="h-screen py-2">
    <main class="flex mx-auto px-10 gap-25 w-360 height-full">
        <img src="{{ App\Models\Settings::first()
            ? asset('storage/' . App\Models\Settings::first()->cover_image)
            : asset('images/default_cover.jpg') }}"
            class="w-175 h-236 object-cover rounded-l-[3rem]">

        <section class="flex flex-col py-3">
            <x-forms.form action="{{ route('login') }}">
                <x-slot:header>
                    <div class="flex justify-between">
                        <div>
                            <h1>{{ __('login/index.welcome') }}</h1>
                            <h6 class="text-base font-normal text-gray-600">{{ __('login/index.enter_detail') }}</h6>
                        </div>
                        <img src="{{ asset('svg/smile.svg') }}" alt="Smile icon" class="w-15 h-12 mt-2">
                    </div>
                </x-slot:header>

                <x-forms.input-field type="email" name="email" :placeholder="__('login/index.write_email')" value="{{ old('email') }}"
                    required>
                    {{ __('login/index.email') }}
                </x-forms.input-field>

                <x-forms.input-field type="password" name="password" :placeholder="__('login/index.write_password')" minlength='4' required>
                    {{ __('login/index.password') }}
                </x-forms.input-field>

                <x-forms.submit-btn>{{ __('login/index.log_in') }}</x-forms.submit-btn>

            </x-forms.form>

            <footer class="flex justify-center gap-4">
                <a href="{{ route('lang.switch', 'en') }}"
                    class="{{ App::getLocale() === 'en' ? '' : 'text-gray-500' }}">English</a>
                <a href="{{ route('lang.switch', 'ka') }}"
                    class="{{ App::getLocale() === 'ka' ? '' : 'text-gray-500' }}">ქართული</a>
            </footer>
        </section>
    </main>
</body>

</html>
