<!DOCTYPE html>
<html lang="en" x-data="{ open: false }" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CCIS FMS</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Tailwind CDN -->
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
    <script src="{{ asset('js/tailwind.js') }}"></script>
    <!-- Alpine.js CDN -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <!-- Your custom CSS -->
    <!-- Include Font Awesome (if not already) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- In your <head> -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('css/hcalsb.css') }}">
</head>

<body class="h-calc bg-gray-300 text-gray-800 dark:bg-gray-900 dark:text-gray-100">
    <div class="absolute inset-0 z-0" style="background-image: url('{{ asset('sccgate.jpg') }}'); background-size: cover; background-position: center; filter: blur(8px);"></div>
    <div class="relative flex h-full z-50" style="">
        <!-- Sidebar -->
        <div @click="open = !open" :class="open ? 'block' : 'hidden'" class="absolute inset-0 z-2" style=""></div>
        <div
            :class="open ? 'translate-x-0' : '-translate-x-full'"
            class="fixed z-40 inset-y-0 left-0 w-70 bg-blue-900 transform text-white transition-transform duration-300 ease-in-out md:relative md:translate-x-0 md:block shadow-xl 
           h-screen overflow-y-auto">

            <div class="p-6 flex flex-col text-center">
                <img src="{{ asset('ccis_logo.jpg') }}" class="w-[150px] h-[150px] mx-auto rounded-full border border-white" alt="">
                <p>Welcome to Website</p>
                <h1 class="text-3xl font-bold text-center font-serif text-gray-300">CCIS FMS</h1>
            </div>

            @include('layouts.sidebar_list')
        </div>
        @if((!auth()->user()->program || !auth()->user()->student_id) && auth()->user()->role==0)
        <div class="fixed flex justify-center items-center inset-0 z-50 bg-black/40 backdrop-blur-md">
            <form action="{{route('student.impr_info')}}" method="post" class="w-[90%] md:w-[50%] bg-white rounded-lg">
                @csrf
                <div class="flex justify-between bg-gray-200 rounded-t-lg">
                    <p class="w-full p-2 text-sm">Important Info</p>
                </div>
                <div class="p-2">
                    <div class="flex space-x-4">
                        <input name="id" type="text" class="w-1/4 border rounded p-2" placeholder="Student ID">
                        <p class="w-3/4 border p-2 rounded bg-gray-50 text-gray-500">{{auth()->user()->name}}</p>
                    </div>
                    <div class="hidden">
                        <p class="text-xs px-2 pt-1 text-start font-bold ">Department</p>
                        <select name="dep" class="border border-gray-300 p-2 rounded-md  w-full"
                            onchange="window.location.href = '{{ route('admin.pos') }}' + '?department=' + this.value; loading()">
                            <option value="">---Select Department---</option>
                            @foreach($department as $dep)
                            <option value="{{ $dep->college }}"
                                {{ request('department', 'CCIS') == $dep->college ? 'selected' : '' }}>
                                {{ $dep->college }}
                            </option>
                            @endforeach

                        </select>
                    </div>
                    <div>
                        <p class="text-xs px-2 pt-1 text-start font-bold ">Programs</p>
                        <select
                            required
                            onchange=""
                            name="prog" class="border border-gray-300 p-2 rounded-md w-full">
                            <option value="">---Select Program---</option>
                            @forelse($programs as $prog)
                            <option value="{{ $prog->id }}">
                                {{ $prog->programs }}
                            </option>
                            @empty
                            <option value="">Select Department First</option>
                            @endforelse
                        </select>
                    </div>
                </div>
                @if ($errors->any())
                <div class="p-2 text-red-600 text-sm">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="text-end m-2">
                    <button class="py-2 px-4 bg-blue-400 text-white rounded">Confirm</button>
                </div>
            </form>


        </div>
        @endif

        <div id="loading" class="hidden fixed flex justify-center items-center inset-0 z-50 bg-black/40 backdrop-blur-md">
            <div class="animate-spin p-2 rounded-full bg-transparent border-4 border-t-transparent w-5 h-5">&nbsp;</div>
        </div>
        <script>
            function loading() {
                document.getElementById('loading').classList.remove("hidden");
            }
        </script>
        <div class="flex-1 flex flex-col">
            <nav class="flex items-center justify-between bg-white dark:bg-gray-800 shadow px-4 py-3">
                <div class="flex items-center  space-x-4">
                    <button @click="open = !open" class="md:hidden text-gray-600 dark:text-gray-300 focus:outline-none z-50">
                        <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <svg x-show="open" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                            viewBox="0 0 24 24" stroke="#ffffff">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                    <div>@yield('header')</div>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="hidden md:flex flex-col text-end">
                        <p class="text-sm">{{ Auth::user()->name }}</p>
                        @php
                        switch (Auth::user()->role) {
                        case 0:
                        $role = '(Student)';
                        break;
                        case 1:
                        $role = '(Admin)';
                        break;
                        case 2:
                        $role = '(Teacher)';
                        break;
                        case 3:
                        $role = '(Dean)';
                        break;
                        default:
                        $role = '(User)';
                        break;
                        }
                        @endphp
                        <p class="text-xs text-gray-400">{{ $role }}</p>
                    </div>
                    <a href="{{ route('profile') }}">
                        <svg class="w-9 h-9 hover:scale-110 transition-transform duration-200 rounded-full bg-gray-200 p-1 dark:bg-gray-700 cursor-pointer" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />
                            <circle cx="12" cy="7" r="4" />
                        </svg>
                    </a>
                </div>
            </nav>

            <main class="p-6 overflow-y-auto">
                @yield('content')

            </main>

        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

</body>

</html>