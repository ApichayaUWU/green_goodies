<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Address') }}
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

                   
                    <!-- Form for editing and adding addresses -->
                    <form action="{{ route('address.store') }}" method="POST">
                        @csrf

                        
                        <div class="space-y-4">
                        @if($addresses)
                            <!-- Existing Addresses -->
                            @foreach($addresses as $address)
                                <div class="p-4 bg-gray-100 rounded-lg shadow-md">
                                    <h4 class="text-lg font-bold">Edit Address {{ $loop->iteration }}</h4>

                                    <input type="hidden" name="addresses[{{ $address->id }}][id]" value="{{ $address->id }}">

                                    <div class="mt-2">
                                        <label for="address_line1" class="block text-sm font-medium text-gray-700">Address Line 1</label>
                                        <input type="text" name="addresses[{{ $address->id }}][address_line1]" value="{{ $address->address_line1 }}"
                                               class="block w-full p-2 border rounded-md">
                                    </div>

                                    <div class="mt-2">
                                        <label for="address_line2" class="block text-sm font-medium text-gray-700">Address Line 2</label>
                                        <input type="text" name="addresses[{{ $address->id }}][address_line2]" value="{{ $address->address_line2 }}"
                                               class="block w-full p-2 border rounded-md">
                                    </div>

                                    <div class="mt-2">
                                        <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                                        <input type="text" name="addresses[{{ $address->id }}][city]" value="{{ $address->city }}"
                                               class="block w-full p-2 border rounded-md">
                                    </div>

                                    <div class="mt-2">
                                        <label for="district" class="block text-sm font-medium text-gray-700">District</label>
                                        <input type="text" name="addresses[{{ $address->id }}][district]" value="{{ $address->district }}"
                                               class="block w-full p-2 border rounded-md">
                                    </div>

                                    <div class="mt-2">
                                        <label for="sub_district" class="block text-sm font-medium text-gray-700">Sub District</label>
                                        <input type="text" name="addresses[{{ $address->id }}][sub_district]" value="{{ $address->sub_district }}"
                                               class="block w-full p-2 border rounded-md">
                                    </div>

                                    <!-- Delete Button -->
                                    <div class="mt-4">
                                        <form method="POST" action="{{ route('address.destroy', $address->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <x-danger-button onclick="return confirm('Are you sure you want to delete this address?')">
                                                {{ __('Delete') }}
                                            </x-danger-button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                            @else
                            <p>No addresses available.</p>
                        @endif
                            
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
