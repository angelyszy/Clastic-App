@extends('layouts.app')

@section('title', 'Articles - Clastic')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-teal-50 to-blue-50 pb-20">
    <!-- Header -->
    <div class="bg-gradient-to-r from-teal-500 to-teal-600 text-white px-6 py-6 shadow-lg">
        <div class="flex items-center mb-2">
            <a href="{{ route('home') }}" class="mr-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </a>
            <h1 class="text-2xl font-bold">News & Articles</h1>
        </div>
        <p class="text-teal-100 text-sm">Stay updated with plastic waste issues in Indonesia</p>
    </div>

    <!-- Articles List -->
    <div class="px-6 py-6 space-y-5">
        @forelse($articles as $article)
            <a href="{{ route('articles.show', $article['id']) }}" class="block transform transition-all duration-200 hover:scale-[1.02]">
                <div class="bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300 border border-gray-100">
                    <div class="flex">
                        <!-- Image -->
634                        <div class="w-32 h-32 flex-shrink-0">
                            <img src="{{ $article['image'] }}" 
                                 alt="{{ $article['title'] }}" 
                                 class="w-full h-full object-cover">
                        </div>

                        <!-- Content -->
                        <div class="flex-1 p-5 bg-gradient-to-br from-yellow-50 to-amber-50">
                            <h3 class="font-bold text-gray-900 text-lg mb-2 leading-tight line-clamp-2">
                                {{ $article['title'] }}
                            </h3>
                            
                            <p class="text-sm text-gray-700 mb-3 line-clamp-3 leading-relaxed">
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
    <div class="fixed bottom-0 left-0 right-0 bg-teal-600 text-white shadow-2xl">
        <div class="flex justify-around items-center py-3 px-6 max-w-md mx-auto">
            <a href="{{ route('home') }}" class="flex flex-col items-center space-y-1 opacity-60 hover:opacity-100 transition-opacity">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                <span class="text-xs">Home</span>
            </a>

            <a href="{{ route('classify') }}" class="flex flex-col items-center space-y-1 opacity-60 hover:opacity-100 transition-opacity">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h14a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5h6" />
                </svg>
                <span class="text-xs">Scan</span>
            </a>

            <a href="{{ route('pickup') }}" class="flex flex-col items-center space-y-1 opacity-60 hover:opacity-100 transition-opacity">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
                </svg>
                <span class="text-xs">Pickup</span>
            </a>

            <a href="{{ route('missions') }}" class="flex flex-col items-center space-y-1 opacity-60 hover:opacity-100 transition-opacity">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                </svg>
                <span class="text-xs">Mission</span>
            </a>

            <a href="{{ route('profile') }}" class="flex flex-col items-center space-y-1 opacity-60 hover:opacity-100 transition-opacity">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
                <span class="text-xs">Profile</span>
            </a>
        </div>
    </div>
</div>

<style>
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    .line-clamp-3 {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
</style>
@endsection