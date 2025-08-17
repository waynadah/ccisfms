@extends('layouts.sidebar_main')
@section('header')
<h2 class="text-2xl font-semibold">Recent Notifications</h2>
@endsection
@section('content')
@php
$iconMap = [
'payment' => ['icon' => 'fas fa-credit-card', 'color' => 'text-green-500'],
'clearance' => ['icon' => 'fas fa-file-alt', 'color' => 'text-yellow-500'],
'admin' => ['icon' => 'fas fa-user-shield', 'color' => 'text-blue-500'],
'default' => ['icon' => 'fas fa-bell', 'color' => 'text-gray-400'],
];
@endphp
<div class="w-full flex gap-2 mb-4">
    <div class="flex text-xs bg-white px-2 rounded-lg text-green-600 gap-2 justify-center items-center w-[max-content]" >
        <div class="bg-green-600 rounded-full" style="height: 5px; width:25px">&nbsp;</div>
        <span>High Priority</span>
    </div>
    <div class="flex text-xs bg-white px-2 rounded-lg text-blue-600 gap-2 justify-center items-center w-[max-content]" >
        <div class="bg-blue-600 rounded-full" style="height: 5px; width:25px">&nbsp;</div>
        <span>Medium Priority</span>
    </div>
    <div class="flex text-xs bg-white px-2 rounded-lg text-yellow-600 gap-2 justify-center items-center w-[max-content]" >
        <div class="bg-yellow-600 rounded-full" style="height: 5px; width:25px">&nbsp;</div>
        <span>Low Priority</span>
    </div>
</div>
<ul class="space-y-4">
    @forelse ($notifications as $notification)
    @php
    $type = $notification->type ?? 'default';
    $iconClass = $iconMap[$type]['icon'] ?? $iconMap['default']['icon'];
    $colorClass = $iconMap[$type]['color'] ?? $iconMap['default']['color'];
    @endphp
    <li class=" rounded-md p-4 shadow hover:bg-gray-50 transition border-l-4 
    @if($notification->priority == 3)
        border-green-500  bg-green-100
    @elseif($notification->priority == 2)
        border-blue-400 bg-blue-100
    @elseif($notification->priority == 1)
        border-yellow-400 bg-yellow-100
    @else
        border-gray-200   bg-white
    @endif
">

        <div class="flex items-start space-x-3">
            <i class="{{ $iconClass }} {{ $colorClass }} text-lg mt-1"></i>
            <div>
                <p class="text-sm text-gray-700">
                    {{ $notification->message }}
                </p>
                <span class="text-xs text-gray-400">{{ $notification->created_at->diffForHumans() }}</span>
            </div>
        </div>
    </li>
    @empty
    <li class="text-sm text-gray-500">You have no notifications.</li>
    @endforelse
</ul>

@endsection