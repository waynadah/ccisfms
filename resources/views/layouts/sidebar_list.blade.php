<div class="flex flex-col p-2 w-full space-y-2">
    <a href="{{route('student.dashboard')}}" class="group flex items-center space-x-3 px-4 py-2 rounded-md text-gray-300 hover:bg-blue-700 hover:text-white transition-all duration-200">
        <svg class="w-5 h-5 text-gray-400 group-hover:text-white" fill="none" stroke="currentColor" stroke-width="2"
            viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
            <path d="M3 12l2-2m0 0l7-7 7 7M13 5v6h6" />
        </svg>
        <span>Dashboard </span>
    </a>
    <div class="w-full" x-data="{ openftdp: false }">
        <div @click="openftdp = !openftdp"
            class="group flex items-center space-x-3 px-4 py-2 rounded-md text-gray-300 hover:bg-blue-700 hover:text-white transition-all duration-200 cursor-pointer">
            <svg class="w-5 h-5 text-gray-400 group-hover:text-white" fill="none" stroke="currentColor" stroke-width="2"
                viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                <path d="M17 9V7a4 4 0 0 0-8 0v2H5v14h14V9z" />
                <path d="M12 13v4" />
            </svg>
            <p class="whitespace-nowrap flex items-center">
                Financial Transactions
                <span :class="openftdp ? 'rotate-90' : 'rotate-0'"
                    class="ml-2 transition-transform duration-200 transform font-bold">
                    &#8250;
                </span>
            </p>

        </div>

        <div x-show="openftdp" x-transition
            class="ml-8 mt-2 border text-xs border-blue-700 bg-blue-900 rounded-md shadow-lg text-white w-auto"
            @click.away="openftdp = false">
            <ul class=" space-y-2">
                <li>
                    <a href="{{ route('student.payment_history') }}" class="block px-2  py-2 hover:bg-blue-800 rounded">
                        &bullet; Payment History (Student)
                    </a>
                </li>
                <li>
                    <a href="#" class="block px-2  py-2 hover:bg-blue-800 rounded">
                        &bullet; Payment Record
                    </a>
                </li>
                <li>
                    <a href="#" class="block px-2  py-2 hover:bg-blue-800 rounded">
                        &bullet; Disbursement
                    </a>
                </li>
                <li>
                    <a href="#" class="block px-2  py-2 hover:bg-blue-800 rounded">
                        &bullet; Expense Tracking
                    </a>
                </li>
            </ul>
        </div>
    </div>


    <a href="#" class="group flex items-center space-x-3 px-4 py-2 rounded-md text-gray-300 hover:bg-blue-700 hover:text-white transition-all duration-200">
        <svg class="w-5 h-5 text-gray-400 group-hover:text-white" fill="none" stroke="currentColor" stroke-width="2"
            viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
            <path d="M9 12h6" />
            <path d="M12 15V9" />
            <circle cx="12" cy="12" r="10" />
        </svg>
        <span>Request Clearance</span>
    </a>
    @php
    $userId = Auth::id();
    $unread = App\Models\Notifications::where('to_user_id', auth()->user()->id)
    ->where('is_read', 1)->count();
    @endphp
    <a href="{{route('student.notification')}}" class="group flex items-center space-x-3 px-4 py-2 rounded-md text-gray-300 hover:bg-blue-700 hover:text-white transition-all duration-200">
        <svg class="w-5 h-5 text-gray-400 group-hover:text-white" fill="none" stroke="currentColor" stroke-width="2"
            viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
            <path d="M21 15a2 2 0 0 1-2 2H5l-2 2V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" />
            @if($unread != 0)
            <circle cx="18" cy="7" r="5" fill="red" />
            @endif
        </svg>
        <span>Notification ({{$unread}})</span>
    </a>


    <a href="{{ route('logout') }}" class="group flex items-center space-x-3 px-4 py-2 rounded-md text-red-400 hover:bg-red-500 hover:text-white transition-all duration-200">
        <svg class="w-5 h-5 text-red-400 group-hover:text-white" fill="none" stroke="currentColor" stroke-width="2"
            viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
            <path d="M17 16l4-4m0 0l-4-4m4 4H7" />
            <path d="M3 21V3" />
        </svg>
        <span>Logout</span>
    </a>
</div>