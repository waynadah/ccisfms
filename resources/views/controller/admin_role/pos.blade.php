@extends('layouts.sidebar_main')
@section('header')
<h2 class="text-2xl font-semibold">New Payments</h2>
@endsection
@section('content')
<div class="container mx-auto p-6">
    <div class="bg-white rounded-md grid grid-cols-1 md:grid-cols-2 gap-4">
        <div class="bg-gray-800">&nbsp;</div>
        <div class="flex flex-col bg-transparent p-4 space-y-4 text-white">
            <button class="flex justify-center items-center bg-green-600 p-2 py-3 font-bold rounded-lg">
                <div class="flex items-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" id="Payments--Streamline-Outlined-Material" height="18" width="18">
                        <desc>
                            Payments Streamline Icon: https://streamlinehq.com
                        </desc>
                        <path fill="currentColor" d="M13.5 13.5c-0.83335 0 -1.54165 -0.29165 -2.125 -0.875S10.5 11.33335 10.5 10.5s0.29165 -1.54165 0.875 -2.125S12.66665 7.5 13.5 7.5s1.54165 0.29165 2.125 0.875S16.5 9.66665 16.5 10.5s-0.29165 1.54165 -0.875 2.125S14.33335 13.5 13.5 13.5Zm-8 3.5c-0.4125 0 -0.765585 -0.1469 -1.05925 -0.44075C4.146915 16.2656 4 15.9125 4 15.5V5.5c0 -0.4125 0.146915 -0.765665 0.44075 -1.0595C4.734415 4.146835 5.0875 4 5.5 4h16c0.4125 0 0.76565 0.146835 1.0595 0.4405 0.29365 0.293835 0.4405 0.647 0.4405 1.0595v10c0 0.4125 -0.14685 0.7656 -0.4405 1.05925C22.26565 16.8531 21.9125 17 21.5 17H5.5Zm2.5 -1.5h11c0 -0.7 0.24165 -1.29165 0.725 -1.775C20.20835 13.24165 20.8 13 21.5 13V8c-0.7 0 -1.29165 -0.24165 -1.775 -0.725C19.24165 6.79165 19 6.2 19 5.5H8c0 0.7 -0.24165 1.29165 -0.725 1.775C6.79165 7.75835 6.2 8 5.5 8v5c0.7 0 1.29165 0.24165 1.775 0.725 0.48335 0.48335 0.725 1.075 0.725 1.775Zm12 4.5H2.5c-0.4125 0 -0.765585 -0.1469 -1.05925 -0.44075C1.146915 19.2656 1 18.9125 1 18.5V7h1.5v11.5h17.5v1.5Z" stroke-width="0.5"></path>
                    </svg>
                    <p> Cash Payments</p>
                </div>
            </button>
            <button class="flex justify-center items-center bg-blue-600 p-2 py-3 font-bold rounded-lg">
                <div class="flex items-center space-x-2">
                    <div class="rounded-full bg-white text-blue-600 w-6 h-6 flex items-center justify-center">G</div>
                    <p> GCash Payments</p>
                </div>
            </button>
            <div class="flex-1 flex justify-end flex-col min-h-[100px]">
                <button class="flex justify-center items-center bg-transparent hover:bg-purple-600 hover:text-white text-purple-600 border border-purple-600 p-2 py-3 font-bold rounded-lg">
                    <div class="flex items-center space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" id="List-Alt-Add--Streamline-Outlined-Material" height="24" width="24">

                            <path fill="currentColor" d="M17.5 23v-3h-3v-1.5h3v-3h1.5v3h3v1.5h-3v3h-1.5ZM4.5 21c-0.4 0 -0.75 -0.15 -1.05 -0.45 -0.3 -0.3 -0.45 -0.65 -0.45 -1.05V4.5c0 -0.4 0.15 -0.75 0.45 -1.05C3.75 3.15 4.1 3 4.5 3h15c0.4 0 0.75 0.15 1.05 0.45 0.3 0.3 0.45 0.65 0.45 1.05v9.7c-0.22765 -0.132 -0.4679 -0.24 -0.72075 -0.324 -0.25285 -0.084 -0.5126 -0.15935 -0.77925 -0.226V4.5H4.5v15h8c0.01665 0.26665 0.04235 0.52435 0.077 0.773 0.0345 0.2485 0.09215 0.49085 0.173 0.727H4.5Zm3 -4.15c0.2 0 0.375 -0.075 0.525 -0.225 0.15 -0.15 0.225 -0.325 0.225 -0.525s-0.075 -0.375 -0.225 -0.525c-0.15 -0.15 -0.325 -0.225 -0.525 -0.225s-0.375 0.075 -0.525 0.225c-0.15 0.15 -0.225 0.325 -0.225 0.525s0.075 0.375 0.225 0.525c0.15 0.15 0.325 0.225 0.525 0.225Zm0 -4.1c0.2 0 0.375 -0.075 0.525 -0.225 0.15 -0.15 0.225 -0.325 0.225 -0.525s-0.075 -0.375 -0.225 -0.525c-0.15 -0.15 -0.325 -0.225 -0.525 -0.225s-0.375 0.075 -0.525 0.225c-0.15 0.15 -0.225 0.325 -0.225 0.525s0.075 0.375 0.225 0.525c0.15 0.15 0.325 0.225 0.525 0.225Zm0 -4.1c0.2 0 0.375 -0.075 0.525 -0.225 0.15 -0.15 0.225 -0.325 0.225 -0.525s-0.075 -0.375 -0.225 -0.525c-0.15 -0.15 -0.325 -0.225 -0.525 -0.225s-0.375 0.075 -0.525 0.225c-0.15 0.15 -0.225 0.325 -0.225 0.525s0.075 0.375 0.225 0.525c0.15 0.15 0.325 0.225 0.525 0.225Zm3.3 4.1h6.1v-1.5H10.8v1.5Zm0 -4.1h6.1v-1.5H10.8v1.5Zm0 8.2h2.225c0.13335 -0.28335 0.2875 -0.54585 0.4625 -0.7875 0.175 -0.24165 0.3625 -0.47915 0.5625 -0.7125h-3.25v1.5Z" stroke-width="0.5"></path>
                        </svg>
                        <p> New Payments</p>
                    </div>
                </button>
            </div>
        </div>
    </div>

    <div id="modalGcash" class="hidden fixed inset-0 z-50">
        <div class="absolute inset-0 bg-gray-900 bg-opacity-60 backdrop-blur-sm"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-white rounded-xl shadow-lg z-10 text-center w-[90%] md:w-[50%]">
            <div class="flex flex-row justify-between bg-blue-600 rounded-t-xl p-2 text-start text-white text-xl font-bold">
                <p>GCash Payment</p>
                <p class="cursor-pointer px-2 hover:text-gray-400">&times;</p>
            </div>
            <div class="flex pt-2">
                <div class="p-6">
                    <div class="bg-blue-600 rounded-2xl text-white w-[200px] h-[200px] flex items-center justify-center">
                        <p class="text-4xl font-bold "> GCash</p>
                    </div>
                </div>
                <div class="p-6 space-y-2 w-full">
                    <div>
                        <p class="text-sm text-start font-bold ">Enter Gcash Reference Number</p>
                        <input type="text" class="border border-gray-300 rounded-md p-2 w-full">
                    </div>
                    <div>
                        <p class="text-sm text-start font-bold ">Transaction Type</p>
                        <select name="" class="border border-gray-300 rounded-md p-2 w-full" id="">
                            <option value="">PSITS</option>
                            <option value="">sab</option>
                            <option value="">tes</option>
                        </select>
                    </div>
                    <div class="flex space-x-2 w-full">
                        <div class="w-full">
                            <p class="text-sm text-start font-bold ">Cash Amount</p>
                            <input type="text" class="border border-gray-300 rounded-md p-2 w-full text-2xl font-bold">
                        </div>
                        <div class="w-full">
                            <p class="text-sm text-start font-bold ">Cash Change</p>
                            <input readonly value="0.00" type="text" class="border bg-gray-200 text-2xl font-bold border-gray-300 rounded-md p-2 w-full">
                        </div>
                    </div>
                </div>
            </div>
            <div class="px-2 pb-2 w-full">
                <button class="w-full bg-green-600 p-2 py-3 font-bold rounded-lg text-white">Submit Gcash Payment</button>
            </div>
        </div>

    </div>


    <div id="modalCash" class="hidden fixed inset-0 z-50">
        <div class="absolute inset-0 bg-gray-900 bg-opacity-60 backdrop-blur-sm"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-white rounded-xl shadow-lg z-10 text-center w-[90%] md:w-[50%]">
            <div class="flex flex-row justify-between bg-green-600 rounded-t-xl p-2 text-start text-white text-xl font-bold">
                <p>Cash Payment</p>
                <p class="cursor-pointer px-2 hover:text-gray-400">&times;</p>
            </div>
            <div class="flex pt-2">
                <div class="p-6">
                    <div class="bg-green-600 rounded-2xl text-white w-[200px] h-[200px] flex items-center justify-center">
                        <p class="text-4xl font-bold "> Cash Payment</p>
                    </div>
                </div>
                <div class="p-6 space-y-2 w-full">
                    <div>
                        <p class="text-sm text-start font-bold ">Enter Gcash Reference Number</p>
                        <input type="text" class="border border-gray-300 rounded-md p-2 w-full">
                    </div>
                    <div>
                        <p class="text-sm text-start font-bold ">Transaction Type</p>
                        <select name="" class="border border-gray-300 rounded-md p-2 w-full" id="">
                            <option value="">PSITS</option>
                            <option value="">sab</option>
                            <option value="">tes</option>
                        </select>
                    </div>
                    <div class="flex space-x-2 w-full">
                        <div class="w-full">
                            <p class="text-sm text-start font-bold ">Cash Amount</p>
                            <input type="text" class="border border-gray-300 rounded-md p-2 w-full text-2xl font-bold">
                        </div>
                        <div class="w-full">
                            <p class="text-sm text-start font-bold ">Cash Change</p>
                            <input readonly value="0.00" type="text" class="border bg-gray-200 text-2xl font-bold border-gray-300 rounded-md p-2 w-full">
                        </div>
                    </div>
                </div>
            </div>
            <div class="px-2 pb-2 w-full">
                <button class="w-full bg-blue-600 p-2 py-3 font-bold rounded-lg text-white">Submit Cash Payment</button>
            </div>
        </div>

    </div>

    <div id="modalNewPayment" class=" fixed inset-0 z-50">
        <div class="absolute inset-0 bg-gray-900 bg-opacity-60 backdrop-blur-sm"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-white rounded-xl shadow-lg z-10 text-center w-[90%] md:w-[50%]">
            <div class="flex flex-row justify-between bg-green-600 rounded-t-xl p-2 text-start text-white text-xl font-bold">
                <p>Cash Payment</p>
                <p class="cursor-pointer px-2 hover:text-gray-400">&times;</p>
            </div>
            <div class="flex pt-2">
                <div class="p-6">
                    <div class="bg-green-600 rounded-2xl text-white w-[200px] h-[200px] flex items-center justify-center">
                        <p class="text-4xl font-bold "> Cash Payment</p>
                    </div>
                </div>
                <div class="p-6 space-y-2 w-full">
                    <div>
                        <p class="text-sm text-start font-bold ">Enter Gcash Reference Number</p>
                        <input type="text" class="border border-gray-300 rounded-md p-2 w-full">
                    </div>
                    <div>
                        <p class="text-sm text-start font-bold ">Transaction Type</p>
                        <select name="" class="border border-gray-300 rounded-md p-2 w-full" id="">
                            <option value="">PSITS</option>
                            <option value="">sab</option>
                            <option value="">tes</option>
                        </select>
                    </div>
                    <div class="flex space-x-2 w-full">
                        <div class="w-full">
                            <p class="text-sm text-start font-bold ">Cash Amount</p>
                            <input type="text" class="border border-gray-300 rounded-md p-2 w-full text-2xl font-bold">
                        </div>
                        <div class="w-full">
                            <p class="text-sm text-start font-bold ">Cash Change</p>
                            <input readonly value="0.00" type="text" class="border bg-gray-200 text-2xl font-bold border-gray-300 rounded-md p-2 w-full">
                        </div>
                    </div>
                </div>
            </div>
            <div class="px-2 pb-2 w-full">
                <button class="w-full bg-blue-600 p-2 py-3 font-bold rounded-lg text-white">Submit Cash Payment</button>
            </div>
        </div>

    </div>
</div>
@endsection