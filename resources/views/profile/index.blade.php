@php
    $profileImgSrc = Auth::user()->profile_picture
        ? 'storage/' . Auth::user()->profile_picture
        : 'images/default_profile.png';
    $coverImgSrc = \App\Models\Settings::first()->cover_photo ?? 'images/default_cover.jpg';
@endphp

<x-layout>
    <x-slot:title>Your Profile</x-slot:title>

    <section class="flex-col items-center mr-40">
        <x-forms.form class="min-w-0 mx-auto" enctype="multipart/form-data">
            <x-slot:header>
                <h1 class="text-center">PROFILE</h1>
            </x-slot:header>

            <div class="flex flex-col text-gray-500 pl-6">
                <label class="text-xs">E-mail</label>
                <input type="text" value="{{ $user['email'] }}" disabled>
            </div>

            <h2 class="text-center">CHANGE PASSWORD</h2>

            <x-forms.input-field type='password' name='current_password' placeholder=''>
                Current Password
            </x-forms.input-field>

            <x-forms.input-field type='password' name='password' placeholder=''>
                New Password
            </x-forms.input-field>

            <x-forms.input-field type='password' name='password_confirmation' placeholder=''>
                Retype New Password
            </x-forms.input-field>


            <h2 class="text-center">CHANGE PHOTOS</h2>

            <div class="col-span-full w-max">
                <div class="mt-2 flex items-center gap-x-3">
                    <img class="size-31 text-gray-300" data-default={{ $profileImgSrc }}
                        src="{{ asset($profileImgSrc) }}">

                    <label for='profilePicture'
                        class="flex items-center gap-3 py-4.5 px-12 text-blue-500 font-bold border rounded-xl transition hover:text-blue-400 hover:cursor-pointer">
                        <img src="{{ asset('svg/upload.svg') }}" alt="upload icon">
                        UPLOAD PROFILE
                    </label>

                    <input type="file" id="profilePicture" name="profile_picture" accept="image/*" class="hidden">

                    <button type="button"
                        class="font-bold text-gray-600 ml-11 transition hover:text-gray-500 hover:cursor-pointer">
                        DELETE
                    </button>
                </div>

                @error('profile_picture')
                    <p class="pl-6 mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="col-span-full w-max">
                <div class="mt-2 flex items-center gap-x-3">
                    <img class="size-31 text-gray-300 rounded-l-[1rem]" data-default={{ $coverImgSrc }}
                        src="{{ asset($coverImgSrc) }}">

                    <label for='profileImage'
                        class="flex items-center gap-3 py-4.5 px-12 text-blue-500 font-bold border rounded-xl transition hover:text-blue-400 hover:cursor-pointer">
                        <img src="{{ asset('svg/upload.svg') }}" alt="upload icon">
                        UPLOAD PROFILE
                    </label>

                    <input type="file" id="profileImage" name="profile_image" accept="image/*" class="hidden">

                    <button type="button"
                        class="font-bold text-gray-600 ml-11 transition hover:text-gray-500 hover:cursor-pointer">
                        DELETE
                    </button>
                </div>

                @error('cover_image')
                    <p class="pl-6 mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <x-forms.submit-btn>CHANGE</x-forms.submit-btn>
        </x-forms.form>
    </section>
</x-layout>

<script>
    document.querySelectorAll('input[type="file"]').forEach(imgInput => {
        const parent = imgInput.closest('div');
        const preview = parent.querySelector('img');

        imgInput.addEventListener('change', (event) => {
            const file = event.target.files[0];
            if (file) {
                preview.src = URL.createObjectURL(file);
            }
        });

        parent.querySelector('button').addEventListener('click', () => {
            preview.src = `{{ asset('${preview.dataset.default}') }}`;
            imgInput.value = '';
        });
    });
</script>
