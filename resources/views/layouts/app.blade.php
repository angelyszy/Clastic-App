<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clastic</title>

    {{-- Load Tailwind & JS --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gradient-to-b from-[#7dd3c0] to-[#4a9d8f] min-h-screen">

    {{-- Main content wrapper --}}
    <div class="{{ request()->is('articles/*') || request()->is('points/exchange') ? 'pt-0 pb-4' : 'pt-4 pb-20' }} min-h-screen">
        @yield('content')
    </div>

    {{-- Bottom navbar (hidden in articles & exchange) --}}
    @if(!request()->is('articles/*') && !request()->is('points/exchange'))
        <div class="fixed bottom-0 left-0 right-0 bg-[#4a9d8f] p-3 rounded-t-3xl shadow-lg flex justify-around items-center z-50 max-w-[480px] mx-auto">
            <a href="{{ route('home') }}" class="flex flex-col items-center text-white {{ request()->routeIs('home') ? 'opacity-100' : 'opacity-60' }}">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z"/></svg>
                <span class="text-xs mt-1">Home</span>
            </a>

            <a href="{{ route('classify') }}" class="flex flex-col items-center text-white {{ request()->routeIs('classify') ? 'opacity-100' : 'opacity-60' }}">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                    <rect x="3" y="3" width="18" height="18" rx="2"/>
                </svg>
                <span class="text-xs mt-1">Scan</span>
            </a>

            <a href="{{ route('pickup.create') }}" class="flex flex-col items-center text-white {{ request()->routeIs('pickup.*') ? 'opacity-100' : 'opacity-60' }}">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 7h12m-4 5h4m-8 5h8m-12-5V7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-1"/>
                </svg>
                <span class="text-xs mt-1">Pickup</span>
            </a>

            <a href="{{ route('missions') }}" class="flex flex-col items-center text-white {{ request()->routeIs('missions') ? 'opacity-100' : 'opacity-60' }}">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <span class="text-xs mt-1">Mission</span>
            </a>

            <a href="{{ route('profile') }}" class="flex flex-col items-center text-white {{ request()->routeIs('profile') ? 'opacity-100' : 'opacity-60' }}">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                </svg>
                <span class="text-xs mt-1">Profile</span>
            </a>
        </div>
    @endif
</body>
</html>