@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-teal-50 to-blue-50 pb-20">
    <!-- Header -->
    <div class="bg-gradient-to-r from-teal-500 to-teal-600 text-white px-6 py-6 shadow-lg">
        <div class="flex items-center mb-2">
            <a href="{{ route('articles.index') }}" class="mr-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </a>
            <h1 class="text-2xl font-bold">Article</h1>
        </div>
    </div>

    <!-- Article Content -->
    <div class="px-6 py-6">
        <article class="bg-white rounded-2xl shadow-lg overflow-hidden">
            <img src="{{ $article['image'] }}" 
                 alt="{{ $article['title'] }}" 
                 class="w-full h-64 object-cover">

            <div class="p-6">
                <h1 class="text-2xl font-bold text-gray-900 mb-3">
                    {{ $article['title'] }}
                </h1>
                <p class="text-sm text-gray-600 mb-6">
                    By <span class="font-semibold">{{ $article['author'] }}</span>
                    <!-- You can add date later -->
                </p>

                <div class="prose prose-sm max-w-none text-gray-700 leading-relaxed whitespace-pre-line">
                    {{ $article['content'] }}
                </div>

                <div class="mt-8 pt-6 border-t border-gray-200">
                    <a href="{{ $article['url'] }}" target="_blank" class="text-teal-600 font-semibold hover:underline">
                        Read full article on original source
                    </a>
                </div>
            </div>
        </article>
    </div>

    <!-- Bottom Navigation (same as index) -->
    <div class="fixed bottom-0 left-0 right-0 bg-teal-600 text-white shadow-lg">
        <div class="flex justify-around items-center py-3 px-6 max-w-md mx-auto">
            <a href="{{ route('home') }}" class="flex flex-col items-center space-y-1 opacity-60 hover:opacity-100 transition-opacity">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                <span class="text-xs">Home</span>
            </a>
            <!-- other nav items -->
        </div>
    </div>
</div>

<style>
.prose {
    line-height: 1.8;
}
.prose p {
    margin-bottom: 1rem;
}
</style>
@endsection