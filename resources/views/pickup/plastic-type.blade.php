@extends('layouts.app')

@section('content')
<style>
    /* Hilangkan navbar + padding bawah */
    .fixed, [class*="bottom"], [class*="nav"] { display: none !important; }
    body { padding-bottom: 0 !important; }

    /* Background tetap hijau-biru sampai bawah */
    body::before {
        content: "";
        position: fixed;
        top: 0; left: 0; right: 0; bottom: 0;
        background: linear-gradient(to bottom, #7dd3c0, #4a9d8f);
        z-index: -2;
    }

    /* Konten utama */
    .schedule-container {
        max-width: 480px;
        margin: 0 auto;
        min-height: 100vh;
        background: white;
        position: relative;
        z-index: 1;
    }

    /* Body umum */
    body {
        background: #f0f9f7;
        min-height: 100vh;
        margin: 0;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    /* Header sama kayak style Clastic-App */
    .schedule-header {
        background: linear-gradient(to right, #14b8a6, #0d9488);
        color: white;
        padding: 1.5rem;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }

    .schedule-header .flex {
        display: flex;
        align-items: center;
        margin-bottom: 0.5rem;
    }

    .schedule-header a {
        margin-right: 0.75rem;
        color: white;
        text-decoration: none;
    }

    .schedule-header svg {
        width: 24px;
        height: 24px;
    }

    .schedule-header h1 {
        font-size: 1.5rem;
        font-weight: 700;
    }

    .schedule-header p {
        color: #ccfbf1;
        font-size: 0.875rem;
    }

    /* Konten */
    .schedule-content {
        padding: 2rem 1.5rem;
    }

    .section-title {
        font-size: 1.25rem;
        font-weight: 600;
        color: #2d3748;
        margin-bottom: 0.5rem;
    }

    .section-subtitle {
        color: #7dd3c0;
        font-size: 0.9rem;
        margin-bottom: 1.5rem;
    }

    /* Box jadwal */
    .schedule-box {
        background: white;
        border: 2px solid #e2e8f0;
        border-radius: 16px;
        padding: 1.5rem;
        margin-bottom: 2rem;
    }

    .schedule-grid {
        display: grid;
        grid-template-columns: auto 1fr auto;
        gap: 1rem;
        align-items: center;
    }

    .day-label { font-weight: 600; color: #2d3748; }
    .time-slots { display: flex; flex-direction: column; gap: 0.5rem; }
    .time-slot { display: flex; align-items: center; gap: 0.5rem; }
    .time-slot input[type="radio"] {
        width: 18px; height: 18px; accent-color: #14b8a6; cursor: pointer;
    }
    .time-slot label { cursor: pointer; color: #4a5568; font-size: 0.95rem; }
    .day-code { font-weight: 600; color: #7dd3c0; font-size: 0.9rem; }

    /* Tombol confirm warna sama seperti header */
    .confirm-btn {
        width: 100%;
        background: linear-gradient(to right, #14b8a6, #0d9488);
        color: white;
        border: none;
        padding: 1rem;
        border-radius: 12px;
        font-size: 1rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s;
        margin-top: 2rem;
    }

    .confirm-btn:hover { opacity: 0.9; transform: translateY(-2px); }
    .confirm-btn:disabled { background: #99f6e4; cursor: not-allowed; }

    @media (max-width: 480px) {
        .schedule-container { max-width: 100%; }
    }
</style>

<div class="schedule-container">

    <!-- Header -->
    <div class="schedule-header">
        <div class="flex items-center mb-2">
            <a href="javascript:history.back()" class="mr-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </a>
            <h1 class="text-2xl font-bold">Order</h1>
        </div>
        <p class="text-teal-100 text-sm">Determine your pickup schedule</p>
    </div>

    <!-- Konten -->
    <div class="schedule-content">
        <h2 class="section-title">Schedule</h2>
        <p class="section-subtitle">Choose your preferred time for collection</p>

        <div class="schedule-box">
            <div class="schedule-grid">
                <div class="day-label">Today</div>
                <div class="time-slots">
                    <div class="time-slot">
                        <input type="radio" id="time1" name="schedule" value="08:00-10:00">
                        <label for="time1">08:00 - 10:00</label>
                    </div>
                    <div class="time-slot">
                        <input type="radio" id="time2" name="schedule" value="12:00-14:00">
                        <label for="time2">12:00 - 14:00</label>
                    </div>
                    <div class="time-slot">
                        <input type="radio" id="time3" name="schedule" value="16:00-20:00">
                        <label for="time3">16:00 - 20:00</label>
                    </div>
                </div>
                <div class="day-code">WIB</div>
            </div>
        </div>

        <button class="confirm-btn" id="confirmBtn" disabled>Confirm</button>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const radios = document.querySelectorAll('input[name="schedule"]');
        const confirmBtn = document.getElementById('confirmBtn');

        radios.forEach(radio => {
            radio.addEventListener('change', () => confirmBtn.disabled = false);
        });

        confirmBtn.addEventListener('click', function() {
            const selected = document.querySelector('input[name="schedule"]:checked');
            if (selected) {
                sessionStorage.setItem('pickupSchedule', selected.value);
                window.location.href = '/pickup/plastic-type';
            }
        });
    });
</script>
@endsection