@if($addresses)
    <div class="space-y-4">
        @foreach($addresses as $address)
            <div class="p-4 bg-gray-100 dark:bg-gray-800 rounded-lg shadow-md">
                <h4 class="text-lg font-bold">Address {{ $loop->iteration }}</h4>
                <p><strong>Address Line 1:</strong> {{ $address->address_line1 }}</p>
                <p><strong>Address Line 2:</strong> {{ $address->address_line2 }}</p>
                <p><strong>City:</strong> {{ $address->city }}</p>
                <p><strong>District:</strong> {{ $address->district }}</p>
                <p><strong>Sub District:</strong> {{ $address->sub_district }}</p>
            </div>
        @endforeach
    </div>
@else
    <p>No addresses available.</p>
@endif