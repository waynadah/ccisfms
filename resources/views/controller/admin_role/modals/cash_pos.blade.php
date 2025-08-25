<div id="modalCash" class=" fixed inset-0 z-50">
    <div onclick="window.location.href='{{ route('admin.pos') }}'" class="cursor-pointer    absolute inset-0 bg-gray-900 bg-opacity-60 backdrop-blur-sm"></div>
    <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-white rounded-xl shadow-lg z-10 text-center w-[90%] md:w-[50%]">
        <div class="flex flex-row justify-between bg-green-600 rounded-t-xl p-2 text-start text-white text-xl font-bold">
            <p>Cash Payment</p>
            <a href="{{route('admin.pos')}}" class="cursor-pointer px-2 hover:text-gray-400">&times;</a>
        </div>


        <div class="flex pt-2">
            <div class="p-2">
                <div class="bg-green-600 rounded-2xl text-white w-[200px] h-full flex items-center justify-center">
                    <p class="text-4xl font-bold "> Cash Payment</p>
                </div>
            </div>
            <div class="px-2 space-y-2 w-full">
                <form method="GET" action="{{ route('admin.pos', request()->route('id')) }}">
                    @foreach(array_merge(request()->except('student_id'), ['modal' => 2]) as $key => $value)
                    <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                    @endforeach
                    <p class="text-xs px-2 pt-1 text-start font-bold ">Student ID</p>
                    <input
                        type="text"
                        name="student_id"
                        placeholder="input Student ID"
                        value="{{ request('student_id') }}"
                        class="border border-gray-300 rounded-md p-2 w-full">
                    <p class="text-xs text-start text-gray-700">Student Name: {{DB::table('users')->where('student_id',request('student_id'))->first()->name??'not found' }}</p>
                </form>
                <div class="border rounded p-2 bg-gray-200"
                    @if(!request('student_id'))
                    style="filter: blur(8px);"
                    @endif>
                    <div class="hidden">
                        <p class="text-xs px-2 pt-1 text-start font-bold ">Department</p>
                        <select disabled class="border border-gray-300 rounded-md  w-full"
                            onchange="window.location.href = '{{ route('admin.pos', ['modal' => 2]) }}' + '?department=' + this.value">
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
                        <p class="text-xs px-2 pt-1 text-start font-bold ">Select Organization</p>
                        <select
                            class="border border-gray-300 rounded-md w-full"
                            onchange="updateUrlParam('organization', this.value)">
                            <option value="">Select Organization</option>
                            @foreach(DB::table('organization')->get() as $org)
                            <option value="{{ $org->id }}" {{ request('organization') == $org->id ? 'selected' : '' }}>
                                {{ $org->description }}
                            </option>
                            @endforeach
                        </select>

                        <script>
                            function updateUrlParam(key, value) {
                                const url = new URL(window.location.href);
                                url.searchParams.set(key, value); // ✅ replace if exists
                                url.searchParams.set('modal', 2); // (re)set modal if needed
                                window.location.href = url.toString();
                            }
                        </script>

                    </div>
                    <div>
                        <p class="text-xs px-2 pt-1 text-start font-bold ">Fee Description</p>
                        <select name="fee" class="border border-gray-300 rounded-md  w-full">
                            <option value="">Select Fee</option>
                            @forelse($payment_list as $fee)
                            <option value="{{ $fee->id }}" {{ $fee->organization_id == request('organization')? 'selected':'' }}>
                                {{ $fee->payment }}
                            </option>
                            @empty
                            <option value="">Select Department First</option>
                            @endforelse
                        </select>
                    </div>
                    <div>
                        <p class="text-xs px-2 pt-1 text-start font-bold ">Programs</p>
                        <select name="program" class="border border-gray-300 rounded-md w-full">
                            <option value="">Select Program</option>
                            @forelse($programs as $prog)
                            <option value="{{ $prog->id }}">
                                {{ $prog->programs }}
                            </option>
                            @empty
                            <option value="">Select Department First</option>
                            @endforelse
                        </select>
                    </div>

                    <div class="flex space-x-2 w-full">
                        <div class="w-full">
                            <p class="text-xs px-2 pt-1 text-start font-bold ">Cash Amount</p>
                            <input type="text" class="border border-gray-300 rounded-md p-2 w-full text-2xl font-bold">
                        </div>
                        <div class="w-full">
                            <p class="text-xs px-2 pt-1 text-start font-bold ">Cash Change</p>
                            <input readonly value="0.00" type="text" class="border bg-gray-300 text-2xl font-bold border-gray-300 rounded-md p-2 w-full">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="px-2 py-2 w-full">
            <button class="w-full bg-green-700 p-2 py-3 font-bold rounded-lg text-white">Submit Cash Payment</button>
            <a href="{{ route('admin.pos', array_merge(request()->query(), ['modal' => 1])) }}" class="text-blue-700 mb-4 text-xs  text-center">Use GCash Payment</a>
        </div>
    </div>

</div>