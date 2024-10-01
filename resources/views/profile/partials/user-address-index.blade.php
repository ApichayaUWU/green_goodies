@if($addresses->isNotEmpty())
<!-- Ensure addresses is not empty -->

<head>
    <style>
    h1 {
        margin-left: 25px;
        color: #4C4343;
    }

    p {
        font-weight: lighter;
        margin-right: 10px;
        margin-bottom: 15px;
        margin-top: 3px;
        color: #4C4343;
    }

    .box {
        border-radius: 30px;
        background: #F4EDDC;
        padding: 12px;
        margin-bottom: 4px;
        margin-top: 4px;
        width: auto;
        height: auto;
    }

    .line {
        position: absolute;
        width: 1160px;
        height: 0px;
        left: auto;
        top: auto;
        border: 1px solid #8A8A8A;
    }
    </style>
</head>
<div class="space-y-4">

    @foreach($addresses as $address)
    <div class="line"></div>

    <div class="box">
        <div class="flex flex-row justify-between">
            <div class="flex flex-col">
                <h4 class="text-lg font-bold">Address {{ $loop->iteration }}</h4>
                <p><strong>Address Line 1:</strong> {{ $address->address_line1 }}</p>
                <p><strong>Address Line 2:</strong> {{ $address->address_line2 }}</p>
                <p><strong>City:</strong> {{ $address->city }}</p>
                <p><strong>District:</strong> {{ $address->district }}</p>
                <p><strong>Sub District:</strong> {{ $address->sub_district }}</p>
            </div>


            <!-- Edit and Delete buttons -->

            <div class="flex flex-row mt-4">
                <div class="">
                    <a href="{{ route('address.edit', ['id' => $address->id]) }}" style="background-color:#ACE094;"
                        class="rounded-lg inline-flex items-center px-3 py-1 text-gray-600 rounded hover:bg-green-600">
                        Edit
                    </a>
                </div>
                <div class="mx-1"></div>
                <div class="">
                    <form action="{{ route('address.destroy', $address->id) }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="background-color:#FFB8B8;"
                            class="rounded-lg inline-flex items-center px-3 py-1 text-gray-600 rounded hover:bg-red-600">
                            Delete
                        </button>
                    </form>
                </div>


            </div>



        </div>

    </div>
    @endforeach
</div>
@else
<p>No addresses available.</p>
@endif