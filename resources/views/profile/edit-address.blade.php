<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit My Address') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @if(session('status'))
                    <div class="mb-4 text-green-600">
                        {{ session('status') }}
                    </div>
                    @endif

                    <!-- Form for editing a specific address -->
                    <form action="{{ route('address.update', $address->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <!-- Use PUT method for updating -->

                        <div class="space-y-4">
                            <div class="mt-2">
                                <label for="address_line1" class="block text-sm font-medium text-gray-700">Address Line
                                    1</label>
                                <input type="text" name="address_line1" value="{{ $address->address_line1 }}"
                                    class="block w-full p-2 border rounded-md">
                            </div>

                            <div class="mt-2">
                                <label for="address_line2" class="block text-sm font-medium text-gray-700">Address Line
                                    2</label>
                                <input type="text" name="address_line2" value="{{ $address->address_line2 }}"
                                    class="block w-full p-2 border rounded-md">
                            </div>

                            <div class="mt-2">
                                <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                                <input type="text" name="city" value="{{ $address->city }}"
                                    class="block w-full p-2 border rounded-md">
                            </div>

                            <div class="mt-2">
                                <label for="district" class="block text-sm font-medium text-gray-700">District</label>
                                <input type="text" name="district" value="{{ $address->district }}"
                                    class="block w-full p-2 border rounded-md">
                            </div>

                            <div class="mt-2">
                                <label for="sub_district" class="block text-sm font-medium text-gray-700">Sub
                                    District</label>
                                <input type="text" name="sub_district" value="{{ $address->sub_district }}"
                                    class="block w-full p-2 border rounded-md">
                            </div>
                        </div>

                        <!-- Save Button -->
                        <div class="mt-4">
                            <x-primary-button>
                                {{ __('Save Address') }}
                            </x-primary-button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>