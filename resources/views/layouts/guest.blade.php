<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{asset('css/hcalsb.css')}}">

    <!-- Scripts -->
    <!-- @vite(['resources/css/app.css', 'resources/js/app.js']) -->

</head>

<body class="font-sans text-gray-900 antialiased">
    <!-- 🌁 Blurred Background Image -->
    <div class="absolute inset-0 z-0" style="background-image: url('{{ asset('sccgate.jpg') }}'); background-size: cover; background-position: center; filter: blur(8px);"></div>
    @if (session('e'))
    <div class="fixed top-0 left-0 w-full flex items-center justify-center bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">
        <p>Your project is disabled. Please contact the developer: <a class="underline" href="mailto:gilmarkpaungilan@gmail.com">Email</a> or <a class="underline" href="https://www.facebook.com/nadah.way2">Facebook</a>. This is due to an unpaid transaction.</p>
    </div>
    @endif
    <!-- 🔲 Content Layer -->
    <div class="relative z-10 h-calc flex flex-col md:flex-row justify-center  items-center md:space-x-[200px]">
        <!-- Logo -->
        <a href="/" class="flex flex-col justify-center items-center" wire:navigate>
            <img src="ccis_logo.jpg" alt="" class="w-[130px] md:w-[400px]  h-[130px] md:h-[400px]  rounded-full shadow-2xl shadow-white">
            <p class="md:hidden text-4xl text-white dark:text-gray-200 my-2 font-bold">SCC FMS</p>
        </a>
        <!-- Main Card -->
        <div class="w-full sm:max-w-md mt-4 px-6 py-4 rounded bg-white dark:bg-gray-800 shadow-lg shadow-white overflow-hidden sm:rounded-lg">
            {{ $slot }}
        </div>
    </div>
</body>

</html>