@extends('layouts.app')

@section('title', 'Exchange Points - Clastic')

@section('content')
<div class="home-container">
<div class="min-h-screen bg-white pb-20">

    <!-- Header -->
    <div class="bg-gradient-to-r from-teal-500 to-teal-600 text-white px-6 py-6 shadow-lg">
        <div class="flex items-center mb-2">
            <h1 class="text-2xl font-bold">News & Articles</h1>
        </div>
        <p class="text-teal-100 text-sm">Stay updated with plastic waste issue in Indonesia</p>
    </div>

    <!-- Articles List -->
    <div class="px-6 py-6 space-y-5">
        @forelse($articles as $article)
            <a href="{{ route('articles.show', $article['id']) }}" class="block transform transition-all duration-200 hover:scale-[1.02]">
                <div class="bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300 border border-gray-100">
                    <div class="relative w-full h-32 overflow-hidden">
                        <img 
                            src="{{ $article['image'] }}" 
                            alt="{{ $article['title'] }}" 
                            class="w-full h-full object-cover"
                            style="object-position: {{ $loop->iteration == 2 ? 'center 30%' : ($loop->iteration == 4 ? 'center 20%' : 'center center') }};"
                        >
                        <div class="absolute inset-x-0 bottom-0 h-8 bg-gradient-to-b from-transparent to-white"></div>
                    </div>

                    <div class="p-4 bg-white">
                        <h3 class="font-bold text-gray-900 text-base mb-1 leading-tight line-clamp-2">
                            {{ $article['title'] }}
                        </h3>
                        <p class="text-xs text-gray-700 mb-2 line-clamp-2 leading-relaxed">
                            {{ $article['excerpt'] }}
                        </p>
                        <div class="flex items-center justify-between text-xs text-gray-500">
                            <span class="font-medium text-teal-600">By {{ $article['author'] }}</span>
                            <span class="flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                Read article
                            </span>
                        </div>
                    </div>
                </div>
            </a>
        @empty
            <div class="text-center py-12">
                <div class="bg-gray-200 border-2 border-dashed rounded-xl w-24 h-24 mx-auto mb-4"></div>
                <p class="text-gray-600 text-lg">No articles available at the moment</p>
                <p class="text-gray-500 text-sm mt-2">Please check back later!</p>
            </div>
        @endforelse
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