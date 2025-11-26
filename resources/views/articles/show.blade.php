@extends('layouts.app')

@section('content')
    <div class="home-container">

        <div class="min-h-screen bg-white">

            <!-- Header -->
            <div class="bg-gradient-to-r from-teal-500 to-teal-600 text-white px-6 py-6 shadow-lg">
                <div class="flex items-center mb-2">
                    <a href="{{ route('articles.index') }}" class="mr-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </a>
                   <h1 class="text-2xl font-bold">News & Articles</h1>
                 </div>
             <p class="text-teal-100 text-sm">Stay updated with plastic waste issue in Indonesia</p>
         </div>

            <!-- Article Content -->
            <div class="px-6 py-6">
                <article class="bg-white rounded-2xl shadow-lg overflow-hidden">

                    <!-- FOTO -->
                    <div class="w-full bg-white overflow-hidden rounded-t-2xl">
                        <img 
                            src="{{ $article['image'] }}"
                            alt="{{ $article['title'] }}"
                            class="w-full h-64 sm:h-80 md:h-96 object-cover"
                        >
                    </div>

                    <div class="p-6">
                        <h1 class="text-2xl font-bold text-gray-900 mb-3">
                            {{ $article['title'] }}
                        </h1>

                        <p class="text-sm text-gray-600 mb-6">
                            By <span class="font-semibold">{{ $article['author'] }}</span>
                        </p>

                        <div class="prose prose-sm max-w-none text-gray-700 leading-relaxed whitespace-pre-line">
                            {{ $article['content'] }}
                        </div>

                        @if(!empty($article['url']))
                        <div class="mt-8 pt-6 border-t border-gray-200">
                            <a href="{{ $article['url'] }}" 
                               target="_blank" 
                               class="text-teal-600 font-semibold hover:underline">
                                Read full article on original source
                            </a>
                        </div>
                        @endif

                    </div>
                </article>
            </div>

            {{-- KITA HAPUS TOTAL BOTTOM NAV DARI BLADE (biar nggak muncul sama sekali) --}}
            {{-- Jadi nggak perlu lagi takut ke-detect JS/CSS --}}

        </div>
    </div>

    <style>
        .prose { line-height: 1.8; }
        .prose p { margin-bottom: 1rem; }

        .home-container {
            max-width: 480px;
            margin: 0 auto;
            min-height: 100vh;
            background: white;
            /* padding-bottom dihilangkan karena navbar udah ga ada */
        }

        @media (max-width: 480px) {
            .home-container { max-width: 100%; }
        }
    </style>
@endsection