@extends('layouts.sidebar_main')
@section('header')
<h2 class="text-2xl font-semibold">Payment History</h2>
@endsection
@section('content')
<div class="container mx-auto p-6">
    <div class="flex justify-end mb-4">
        <a href="#" onclick="document.getElementById('modalGcash').classList.remove('hidden')"
            class="w-50 block text-center px-6 py-2 bg-blue-600 text-white font-semibold rounded-xl shadow-lg hover:bg-blue-700 transition duration-300">
            <i class="fas fa-credit-card mr-3"></i> Make a Payment
        </a>
    </div>
    <table class="min-w-full bg-white rounded-md shadow overflow-hidden">
        <thead class="bg-gray-100 border-b">
            <tr>
                <th class="text-left px-6 py-3 text-sm font-medium text-gray-700">Date</th>
                <th class="text-left px-6 py-3 text-sm font-medium text-gray-700">Payment Type</th>
                <th class="text-left px-6 py-3 text-sm font-medium text-gray-700">Reference</th>
                <th class="text-right px-6 py-3 text-sm font-medium text-gray-700">Amount</th>
            </tr>
        </thead>
        <tbody>
            <tr class="border-b hover:bg-gray-50">
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">Aug 15, 2025</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-800">
                    <span class="inline-flex items-center space-x-1">
                        <div class="rounded-full bg-blue-900 px-[5px] text-white  font-bold">G</div>
                        <span>Gcash Payment</span>
                    </span>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">GC123456789</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-mono text-gray-800 text-right">₱1,500.00</td>

            </tr>

            <tr class="border-b hover:bg-gray-50">
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">Aug 10, 2025</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-800">
                    <span class="inline-flex items-center space-x-1">
                        <i class="fas fa-money-bill-wave text-yellow-600"></i>
                        <span>Cash Payment</span>
                    </span>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">CASH-987654321</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-mono text-gray-800 text-right">₱2,000.00</td>

            </tr>
        </tbody>
    </table>
    <div id="modalGcash" class="hidden fixed inset-0 z-50">
        <div class="absolute inset-0 bg-gray-900 bg-opacity-60 backdrop-blur-sm"></div>
        <div
            class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-white p-6 rounded-xl shadow-lg z-10 text-center w-[90%] md:w-[400px]">
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
                <input type="text" placeholder="Input your Gcash Reference Number" class="border w-full rounded-lg p-2 bg-gray-100">
                <span class="text-[10px] text-center text-yellow-600">
                    Warning! Invalid reference numbers may incur penalties and added charges.
                </span>
                <button class="bg-blue-800 px-4 py-2 rounded-full m-2 text-xs text-white w-1/2">Submit Payment</button>
            </div>
        </div>

    </div>
</div>

@endsection