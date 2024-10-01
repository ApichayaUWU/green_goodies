<section>

    <head>
        <style>
        .input {
            border-radius: 100%;
            border: 1px solid #000000;
            padding: 12px;
            width: 200px;
            height: 10px;
        }

        .box {
            border-radius: 30px;
            background: #F4EDDC;
            padding: 10px;
            width: auto;
            height: auto;
        }

        .blank {
            margin-left: 200px;
        }

        .box_text {
            white-space: nowrap;
            border-radius: 30px;
            padding: 5px;
            width: auto;
            height: auto;
        }

        p {
            font-weight: lighter;
            margin-right: 25px;
            margin-bottom: 15px;
            margin-top: 3px;
            color: #4C4343;
        }

        img {

            border-radius: 100%;
            padding: 4px;
            width: 195px;
            height: 195px;
        }

        .choose_file {
            width: 200px;

        }
        </style>
    </head>
    <div class="box">
        <header>

            <h1 class="text-lg font-medium text-color:#4C4343">
                {{ __('Profile Information') }}
            </h1>

            <p class="mt-1 text-sm text-color: #8A8A8A">
                {{ __("Update your account's profile information and email address.") }}
            </p>
        </header>

        <form id="send-verification" method="post" action="{{ route('verification.send') }}">
            @csrf
        </form>



        <div class="flex flex-row ">

            <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
                <div class="flex flex-col ">

                    @csrf
                    @method('patch')
                    <div class="flex flex-row ">
                        <div class="box_text">
                            <p> Username :</p>
                        </div>
                        <div class="">

                            <x-text-input id=" name" name="name" type="text" :value="old('name', $user->name)" required
                                autofocus autocomplete="name" class="input" />
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>
                    </div>

                    <div class="flex flex-row ">
                        <div class="box_text">
                            <p>Email : </p>
                        </div>
                        <div class="">
                            <x-text-input id="email" name="email" type="email" :value="old('email', $user->email)"
                                required autocomplete="username" class="input" />
                            <x-input-error class="mt-2" :messages="$errors->get('email')" />

                            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !
                            $user->hasVerifiedEmail())
                            <div>
                                <p class="text-sm mt-2 text-gray-800">
                                    {{ __('Your email address is unverified.') }}

                                    <button form="send-verification"
                                        class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        {{ __('Click here to re-send the verification email.') }}
                                    </button>
                                </p>

                                @if (session('status') === 'verification-link-sent')
                                <p class="mt-2 font-medium text-sm text-green-600">
                                    {{ __('A new verification link has been sent to your email address.') }}
                                </p>
                                @endif
                            </div>
                            @endif
                        </div>
                    </div>

                    <div class="flex flex-row ">
                        <div class="box_text">
                            <p>Phone Number : </p>
                        </div>
                        <div class="">
                            <x-text-input id="PhoneNumber" name="PhoneNumber" type="text"
                                :value="old('PhoneNumber', $user->PhoneNumber)" required class="input" />
                            <x-input-error class="mt-2" :messages="$errors->get('PhoneNumber')" />

                        </div>
                    </div>

                    <div class="flex flex-row ">
                        <div class="box_text">
                            <p>Date of birth : </p>
                        </div>
                        <div class="">
                            <x-text-input id="birthday" name="birthday" type="date"
                                :value="old('birthday', $user->birthday)" required class="input" />
                            <x-input-error class="mt-2" :messages="$errors->get('birthday')" />

                        </div>
                    </div>
                    <div class="mt-2 ">
                        <x-save-btn />
                        @if (session('status') === 'profile-updated')
                        <p x-data="{ show: true }" x-show="show" x-transition
                            x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600">
                            {{ __('Saved.') }}</p>
                        @endif
                    </div>
                </div>
            </form>



            <div class="blank"> </div>

            <div class="flex flex-col ">
                <form method="post" action="{{ route('profile.photo.update') }}" enctype="multipart/form-data" class="">
                    @csrf
                    <div class="">
                        @if(Auth::user()->profile_photo)
                        <div class="mb-4">
                            <img src="{{ asset('storage/' . Auth::user()->profile_photo) }}" alt="Profile Photo">
                        </div>
                        @else
                        <div class="mb-4">
                            <svg width="195" height="195" viewBox="0 0 200 200" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_147_606)">
                                    <path
                                        d="M100 0C44.7715 0 0 44.7715 0 100C0 155.229 44.7715 200 100 200C155.229 200 200 155.229 200 100C200 44.7715 155.229 0 100 0ZM46.3378 49.1088H153.662V150.891H46.3378V49.1088ZM59.5825 61.9507V117.761H140.418V61.9507H59.5825Z"
                                        fill="#4C4343" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_147_606">
                                        <rect width="200" height="200" fill="white" />
                                    </clipPath>
                                </defs>
                            </svg>

                        </div>
                        @endif
                    </div>

                    <div class="choose_file">
                        <input
                            class="block w-full text-sm text-color:#4C4343 border border-gray-300  cursor-pointer bg-gray-50 dark:text-color:#4C4343 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            aria-describedby="file_input_help" id="profile_photo" type="file" name="profile_photo">
                        <!-- <input type="file" name="profile_photo" id="profile_photo" class="mt-1 block w-full" /> -->
                        <x-input-error class="mt-2" :messages="$errors->get('profile_photo')" />
                    </div>

                    <div class="flex items-center gap-4">
                        <x-save-btn />
                        @if (session('status') === 'profile-photo-updated')
                        <p x-data="{ show: true }" x-show="show" x-transition
                            x-init="setTimeout(() => show = false, 2000)"
                            class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
                        @endif
                    </div>
                </form>

            </div>
            <!-- </div> -->
        </div>




    </div>


</section>