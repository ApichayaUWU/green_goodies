<section>

    <head>
        <style>
        .input {
            border-radius: 50px;
            border: 1px solid #000000;
            padding: 12px;
            width: 400px;
            height: 10px;
        }

        .box {
            border-radius: 30px;
            background: #F4EDDC;
            padding: 12px;
            width: auto;
            height: auto;
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
        </style>
    </head>
    <div class="box">
        <header>
            <h1 class="text-lg font-medium text-gray-900">
                {{ __('Update Password') }}
            </h1>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Ensure your account is using a long, random password to stay secure.') }}
            </p>
        </header>

        <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
            @csrf
            @method('put')
            <div class="flex flex-col">
                <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
                    @csrf
                    @method('patch')
                    <div class="flex flex-row flex-auto w-200">
                        <div class="box_text">
                            <p>Current Password :</p>
                        </div>
                        <div class="">
                            <x-text-input id="update_password_current_password" name="current_password" type="password"
                                class="input" autocomplete="current-password" />
                            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                        </div>
                    </div>

                    <div class="flex flex-row ">
                        <div class="box_text">
                            <p>New Password : </p>
                        </div>
                        <div class="">
                            <x-text-input id="update_password_password" name="password" type="password" class="input"
                                autocomplete="new-password" />
                            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />

                        </div>
                    </div>

                    <div class="flex flex-row ">
                        <div class="box_text">
                            <p>Confirm Password : </p>
                        </div>
                        <div class="">
                            <x-text-input id="update_password_password_confirmation" name="password_confirmation"
                                type="password" class="input" autocomplete="new-password" />
                            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')"
                                class="mt-2" />

                        </div>
                    </div>


                    <div class="mt-2 ">
                        <x-save-btn />
                        @if (session('status') === 'password-updated')
                        <p x-data="{ show: true }" x-show="show" x-transition
                            x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600">
                            {{ __('Saved.') }}</p>
                        @endif
                    </div>

                </form>
            </div>

</section>