<section class="space-y-6">

    <head>
        <style>
        h1 {
            margin-left: 25px;
            color: #4C4343;
        }

        h2 {
            color: #4C4343;
        }

        .input {
            border-radius: 50px;
            border: 1px solid #000000;
            padding: 14px;
            width: 400px;
            height: 12px;
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
            <h1 class="text-xl font-medium ">
                {{ __('Delete Account') }}
            </h1>

            <p class="mt-1 text-sm text-gray-600 ml-6">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
            </p>
        </header>
        <div class="ml-6">
            <x-danger-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">
                {{ __('Delete Account') }}</x-danger-button>

        </div>
        <div class="box">
            <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
                <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
                    @csrf
                    @method('delete')
                    <div class="box">
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('Are you sure you want to delete your account?') }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600">
                            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                        </p>

                        <div class="mt-6">
                            <div class="flex flex-row ">
                                <div class="">
                                    <p> password : </p>
                                </div>
                                <div class="">
                                    <x-text-input id="password" name="password" type="password" class="input"
                                        placeholder="{{ __('Password') }}" />

                                    <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
                                </div>
                            </div>




                        </div>

                        <div class="mt-6 flex justify-end">
                            <x-secondary-button x-on:click="$dispatch('close')">
                                {{ __('Cancel') }}
                            </x-secondary-button>

                            <x-danger-button class="ms-3">
                                {{ __('Delete Account') }}
                            </x-danger-button>
                        </div>
                    </div>

                </form>
            </x-modal>
        </div>



    </div>

</section>