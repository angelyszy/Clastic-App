@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto p-6">

    <!-- Profile Card -->
    <div class="bg-gradient-to-b from-teal-400 to-teal-500 rounded-3xl p-6 text-white shadow-lg text-center">
        <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Profile" class="w-20 h-20 rounded-full mx-auto mb-3 border-4 border-white">
        <h2 class="text-xl font-bold">{{ Auth::user()->name }}</h2>
        <p class="text-sm opacity-90">{{ Auth::user()->email }}</p>
        <a href="{{ route('points') }}" class="inline-block mt-4 bg-yellow-400 text-teal-900 font-bold px-6 py-2 rounded-full text-sm shadow">
            Points →
        </a>
    </div>

    <!-- Menu Items -->
    <div class="mt-8 space-y-3">
        <a href="#" class="flex justify-between items-center bg-white rounded-xl p-4 shadow">
            <div class="flex items-center gap-3">
                <div class="bg-gray-200 border-2 border-dashed rounded-xl w-10 h-10"></div>
                <span class="font-medium">Transaction History</span>
            </div>
            <span>→</span>
        </a>

        <a href="#" class="flex justify-between items-center bg-white rounded-xl p-4 shadow">
            <div class="flex items-center gap-3">
                <div class="bg-gray-200 border-2 border-dashed rounded-xl w-10 h-10"></div>
                <span class="font-medium">Points Exchange</span>
            </div>
            <span>→</span>
        </a>

        <a href="#" class="flex justify-between items-center bg-white rounded-xl p-4 shadow">
            <div class="flex items-center gap-3">
                <div class="bg-gray-200 border-2 border-dashed rounded-xl w-10 h-10"></div>
                <span class="font-medium">Share</span>
            </div>
            <span>→</span>
        </a>

        <a href="#" class="flex justify-between items-center bg-white rounded-xl p-4 shadow">
            <div class="flex items-center gap-3">
                <div class="bg-gray-200 border-2 border-dashed rounded-xl w-10 h-10"></div>
                <span class="font-medium">Settings</span>
            </div>
            <span>→</span>
        </a>
    </div>

    <!-- Logout Button (Red, like your third image) -->
    <div class="mt-12 text-center">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="bg-red-500 text-white font-bold py-3 px-12 rounded-full shadow-lg hover:bg-red-600 transition w-full max-w-xs">
                Logout
            </button>
        </form>
    </div>
</div>
@endsection