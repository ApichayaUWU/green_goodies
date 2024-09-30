@if($addresses->isNotEmpty()) <!-- Ensure addresses is not empty -->
    <div class="space-y-4">
        @foreach($addresses as $address)
            <div class="p-4 bg-gray-100 rounded-lg shadow-md">
                <h4 class="text-lg font-bold">Address {{ $loop->iteration }}</h4>
                <p><strong>Address Line 1:</strong> {{ $address->address_line1 }}</p>
                <p><strong>Address Line 2:</strong> {{ $address->address_line2 }}</p>
                <p><strong>City:</strong> {{ $address->city }}</p>
                <p><strong>District:</strong> {{ $address->district }}</p>
                <p><strong>Sub District:</strong> {{ $address->sub_district }}</p>

                <!-- Edit and Delete buttons -->
                <div class="mt-4">
                    <a href="{{ route('address.edit', ['id' => $address->id]) }}" class="inline-flex items-center px-3 py-1 bg-green-500 text-white rounded hover:bg-green-600">
                        Edit
                    </a>
                    <form action="{{ route('address.destroy', $address->id) }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="inline-flex items-center px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@else
    <p>No addresses available.</p>
@endif
