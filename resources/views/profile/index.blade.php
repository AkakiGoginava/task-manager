<x-layout>
    <x-slot:title>Your Profile</x-slot:title>

    <section class="flex-col items-center mr-40">
        <x-forms.form class="min-w-0 mx-auto">
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
                    <svg class="size-31 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"
                        data-slot="icon">
                        <path fill-rule="evenodd"
                            d="M18.685 19.097A9.723 9.723 0 0 0 21.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 0 0 3.065 7.097A9.716 9.716 0 0 0 12 21.75a9.716 9.716 0 0 0 6.685-2.653Zm-12.54-1.285A7.486 7.486 0 0 1 12 15a7.486 7.486 0 0 1 5.855 2.812A8.224 8.224 0 0 1 12 20.25a8.224 8.224 0 0 1-5.855-2.438ZM15.75 9a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z"
                            clip-rule="evenodd" />
                    </svg>
                    <button type="button"
                        class="flex items-center gap-3 py-4.5 px-12 text-blue-500 font-bold border rounded-xl transition hover:text-blue-400 hover:cursor-pointer">
                        <img src="{{ asset('svg/upload.svg') }}" alt="upload icon">
                        UPLOAD PROFILE
                    </button>
                    <button type="button"
                        class="font-bold text-gray-600 ml-11 transition hover:text-gray-500 hover:cursor-pointer">
                        DELETE
                    </button>
                </div>
            </div>

            <div class="col-span-full w-max">
                <div class="mt-2 flex items-center gap-x-3">
                    <svg class="size-31 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"
                        data-slot="icon">
                        <path fill-rule="evenodd"
                            d="M18.685 19.097A9.723 9.723 0 0 0 21.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 0 0 3.065 7.097A9.716 9.716 0 0 0 12 21.75a9.716 9.716 0 0 0 6.685-2.653Zm-12.54-1.285A7.486 7.486 0 0 1 12 15a7.486 7.486 0 0 1 5.855 2.812A8.224 8.224 0 0 1 12 20.25a8.224 8.224 0 0 1-5.855-2.438ZM15.75 9a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z"
                            clip-rule="evenodd" />
                    </svg>
                    <button type="button"
                        class="flex items-center gap-3 py-4.5 px-12 text-blue-500 font-bold border rounded-xl transition hover:text-blue-400 hover:cursor-pointer">
                        <img src="{{ asset('svg/upload.svg') }}" alt="upload icon">
                        UPLOAD COVER
                    </button>
                    <button type="button"
                        class="font-bold text-gray-600 ml-11 transition hover:text-gray-500 hover:cursor-pointer">
                        DELETE
                    </button>
                </div>
            </div>

            <x-forms.submit-btn>CHANGE</x-forms.submit-btn>
        </x-forms.form>
    </section>
</x-layout>
