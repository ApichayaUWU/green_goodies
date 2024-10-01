<x-app-layout>

    <head>
        <style>
        /* h2 {
            text-align: center;
            color: #4C4343;
        } */
        .brownBg {
            background-color: #F4EDDC;
        }

        .input_address {
            border-radius: 50px;
            border: 1px solid #000000;
            padding: 12px;
            width: 400px;
            height: 10px;
        }

        .input_city {
            border-radius: 50px;
            border: 1px solid #000000;
            padding: 12px;
            width: 100px;
            height: 10px;
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
            width: auto;
            height: auto;
        }

        .line {
            position: absolute;
            width: 1160px;
            height: 0px;
            left: auto;
            top: 295px;
            border: 1px solid #8A8A8A;
        }
        </style>
    </head>

    <div class="brownBg pt-6 pb-3 flex flex-row flex-wrap justify-center">
        <h2 class="font-semibold text-4xl text-gray-800 leading-tight">
            {{ __('Edit My Address') }}
        </h2>
    </div>


    <div class="">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 box">
                <div class="p-4 sm:p-8 bg-white box">
                    <div class="max-w-xl box">
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
                            <h4 class="text-lg font-bold mb-7">Address</h4>
                            <div class="line"></div>
                            <div class="flex flex-col">

                                <div class="space-y-4">
                                    <div class="flex flex-row ">
                                        <div class="">
                                            <p> Address Line 1 : </p>
                                        </div>
                                        <div class="">
                                            <input type="text" name="address_line1"
                                                value="{{ $address->address_line1 }}" class="input_address">
                                        </div>
                                    </div>

                                    <div class="flex flex-row ">
                                        <div class="">
                                            <p> Address Line 2 : </p>
                                        </div>
                                        <div class="">
                                            <input type="text" name="address_line2"
                                                value="{{ $address->address_line2 }}" class="input_address">
                                        </div>
                                    </div>

                                    <div class="flex flex-row ">
                                        <div class="">
                                            <p> City : </p>
                                        </div>
                                        <div class="">
                                            <input type="text" name="city" value="{{ $address->city }}"
                                                class="input_city">
                                        </div>
                                    </div>

                                    <div class="flex flex-row ">
                                        <div class="">
                                            <p> District : </p>
                                        </div>
                                        <div class="">
                                            <input type="text" name="district" value="{{ $address->district }}"
                                                class="input_city">
                                        </div>
                                    </div>

                                    <div class="flex flex-row ">
                                        <div class="">
                                            <p> Sub District : </p>
                                        </div>
                                        <div class="">
                                            <input type="text" name="sub_district" value="{{ $address->sub_district }}"
                                                class="input_city">
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <x-save-btn />
                                    </div>

                                </div>

                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>