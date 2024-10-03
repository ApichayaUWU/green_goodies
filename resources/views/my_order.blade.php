<x-app-layout>
    <h1>Order Summary</h1>

    @foreach ($grouped as $order_id => $orderDetails)
        <div class="order">
            <h2>Order ID: {{ $order_id }}</h2>
            <table border="1">
                <thead>
                    <tr>
                        <th>Product ID</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orderDetails as $detail)
                        <tr>
                            <td>{{ $detail->product->name }}</td>
                            <td>{{ $detail->quantity }}</td>
                            <td>{{ $detail->total_price }}</td>
                            <td>{{ $detail->created_at }}</td>
                            <td>{{ $detail->updated_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <hr>
    @endforeach
</x-app-layout>
