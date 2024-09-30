<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create My Address') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">

    <form action="{{ route('address.store') }}" method="POST">
                        @csrf

    <!-- Add New Address -->
    <div class="p-4 bg-gray-100 rounded-lg shadow-md">
                                <h4 class="text-lg font-bold">Add New Address</h4>

                                <div class="mt-2">
                                    <label for="new_address_line1" class="block text-sm font-medium text-gray-700">Address Line 1</label>
                                    <input type="text" name="addresses[new][address_line1]" class="block w-full p-2 border rounded-md">
                                </div>

                                <div class="mt-2">
                                    <label for="new_address_line2" class="block text-sm font-medium text-gray-700">Address Line 2</label>
                                    <input type="text" name="addresses[new][address_line2]" class="block w-full p-2 border rounded-md">
                                </div>

                                <div class="mt-2">
                                    <label for="new_city" class="block text-sm font-medium text-gray-700">City</label>
                                    <input type="text" name="addresses[new][city]" class="block w-full p-2 border rounded-md">
                                </div>

                                <div class="mt-2">
                                    <label for="new_district" class="block text-sm font-medium text-gray-700">District</label>
                                    <input type="text" name="addresses[new][district]" class="block w-full p-2 border rounded-md">
                                </div>

                                <div class="mt-2">
                                    <label for="new_sub_district" class="block text-sm font-medium text-gray-700">Sub District</label>
                                    <input type="text" name="addresses[new][sub_district]" class="block w-full p-2 border rounded-md">
                                </div>
                            </div>
                        </div>

                        <!-- Save Button -->
                        <div class="mt-4">
                            <x-primary-button>
                                {{ __('Save Addresses') }}
                            </x-primary-button>
                        </div>
                    </form>

                    </div>
            </div>
        </div>
    </div>
</x-app-layout>