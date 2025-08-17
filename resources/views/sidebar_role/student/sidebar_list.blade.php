<div class="flex flex-col p-4 space-y-2">
    <a href="{{route('student.dashboard')}}" class="group flex items-center space-x-3 px-4 py-2 rounded-md text-gray-300 hover:bg-blue-700 hover:text-white transition-all duration-200">
        <svg class="w-5 h-5 text-gray-400 group-hover:text-white" fill="none" stroke="currentColor" stroke-width="2"
            viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
            <path d="M3 12l2-2m0 0l7-7 7 7M13 5v6h6" />
        </svg>
        <span>Dashboard </span>
    </a>


    <a href="{{route('student.payment_history')}}" class="group flex items-center space-x-3 px-4 py-2 rounded-md text-gray-300 hover:bg-blue-700 hover:text-white transition-all duration-200">
        <svg class="w-5 h-5 text-gray-400 group-hover:text-white" fill="none" stroke="currentColor" stroke-width="2"
            viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
            <path d="M17 9V7a4 4 0 0 0-8 0v2H5v14h14V9z" />
            <path d="M12 13v4" />
        </svg>
        <span>Payment History</span>
    </a>

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