<x-app-layout>
    <style>
        .lineOrder{
            width: 100%;
            height: 0px;
            margin-bottom: 10px;
            border: 1px solid #bbb093;
        }
        .line{
            width: 100%;
            height: 0px;
            margin-bottom: 10px;
            border: 1px solid #efece6;
        }
    </style>
    <div class="bg-[#53B637] text-center w-[200px] rounded-[40px] mt-10 mb-4 mx-8">
        <p class="pt-5 text-2xl text-white p-2"><strong>Order Summary</strong></p>
    </div>
    @if($grouped->isEmpty())
        <div class = "flex flex-row justify-center">
            <div><svg xmlns="http://www.w3.org/2000/svg" width="250" height="250" fill="#b8b8b8" class="bi bi-receipt" viewBox="0 0 16 16">
                <path d="M1.92.506a.5.5 0 0 1 .434.14L3 1.293l.646-.647a.5.5 0 0 1 .708 0L5 1.293l.646-.647a.5.5 0 0 1 .708 0L7 1.293l.646-.647a.5.5 0 0 1 .708 0L9 1.293l.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .801.13l.5 1A.5.5 0 0 1 15 2v12a.5.5 0 0 1-.053.224l-.5 1a.5.5 0 0 1-.8.13L13 14.707l-.646.647a.5.5 0 0 1-.708 0L11 14.707l-.646.647a.5.5 0 0 1-.708 0L9 14.707l-.646.647a.5.5 0 0 1-.708 0L7 14.707l-.646.647a.5.5 0 0 1-.708 0L5 14.707l-.646.647a.5.5 0 0 1-.708 0L3 14.707l-.646.647a.5.5 0 0 1-.801-.13l-.5-1A.5.5 0 0 1 1 14V2a.5.5 0 0 1 .053-.224l.5-1a.5.5 0 0 1 .367-.27m.217 1.338L2 2.118v11.764l.137.274.51-.51a.5.5 0 0 1 .707 0l.646.647.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.509.509.137-.274V2.118l-.137-.274-.51.51a.5.5 0 0 1-.707 0L12 1.707l-.646.647a.5.5 0 0 1-.708 0L10 1.707l-.646.647a.5.5 0 0 1-.708 0L8 1.707l-.646.647a.5.5 0 0 1-.708 0L6 1.707l-.646.647a.5.5 0 0 1-.708 0L4 1.707l-.646.647a.5.5 0 0 1-.708 0z"/>
                <path d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5m8-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5"/>
            </svg></div>
            </div>
            <div class = "flex flex-row justify-center my-6"><div>
                <p class="p-2 text-2xl text-[#b8b8b8]">- You currently have no items ordered. -</p>
            </div>
        </div>
    @else
        @foreach ($grouped as $order_id => $orderDetails)
            <div class="order mx-20">
                <p class="pt-5 text-xl text-[#4C4343] p-2 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-receipt-cutoff mr-2 mb-3" viewBox="0 0 16 16">
                        <path d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5M11.5 4a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1z"/>
                        <path d="M2.354.646a.5.5 0 0 0-.801.13l-.5 1A.5.5 0 0 0 1 2v13H.5a.5.5 0 0 0 0 1h15a.5.5 0 0 0 0-1H15V2a.5.5 0 0 0-.053-.224l-.5-1a.5.5 0 0 0-.8-.13L13 1.293l-.646-.647a.5.5 0 0 0-.708 0L11 1.293l-.646-.647a.5.5 0 0 0-.708 0L9 1.293 8.354.646a.5.5 0 0 0-.708 0L7 1.293 6.354.646a.5.5 0 0 0-.708 0L5 1.293 4.354.646a.5.5 0 0 0-.708 0L3 1.293zm-.217 1.198.51.51a.5.5 0 0 0 .707 0L4 1.707l.646.647a.5.5 0 0 0 .708 0L6 1.707l.646.647a.5.5 0 0 0 .708 0L8 1.707l.646.647a.5.5 0 0 0 .708 0L10 1.707l.646.647a.5.5 0 0 0 .708 0L12 1.707l.646.647a.5.5 0 0 0 .708 0l.509-.51.137.274V15H2V2.118z"/>
                    </svg>
                    Order ID : {{ $order_id }}
                </p>

                <table border="1" class ="mx-15 table-fixed w-full">
                    <thead class = "bg-[#fbf8f1]">
                        <tr>
                            <th class="p-2 text-lg text-[#4C4343]">Product ID</th>
                            <th class="p-2 text-lg text-[#4C4343]">Quantity</th>
                            <th class="p-2 text-lg text-[#4C4343]">Total Price</th>
                            <th class="p-2 text-lg text-[#4C4343]">Created At</th>
                            <th class="p-2 text-lg text-[#4C4343]">Updated At</th>
                        </tr>
                    </thead>
                    <tbody class = "text-center">
                        @foreach ($orderDetails as $detail)
                            <tr>
                                <td class="p-2 text-lg text-[#4C4343]">{{ $detail->product->name }}</td>
                                <td class="p-2 text-lg text-[#4C4343]">{{ $detail->quantity }}</td>
                                <td class="p-2 text-lg text-[#4C4343]">{{ $detail->total_price }}</td>
                                <td class="p-2 text-lg text-[#4C4343]">{{ $detail->created_at }}</td>
                                <td class="p-2 text-lg text-[#4C4343]">{{ $detail->updated_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="line"></div>
                <h1 class="p-2 text-lg text-[#4C4343] text-right mx-2">Total : ${{ number_format($orderDetails->sum(function($item) {
                    return $item->total_price;}), 2) }}
                </h1>
            </div>
            <hr>
            @if(!$loop->last)
                <div class="lineOrder"></div> 
            @endif
                
        @endforeach
    @endif
</x-app-layout>
