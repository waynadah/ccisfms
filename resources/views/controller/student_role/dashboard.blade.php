@extends('layouts.sidebar_main')
@section('header')
<h2 class="text-2xl font-semibold">Dashboard</h2>
@endsection
@section('content')
<div class="container mx-auto mt-5 px-4">

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="hidden flex flex-col gap-6">

            <x-summary-card title="Allocated Budget"
                tooltip="The total amount set aside for the current academic year's financial plans."
                amount="₱123,123,123" color="text-green-600" label="Total Budgeted Amount" />

            <x-summary-card title="Outstanding Liabilities"
                tooltip="Total unpaid financial commitments the school has incurred." amount="₱123,123,123"
                color="text-red-600" label="Amount Due" />

            <x-summary-card title="Pending Disbursements"
                tooltip="Funds that have been approved but are waiting to be distributed." amount="₱123,132"
                color="text-yellow-500" label="To Be Released" />

        </div>

        <div class="flex flex-col gap-6">

            <x-summary-card title="Council Funds (Total)"
                tooltip="Aggregate amount of funds controlled by the Student Council." amount="₱123,123,123"
                color="text-blue-600" label="Council Reserve" />

            <x-summary-card title="PSITS Funds (Total)" tooltip="Current available balance of PSITS-managed resources."
                amount="₱123,123,123" color="text-green-600" label="PSITS Available Funds" />

            <x-summary-card title="LISSO Funds (Total)"
                tooltip="LISSO transactions currently in queue for processing or clearance." amount="₱123,132"
                color="text-yellow-600" label="Transactions in Queue" />

        </div>


        <div class="flex flex-col bg-white dark:bg-gray-800 p-6 rounded-xl shadow-lg">

            <div class="flex flex-col justify-between items-center mb-8">
                <h3 class="text-xs md:text-xl text-gray-600">Welcome!</h3>
                <h3 class="text-xs md:text-3xl font-semibold text-gray-800 text-center">Gilmark Lozano Paungilan</h3>
            </div>

            <div class="flex-1 flex flex-col justify-between gap-6">
                <div class="flex flex-col gap-6">
                    <a href="#" onclick="document.getElementById('modalGcash').classList.remove('hidden')"
                        class="block text-center px-6 py-4 bg-blue-600 text-white font-semibold rounded-xl shadow-lg hover:bg-blue-700 transition duration-300">
                        <i class="fas fa-credit-card mr-3"></i> Make a Payment
                    </a>

                    <a href="#"
                        class="block text-center px-6 py-4 bg-green-600 text-white font-semibold rounded-xl shadow-lg hover:bg-green-700 transition duration-300">
                        <i class="fas fa-check-circle mr-3"></i> Request Clearance
                    </a>
                </div>

                <button
                    class="px-6 py-2 w-full text-xs md:text-lg font-semibold border-2 text-indigo-600 border-indigo-600 hover:bg-indigo-600 hover:text-white rounded-lg transition duration-300">
                    <i class="fas fa-wallet mr-2"></i> Unpaid Amount: ₱123,123
                </button>
            </div>

            <div id="modalGcash" class="hidden fixed inset-0 z-50">
                <div class="absolute inset-0 bg-gray-900 bg-opacity-60 backdrop-blur-sm"></div>
                <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-white p-6 rounded-xl shadow-lg z-10 text-center w-[90%] md:w-[400px]">

                    <span onclick="document.getElementById('modalGcash').classList.add('hidden')"
                        class="absolute top-1 right-4 text-3xl text-gray-600 cursor-pointer hover:text-gray-800">
                        &times;
                    </span>
                    <h5 class="text-2xl font-semibold text-gray-800 mb-4">
                        Pay via <span class="bg-blue-900 pb-1 text-white px-2 rounded">GCash</span>
                    </h5>
                    <p class="text-base text-gray-600 mb-3">Scan the QR code below to pay using GCash.</p>
                    <img src="{{ asset('gcash_qr.jpg') }}" alt="GCash QR Code"
                        class="mx-auto w-1/2 h-1/2 object-cover rounded-xl shadow-lg">
                    <div class="flex flex-col justify-center items-center">
                        <input type="text" placeholder="Input your Gcash Name" class="border w-full mb-2 rounded-lg p-2 bg-gray-100">
                        <input type="text" placeholder="Input your Gcash Reference Number" class="border w-full rounded-lg p-2 bg-gray-100">
                        <span class="text-[10px] text-center text-yellow-600">
                            Warning! Invalid reference numbers may incur penalties and added charges.
                        </span>
                        <button class="bg-blue-800 px-4 py-2 rounded-full m-2 text-xs text-white w-1/2">Submit Payment</button>
                    </div>
                    
                </div>

            </div>
        </div>

    </div>

</div>
@endsection