@extends('layouts.app')

@section('content')
<!-- Full page dengan background gradient yang ikut scroll -->
<div class="min-h-screen bg-gradient-to-br from-teal-100 via-teal-50 to-amber-50 pb-20">

    <!-- Container layout HP -->
    <div class="mx-auto min-h-screen bg-white px-6 py-8 shadow-lg max-w-[480px] w-full rounded-none">

        <!-- Profile Card -->
        <div class="bg-gradient-to-b from-teal-400 to-teal-500 rounded-3xl p-6 text-white shadow-lg text-center mb-8">
            <div class="w-20 h-20 rounded-full mx-auto mb-3 border-4 border-white bg-white"></div>
            <h2 class="text-xl font-bold">{{ Auth::user()->name }}</h2>
            <p class="text-sm opacity-90">{{ Auth::user()->email }}</p>
            <a href="{{ route('profile') }}" class="inline-block mt-4 bg-yellow-400 text-teal-900 font-bold px-6 py-2 rounded-full text-sm shadow">
                Points:2500
            </a>
        </div>

        <!-- Menu Container -->
        <div class="mt-8 bg-white rounded-3xl shadow-sm p-4 space-y-3 border border-gray-100">
            <a href="#" class="flex justify-between items-center bg-white rounded-xl p-4 shadow hover:bg-gray-50 transition">
                <div class="flex items-center gap-3">
                    <div class="bg-gray-100 rounded-xl w-10 h-10 flex items-center justify-center">
                        <svg class="w-6 h-6 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <span class="font-medium text-gray-800">Transaction History</span>
                </div>
                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>

            <a href="{{ url('/points/exchange') }}" class="flex justify-between items-center bg-white rounded-xl p-4 shadow hover:bg-gray-50 transition">
                <div class="flex items-center gap-3">
                    <div class="bg-gray-100 rounded-xl w-10 h-10 flex items-center justify-center">
                        <svg class="w-6 h-6 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path>
                        </svg>
                    </div>
                    <span class="font-medium text-gray-800">Points Exchange</span>
                </div>
                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>

            <a href="#" class="flex justify-between items-center bg-white rounded-xl p-4 shadow hover:bg-gray-50 transition">
                <div class="flex items-center gap-3">
                    <div class="bg-gray-100 rounded-xl w-10 h-10 flex items-center justify-center">
                        <svg class="w-6 h-6 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"></path>
                        </svg>
                    </div>
                    <span class="font-medium text-gray-800">Share</span>
                </div>
                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>

            <a href="#" class="flex justify-between items-center bg-white rounded-xl p-4 shadow hover:bg-gray-50 transition">
                <div class="flex items-center gap-3">
                    <div class="bg-gray-100 rounded-xl w-10 h-10 flex items-center justify-center">
                        <svg class="w-6 h-6 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                    </div>
                    <span class="font-medium text-gray-800">Settings</span>
                </div>
                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>
        </div>

        <!-- Logout Button -->
        <div class="mt-12 text-center pb-24">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="bg-red-500 text-white font-bold py-3 px-12 rounded-full shadow-lg hover:bg-red-600 transition w-full max-w-xs">
                    Logout
                </button>
            </form>
        </div>

        <!-- Bottom Navigation -->
<div class="bottom-nav">
    <a href="{{ route('home') }}" 
       class="nav-item {{ Request::is('/') || Request::is('home') ? 'active' : '' }}">
        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
            <path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z"/>
        </svg>
        <span>Home</span>
    </a>

    <a href="{{ route('articles.index') }}" 
       class="nav-item {{ Request::is('articles*') ? 'active' : '' }}">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h10M4 18h10" />
        </svg>
        <span>News</span>
    </a>

    <a href="{{ route('classify') }}" 
       class="nav-item {{ Request::is('classify') ? 'active' : '' }}">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <rect x="3" y="3" width="18" height="18" rx="2" stroke-width="2"/>
        </svg>
        <span>Scan</span>
    </a>

    <a href="{{ route('missions') }}" 
       class="nav-item {{ Request::is('missions') ? 'active' : '' }}">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z" stroke-width="2"/>
        </svg>
        <span>Mission</span>
    </a>

    <a href="{{ route('profile') }}" 
       class="nav-item {{ Request::is('profile') ? 'active' : '' }}">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" stroke-width="2"/>
            <circle cx="12" cy="7" r="4" stroke-width="2"/>
        </svg>
        <span>Profile</span>
    </a>
</div>

<style>
.prose { line-height: 1.8; }
.prose p { margin-bottom: 1rem; }

.home-container {
    max-width: 480px;
    margin: 0 auto;
    min-height: 100vh;
    background: white;
    padding-bottom: 100px;
}

/* BOTTOM NAVIGATION */
.bottom-nav {
    position: fixed;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    max-width: 480px;
    width: 100%;
    background: #4a9d8f;
    padding: 1rem;
    display: flex;
    justify-content: space-around;
    border-radius: 30px 30px 0 0;
    box-shadow: 0 -4px 20px rgba(0, 0, 0, 0.1);
    z-index: 100;
}

.nav-item {
    color: white;
    text-decoration: none;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 0.25rem;
    font-size: 0.75rem;
    opacity: 0.75;
    transition: all 0.25s ease;
    padding: 0.4rem 0.6rem;
    border-radius: 10px;
}

.nav-item svg {
    width: 24px;
    height: 24px;
    transition: transform 0.25s ease, color 0.25s ease;
}

.nav-item.active {
    opacity: 1;
    background: rgba(255, 255, 255, 0.25);
    backdrop-filter: blur(8px);
}

/* Hover animation */
.nav-item:hover {
    opacity: 1;
    background: rgba(255, 255, 255, 0.2);
    transform: translateY(-2px);
    box-shadow: 0 4px 10px rgba(255, 255, 255, 0.15);
}

.nav-item:hover svg {
    transform: scale(1.15);
    color: #ffeb3b;
}

@media (max-width: 480px) {
    .home-container { max-width: 100%; }
}
</style>
@endsection