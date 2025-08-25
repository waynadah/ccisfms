
    <div id="modalGcash" class=" fixed inset-0 z-50">

        <div onclick="window.location.href='{{ route('admin.pos') }}'" class="cursor-pointer    absolute inset-0 bg-gray-900 bg-opacity-60 backdrop-blur-sm"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-white rounded-xl shadow-lg z-10 text-center w-[90%] md:w-[50%]">
            <div class="flex flex-row justify-between bg-blue-600 rounded-t-xl p-2 text-start text-white text-xl font-bold">
                <p>GCash Payment</p>
                <a href="{{route('admin.pos')}}" class="cursor-pointer px-2 hover:text-gray-400">&times;</a>
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
                <button class="w-full bg-blue-700 p-2 py-3 font-bold rounded-lg text-white">Submit Gcash Payment</button>
            </div>
        </div>

    </div>