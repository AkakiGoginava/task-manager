@php
    $profileImgSrc = Auth::user()->profile_image
        ? 'storage/' . Auth::user()->profile_image
        : 'images/default_profile.png';
    $coverImgSrc = App\Models\Settings::first()
        ? 'storage/' . App\Models\Settings::first()->cover_image
        : 'images/default_cover.jpg';
@endphp

<x-layout>
    <x-slot:title>Your Profile</x-slot:title>

    <section class="flex-col items-center mr-22 max-h-full overflow-y-scroll ">
        <x-forms.form class="mx-auto" enctype="multipart/form-data">
            @method('PUT')

            <x-slot:header>
                <h1 class="text-center">{{ __('profile/index.profile') }}</h1>
            </x-slot:header>

            <div class="flex flex-col text-gray-500 gap-2">
                <label class="text-xs">{{ __('profile/index.email') }}</label>
                <input type="text" value="{{ $user['email'] }}" disabled
                    class="bg-gray-200 w-full px-6 py-5 rounded-xl ">
            </div>

            <h2 class="text-center">{{ __('profile/index.change_password') }}</h2>

            <x-forms.input-field type='password' name='current_password' :placeholder="__('profile/index.current_password_placeholder')">
                {{ __('profile/index.current_password_label') }}
            </x-forms.input-field>

            <x-forms.input-field type='password' name='password' :placeholder="__('profile/index.new_password_placeholder')">
                {{ __('profile/index.new_password_label') }}
            </x-forms.input-field>

            <x-forms.input-field type='password' name='password_confirmation' :placeholder="__('profile/index.retype_password_placeholer')">
                {{ __('profile/index.retype_password_label') }}
            </x-forms.input-field>


            <h2 class="text-center">{{ __('profile/index.change_photos') }}</h2>

            <div class="col-span-full w-max">
                <div class="mt-2 flex items-center gap-x-3">
                    <img class="size-31 text-gray-300 rounded-full" data-default={{ $profileImgSrc }}
                        src="{{ asset($profileImgSrc) }}">

                    <label for='profileImage'
                        class="flex items-center gap-3 py-4.5 px-12 text-blue-500 font-bold border rounded-xl transition hover:text-blue-400 hover:cursor-pointer">
                        <img src="{{ asset('svg/upload.svg') }}" alt="upload icon">
                        {{ __('profile/index.upload_profile') }}
                    </label>

                    <input type="file" id="profileImage" name="profile_image" accept="image/*" class="hidden">
                    <input type="hidden" name="update_profile_image" value="0" class="update-image">

                    <button type="button"
                        class="font-bold text-gray-600 ml-11 transition hover:text-gray-500 hover:cursor-pointer">
                        {{ __('profile/index.delete') }}
                    </button>
                </div>

                @error('profile_image')
                    <p class="pl-6 mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="col-span-full w-max">
                <div class="mt-2 flex items-center gap-x-3">
                    <img class="size-31 text-gray-300 rounded-l-[1rem]" data-default={{ $coverImgSrc }}
                        src="{{ asset($coverImgSrc) }}">

                    <label for='coverImage'
                        class="flex items-center gap-3 py-4.5 px-12 text-blue-500 font-bold border rounded-xl transition hover:text-blue-400 hover:cursor-pointer">
                        <img src="{{ asset('svg/upload.svg') }}" alt="upload icon">
                        {{ __('profile/index.upload_cover') }}
                    </label>

                    <input type="file" id="coverImage" name="cover_image" accept="image/*" class="hidden">
                    <input type="hidden" name="update_cover_image" value="0" class="update-image">

                    <button type="button"
                        class="font-bold text-gray-600 ml-11 transition hover:text-gray-500 hover:cursor-pointer">
                        {{ __('profile/index.delete') }}
                    </button>
                </div>

                @error('cover_image')
                    <p class="pl-6 mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <x-forms.submit-btn>{{ __('profile/index.change') }}</x-forms.submit-btn>
        </x-forms.form>
    </section>
</x-layout>

<script>
    document.querySelectorAll('input[type="file"]').forEach(imgInput => {
        const parent = imgInput.closest('div');
        const preview = parent.querySelector('img');
        const updateImage = parent.querySelector('.update-image');

        imgInput.addEventListener('change', (event) => {
            const file = event.target.files[0];
            if (file) {
                preview.src = URL.createObjectURL(file);
            }

            updateImage.value = 1;
        });

        parent.querySelector('button').addEventListener('click', () => {
            preview.src = `{{ asset('images/default_profile.png') }}`;
            imgInput.value = '';

            updateImage.value = 1;
        });
    });
</script>
