<x-app-layout>
    <x-slot name="header">
        <html>

        <head>
            <style>
            h2 {
                text-align: center;
                color: #4C4343;
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
                top: 245px;
                border: 1px solid #8A8A8A;
            }
            </style>
        </head>

        <body>
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight ">
                    {{ __('My Address') }}
                </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="box">
                <div class="max-w-full">

                    <form action="{{ route('address.store') }}" method="POST">
                        @csrf

                        <!-- Add New Address -->
                        <div class="box">
                            <h4 class="text-lg font-bold mb-7">Address</h4>
                            <div class="line"></div>

                            <div class="flex flex-col">
                                <div class="flex flex-row ">
                                    <div class="">
                                        <p> Address Line 1 : </p>
                                    </div>
                                    <div class="">
                                        <input type="text" name="addresses[new][address_line1]" class="input_address">
                                    </div>
                                </div>

                                <div class="flex flex-row ">
                                    <div class="">
                                        <p> Address Line 2 : </p>
                                    </div>
                                    <div class="">
                                        <input type="text" name="addresses[new][address_line2]" class="input_address">
                                    </div>
                                </div>

                                <div class="flex flex-row ">
                                    <div class="">
                                        <p> City : </p>
                                    </div>
                                    <div class="">
                                        <input type="text" name="addresses[new][city]" class="input_city">
                                    </div>
                                </div>

                                <div class="flex flex-row ">
                                    <div class="">
                                        <p> District : </p>
                                    </div>
                                    <div class="">
                                        <input type="text" name="addresses[new][district]" class="input_city">
                                    </div>
                                </div>

                                <div class="flex flex-row ">
                                    <div class="">
                                        <p> Sub District : </p>
                                    </div>
                                    <div class="">
                                        <input type="text" name="addresses[new][sub_district]" class="input_city">
                                    </div>
                                </div>
                            </div>
                            <!-- Save Button -->
                            <x-save-btn />

                        </div>
                </div>
                </form>

            </div>
        </div>
    </div>
    </div>
</x-app-layout>