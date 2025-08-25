
    <div id="modalNewPayment" class=" fixed inset-0 z-50">
        <div onclick="window.location.href='{{ route('admin.pos') }}'" class="cursor-pointer    absolute inset-0 bg-gray-900 bg-opacity-60 backdrop-blur-sm"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-white rounded-xl shadow-lg z-10 text-center w-[90%] md:w-[50%]">
            <div class="flex flex-row justify-between bg-purple-600 rounded-t-xl p-2 text-start text-white text-xl font-bold">
                <p>New Payment</p>
                <a href="{{route('admin.pos')}}" class="cursor-pointer px-2 hover:text-gray-400">&times;</a>
            </div>
            <div class="flex flex-col px-2">

                <form action="{{route('admin.pos.newpayment_submit')}}" method="post" class="py-2 space-y-2 w-full">
                    @csrf
                    <div>
                        <p class="text-sm text-start font-bold ">Department</p>
                        <select disabled class="border border-gray-300 rounded-md p-2 w-full"
                            onchange="window.location.href = '{{ route('admin.pos', ['modal' => 3]) }}' + '?department=' + this.value">
                            <option value="">Select Department</option>
                            @foreach($department as $dep)
                            <option value="{{ $dep->college }}"
                                {{ request('department', 'CCIS') == $dep->college ? 'selected' : '' }}>
                                {{ $dep->college }}
                            </option>
                            @endforeach

                        </select>
                        <input type="hidden" name="department" value="{{ request('department', 'CCIS') }}">
                    </div>
                    <div>
                        <p class="text-sm text-start font-bold ">Programs</p>
                        <select name="program" class="border border-gray-300 rounded-md p-2 w-full">
                            @forelse($programs as $prog)
                            <option value="{{ $prog->id }}">
                                {{ $prog->programs }}
                            </option>
                            @empty
                            <option value="">Select Department First</option>
                            @endforelse
                        </select>
                    </div>
                    <div>
                        <p class="text-sm text-start font-bold ">Payment Description</p>
                        <input required name="payment" type="text" class="border border-gray-300 rounded-md p-2 w-full">
                    </div>
                    <div>
                        <p class="text-sm text-start font-bold ">Payment Ammount</p>
                        <input required name="amount" type="text" class="border border-gray-300 rounded-md p-2 w-full" placeholder="0.00">
                    </div>
                    <div class="flex space-x-2 w-full">
                        <div class="w-full">
                            <p class="text-sm text-start font-bold ">Due Date</p>
                            <input required name="due" type="date" class="border border-gray-300 rounded-md p-2 w-full">
                        </div>
                        <div class="w-full">
                            <p class="text-sm text-start font-bold ">Penalty Ammount</p>
                            <input required name="penalty" type="text" class="border border-gray-300 rounded-md p-2 w-full" placeholder="0.00">
                        </div>
                    </div>
                    <p class="text-[10px] text-start">New Payment Creator: {{auth()->user()->name}}</p>
                    <button type="submit" class="w-full rounded-lg bg-purple-800 p-2 text-white">Add Payment Description</button>
                </form>
                @if ($errors->any())
                <div class="bg-red-200 text-start rounded p-2 mb-2 w-full text-xs text-red-600">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>&bull; {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @elseif(session('success'))
                <p class="bg-green-200  rounded p-2 mb-2 w-full text-xs text-green-700 ">{{session('success')}}</p>
                @endif
            </div>

        </div>

    </div>
    