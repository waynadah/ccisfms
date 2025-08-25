<div class="flex flex-col p-2 w-full space-y-2 text-sm">
    <a href="{{route('student.dashboard')}}" class="group flex items-center space-x-3 px-4 py-2 rounded-md text-gray-300 hover:bg-blue-700 hover:text-white transition-all duration-200">
        <svg class="w-5 h-5 text-gray-400 group-hover:text-white" fill="none" stroke="currentColor" stroke-width="2"
            viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
            <path d="M3 12l2-2m0 0l7-7 7 7M13 5v6h6" />
        </svg>
        <span>Dashboard </span>
    </a>
    @if (Auth::user()->role != 0)
    <a href="{{route('admin.pos')}}" class="group flex items-center space-x-3 px-4 py-2 rounded-md text-gray-300 hover:bg-blue-700 hover:text-white transition-all duration-200">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" id="Point-Of-Sale--Streamline-Outlined-Material" height="17" width="17">
            <path fill="currentColor" d="M6.5 8.25c-0.4125 0 -0.7656 -0.1469 -1.05925 -0.44075C5.1469 7.5156 5 7.1625 5 6.75V3.5c0 -0.4125 0.1469 -0.765665 0.44075 -1.0595C5.7344 2.146835 6.0875 2 6.5 2h11c0.4125 0 0.76565 0.146835 1.0595 0.4405C18.85315 2.734335 19 3.0875 19 3.5v3.25c0 0.4125 -0.14685 0.7656 -0.4405 1.05925 -0.29385 0.29385 -0.647 0.44075 -1.0595 0.44075H6.5Zm0 -1.5h11V3.5H6.5v3.25ZM3.5 22c-0.4125 0 -0.765585 -0.1469 -1.05925 -0.44075C2.146915 21.2656 2 20.9125 2 20.5v-1.75h20V20.5c0 0.4125 -0.14685 0.7656 -0.4405 1.05925C21.26565 21.8531 20.9125 22 20.5 22H3.5Zm-1.5 -4 3.625 -8.1c0.13335 -0.26665 0.32165 -0.48335 0.565 -0.65 0.2435 -0.16665 0.50515 -0.25 0.785 -0.25h10.05c0.27985 0 0.5415 0.08335 0.785 0.25 0.24335 0.16665 0.43165 0.38335 0.565 0.65L22 18H2Zm6.5 -2h1c0.13335 0 0.25 -0.05 0.35 -0.15 0.1 -0.1 0.15 -0.21665 0.15 -0.35 0 -0.13335 -0.05 -0.25 -0.15 -0.35 -0.1 -0.1 -0.21665 -0.15 -0.35 -0.15h-1c-0.13335 0 -0.25 0.05 -0.35 0.15 -0.1 0.1 -0.15 0.21665 -0.15 0.35 0 0.13335 0.05 0.25 0.15 0.35 0.1 0.1 0.21665 0.15 0.35 0.15Zm0 -2h1c0.13335 0 0.25 -0.05 0.35 -0.15 0.1 -0.1 0.15 -0.21665 0.15 -0.35 0 -0.13335 -0.05 -0.25 -0.15 -0.35 -0.1 -0.1 -0.21665 -0.15 -0.35 -0.15h-1c-0.13335 0 -0.25 0.05 -0.35 0.15 -0.1 0.1 -0.15 0.21665 -0.15 0.35 0 0.13335 0.05 0.25 0.15 0.35 0.1 0.1 0.21665 0.15 0.35 0.15Zm0 -2h1c0.13335 0 0.25 -0.05 0.35 -0.15 0.1 -0.1 0.15 -0.21665 0.15 -0.35 0 -0.13335 -0.05 -0.25 -0.15 -0.35 -0.1 -0.1 -0.21665 -0.15 -0.35 -0.15h-1c-0.13335 0 -0.25 0.05 -0.35 0.15 -0.1 0.1 -0.15 0.21665 -0.15 0.35 0 0.13335 0.05 0.25 0.15 0.35 0.1 0.1 0.21665 0.15 0.35 0.15Zm3 4h1c0.13335 0 0.25 -0.05 0.35 -0.15 0.1 -0.1 0.15 -0.21665 0.15 -0.35 0 -0.13335 -0.05 -0.25 -0.15 -0.35 -0.1 -0.1 -0.21665 -0.15 -0.35 -0.15h-1c-0.13335 0 -0.25 0.05 -0.35 0.15 -0.1 0.1 -0.15 0.21665 -0.15 0.35 0 0.13335 0.05 0.25 0.15 0.35 0.1 0.1 0.21665 0.15 0.35 0.15Zm0 -2h1c0.13335 0 0.25 -0.05 0.35 -0.15 0.1 -0.1 0.15 -0.21665 0.15 -0.35 0 -0.13335 -0.05 -0.25 -0.15 -0.35 -0.1 -0.1 -0.21665 -0.15 -0.35 -0.15h-1c-0.13335 0 -0.25 0.05 -0.35 0.15 -0.1 0.1 -0.15 0.21665 -0.15 0.35 0 0.13335 0.05 0.25 0.15 0.35 0.1 0.1 0.21665 0.15 0.35 0.15Zm0 -2h1c0.13335 0 0.25 -0.05 0.35 -0.15 0.1 -0.1 0.15 -0.21665 0.15 -0.35 0 -0.13335 -0.05 -0.25 -0.15 -0.35 -0.1 -0.1 -0.21665 -0.15 -0.35 -0.15h-1c-0.13335 0 -0.25 0.05 -0.35 0.15 -0.1 0.1 -0.15 0.21665 -0.15 0.35 0 0.13335 0.05 0.25 0.15 0.35 0.1 0.1 0.21665 0.15 0.35 0.15Zm3 4h1c0.13335 0 0.25 -0.05 0.35 -0.15 0.1 -0.1 0.15 -0.21665 0.15 -0.35 0 -0.13335 -0.05 -0.25 -0.15 -0.35 -0.1 -0.1 -0.21665 -0.15 -0.35 -0.15h-1c-0.13335 0 -0.25 0.05 -0.35 0.15 -0.1 0.1 -0.15 0.21665 -0.15 0.35 0 0.13335 0.05 0.25 0.15 0.35 0.1 0.1 0.21665 0.15 0.35 0.15Zm0 -2h1c0.13335 0 0.25 -0.05 0.35 -0.15 0.1 -0.1 0.15 -0.21665 0.15 -0.35 0 -0.13335 -0.05 -0.25 -0.15 -0.35 -0.1 -0.1 -0.21665 -0.15 -0.35 -0.15h-1c-0.13335 0 -0.25 0.05 -0.35 0.15 -0.1 0.1 -0.15 0.21665 -0.15 0.35 0 0.13335 0.05 0.25 0.15 0.35 0.1 0.1 0.21665 0.15 0.35 0.15Zm0 -2h1c0.13335 0 0.25 -0.05 0.35 -0.15 0.1 -0.1 0.15 -0.21665 0.15 -0.35 0 -0.13335 -0.05 -0.25 -0.15 -0.35 -0.1 -0.1 -0.21665 -0.15 -0.35 -0.15h-1c-0.13335 0 -0.25 0.05 -0.35 0.15 -0.1 0.1 -0.15 0.21665 -0.15 0.35 0 0.13335 0.05 0.25 0.15 0.35 0.1 0.1 0.21665 0.15 0.35 0.15Z" stroke-width="0.5"></path>
        </svg>
        <span>Manage Payments</span>
    </a>
    @endif

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
                        &bullet; Payment History
                    </a>
                </li>
                <li>
                    <a href="#" class="block px-2  py-2 hover:bg-blue-800 rounded">
                        &bullet; Disbursement
                    </a>
                </li>
                <li>
                    <a href="#" class="block px-2  py-2 hover:bg-blue-800 rounded">
                        &bullet; Track Expenses
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