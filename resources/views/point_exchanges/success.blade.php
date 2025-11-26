@extends('layouts.app')

@section('content')
<style>
    .fixed, [class*="bottom-"], [class*="nav"] { display: none !important; }
    body { background: linear-gradient(to bottom, #7dd3c0, #4a9d8f) !important; min-height: 100vh; }
    .wrapper { max-width: 480px; margin: 0 auto; background: white; min-height: 100vh; }

    .checkmark {
        width: 80px; height: 80px; background: #14b8a6; border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        margin: 1.5rem auto .75rem; box-shadow: 0 6px 18px rgba(20,184,166,.35);
    }
    .checkmark svg { width: 44px; height: 44px; color: #fff; stroke-width: 4; }

    .info-box {
        background: #f8fafc; border-radius: 20px; padding: 1.25rem 1.5rem;
        border: 1px solid #e2e8f0; margin: 0 1rem 1.5rem; box-shadow: 0 2px 6px rgba(0,0,0,.05);
    }
    .info-row { display: flex; justify-content: space-between; padding: .75rem 0; border-bottom: 1px solid #e2e8f0; font-size: .9rem; }
    .info-row:last-child { border-bottom: 0; }
    .info-label { color: #64748b; }
    .info-value { color: #1e293b; font-weight: 600; text-align: right; }
</style>

<div class="wrapper">
 <!-- Header -->
<div class="bg-gradient-to-r from-teal-500 to-teal-600 text-white px-6 py-6 shadow-lg">
    <div class="flex items-center mb-2">
        <h1 class="text-2xl font-bold">Detail Exchange</h1>
    </div>
    <p class="text-teal-100 text-sm">Summary of your successful transaction</p>
</div>

    <!-- Content -->
    <div class="px-6 pt-4 pb-6">

        <!-- Check -->
        <div class="text-center">
            <div class="checkmark">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
            </div>
            <h2 class="text-2xl font-bold text-teal-600 mt-3 mb-1">Payment Made</h2>
            <p class="text-sm text-gray-600 mb-6">Your exchange has been processed successfully</p>
        </div>

        <!-- Info -->
        <h3 class="text-center text-gray-800 font-semibold mb-4 text-lg">Information</h3>
        <div class="info-box">
            <!-- 1) Amount Received -->
            <div class="info-row">
                <span class="info-label">Amount Received:</span>
                <span class="info-value text-teal-600" id="amountReceived">Rp 0</span>
            </div>

            <!-- 2) Receiver -->
            <div class="info-row">
                <span class="info-label">Receiver:</span>
                <span class="info-value" id="receiverName">{{ Auth::user()->name }}</span>
            </div>

            <!-- 3) Code Payment -->
            <div class="info-row">
                <span class="info-label">Code Payment:</span>
                <span class="info-value" id="paymentMethod">-</span>
            </div>

            <div class="info-row">
                <span class="info-label">Location:</span>
                <span class="info-value">Blitar, East Java</span>
            </div>
            <div class="info-row">
                <span class="info-label">Date:</span>
                <span class="info-value" id="transactionDate">--/--/----</span>
            </div>
        </div>

        <!-- Back -->
        <div class="text-center mt-3 mb-4">
            <a href="{{ route('home') }}" class="inline-block bg-yellow-400 text-teal-900 font-bold px-6 py-2 rounded-full text-sm shadow hover:bg-yellow-300 transition">
                Back to Home
            </a>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    // Ambil data dari sessionStorage (sesuai dengan exchange.blade)
    const method = sessionStorage.getItem('withdrawMethod') || '-';
    const points = parseInt(sessionStorage.getItem('withdrawPoints')) || 0;

    // Hitung amount sesuai 1 poin = Rp100
    const amount = points * 100;
    const formattedAmount = 'Rp ' + amount.toLocaleString('id-ID');

    // Set tampilan
    document.getElementById('paymentMethod').textContent = method;
    document.getElementById('amountReceived').textContent = formattedAmount;

    // Format tanggal
    const date = new Date().toLocaleDateString('id-ID', { day:'2-digit', month:'2-digit', year:'numeric' });
    document.getElementById('transactionDate').textContent = date;
});
</script>
@endsection