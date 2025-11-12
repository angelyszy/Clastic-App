@extends('layouts.app')

@section('content')
<style>
    body {
        background: linear-gradient(180deg, #7dd3c0 0%, #4a9d8f 100%);
        min-height: 100vh;
        margin: 0;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .home-container {
        max-width: 480px;
        margin: 0 auto;
        padding: 0;
        min-height: 100vh;
        background: linear-gradient(180deg, #7dd3c0 0%, #f0f9f7 40%);
    }

    /* Welcome Card */
    .welcome-card {
        background: linear-gradient(135deg, #5eb3a6 0%, #4a9d8f 100%);
        border-radius: 0 0 30px 30px;
        padding: 2rem 1.5rem;
        color: white;
        margin-bottom: 1.5rem;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
    }

    .profile-section {
        display: flex;
        align-items: center;
        gap: 1rem;
        margin-bottom: 1.5rem;
    }

    .profile-pic {
        width: 70px;
        height: 70px;
        border-radius: 12px;
        background: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .profile-info h2 {
        margin: 0;
        font-size: 1.5rem;
        font-weight: 600;
    }

    .profile-info h2 span {
        color: #ffd166;
    }

    .points-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        background: white;
        color: #4a9d8f;
        padding: 0.5rem 1.25rem;
        border-radius: 20px;
        font-weight: 700;
        font-size: 1.1rem;
        margin-top: 0.5rem;
    }

    .mission-text {
        font-size: 0.95rem;
        opacity: 0.95;
        margin-top: 0.75rem;
    }

    /* Streak Calendar */
    .streak-calendar {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        gap: 0.5rem;
        margin-top: 1rem;
    }

    .day-box {
        background: rgba(255, 255, 255, 0.3);
        border-radius: 12px;
        padding: 0.75rem 0.5rem;
        text-align: center;
        font-size: 0.85rem;
        font-weight: 600;
    }

    .day-box.active {
        background: #ffd166;
        color: #2d3748;
    }

    .day-box .day-name {
        font-size: 0.75rem;
        margin-bottom: 0.25rem;
    }

    /* Content Section */
    .content-section {
        padding: 0 1.5rem 2rem;
    }

    /* Fun Fact */
    .fun-fact {
        background: white;
        border: 2px solid #ffd166;
        border-radius: 20px;
        padding: 1.25rem;
        margin-bottom: 1.5rem;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    }

    .fun-fact h3 {
        margin: 0 0 0.5rem 0;
        font-size: 1.1rem;
        color: #2d3748;
    }

    .fun-fact p {
        margin: 0;
        color: #4a5568;
        font-size: 0.9rem;
        line-height: 1.5;
    }

    /* Call to Action */
    .cta-section {
        margin-bottom: 1.5rem;
    }

    .cta-section h2 {
        font-size: 1.5rem;
        color: #2d3748;
        margin-bottom: 0.5rem;
    }

    .cta-section p {
        color: #4a5568;
        margin-bottom: 1rem;
        font-size: 0.95rem;
    }

    /* Map */
    .map-container {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        margin-bottom: 1.5rem;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
        height: 250px;
    }

    #map {
        width: 100%;
        height: 100%;
    }

    /* Action Buttons */
    .action-buttons {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1rem;
        margin-bottom: 1.5rem;
    }

    .action-btn {
        background: white;
        border: 2px solid #e2e8f0;
        border-radius: 20px;
        padding: 1.25rem;
        text-align: center;
        text-decoration: none;
        color: #2d3748;
        font-weight: 600;
        transition: all 0.3s ease;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
    }

    .action-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        border-color: #4a9d8f;
    }

    .action-btn.pickup {
        background: #4a9d8f;
        color: white;
        border-color: #4a9d8f;
    }

    .action-btn.dropoff {
        background: #e8f8f5;
        color: #4a9d8f;
        border-color: #4a9d8f;
    }

    .action-btn .emoji {
        font-size: 1.5rem;
        margin-bottom: 0.5rem;
    }

    /* News Section */
    .news-section {
        margin-bottom: 2rem;
    }

    .news-section h3 {
        font-size: 1.3rem;
        color: #2d3748;
        margin-bottom: 1rem;
    }

    .news-card {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
    }

    .news-image {
        width: 100%;
        height: 200px;
        background: linear-gradient(135deg, #5eb3a6 0%, #7dd3c0 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 4rem;
    }

    .news-content {
        padding: 1.25rem;
        background: #4a9d8f;
        color: white;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .news-content span {
        font-weight: 600;
    }

    /* Bottom Navigation */
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
    }

    .nav-item {
        color: white;
        text-decoration: none;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 0.25rem;
        font-size: 0.75rem;
        opacity: 0.7;
        transition: opacity 0.3s;
    }

    .nav-item.active {
        opacity: 1;
    }

    .nav-item svg {
        width: 24px;
        height: 24px;
    }

    @media (max-width: 480px) {
        .home-container {
            max-width: 100%;
        }
    }
</style>

<div class="home-container">
    <!-- Welcome Card -->
    <div class="welcome-card">
        <div class="profile-section">
            <div class="profile-pic">
                👤
            </div>
            <div class="profile-info">
                <h2>Hi, <span>{{ explode(' ', Auth::user()->name)[0] }}</span>!</h2>
                <div class="points-badge">
                    <span>{{ number_format($totalPoints) }}</span>
                    <span style="font-size: 0.9rem;">PTS</span>
                </div>
            </div>
        </div>

        <p class="mission-text">Want to get more points? Complete your mission and streak!</p>

        <!-- Streak Calendar -->
        <div class="streak-calendar">
            @for($i = 6; $i >= 0; $i--)
                @php $date = now()->subDays($i); @endphp
                <div class="day-box {{ $date->isToday() ? 'active' : '' }}">
                    <div class="day-name">{{ $date->format('D') }}</div>
                    <div>{{ $date->format('d') }}</div>
                </div>
            @endfor
        </div>
    </div>

    <div class="content-section">
        <!-- Fun Fact -->
        <div class="fun-fact">
            <h3>Today's Fun Fact! 🤓</h3>
            <p>{{ $todaysFunFact }}</p>
        </div>

        <!-- Call to Action -->
        <div class="cta-section">
            <h2>Let's Recycle Now! ♻️</h2>
            <p>Your contribution means a lot to the world</p>
        </div>

        <!-- Map -->
        <div class="map-container">
            <div id="map"></div>
        </div>

        <!-- Action Buttons -->
        <div class="action-buttons">
            <a href="{{ route('pickup.create') }}" class="action-btn pickup">
                <div class="emoji">🚚</div>
                <div>Pick-Up</div>
            </a>
            <a href="/dropoff" class="action-btn dropoff">
                <div class="emoji">📍</div>
                <div>Drop-Off Point</div>
            </a>
        </div>

        <!-- News Section -->
        <div class="news-section">
            <h3>News & Article 📚</h3>
            <a href="/articles" style="text-decoration: none;">
                <div class="news-card">
                    <div class="news-image">
                        ♻️
                    </div>
                    <div class="news-content">
                        <span>Increase your insight here</span>
                        <span>→</span>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>

<!-- Bottom Navigation
<div class="bottom-nav">
    <a href="/" class="nav-item active">
        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
            <path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z"/>
        </svg>
        <span>Home</span>
    </a>
    <a href="/classify" class="nav-item">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <rect x="3" y="3" width="18" height="18" rx="2" stroke-width="2"/>
        </svg>
        <span>Scan</span>
    </a>
    <a href="/pickup" class="nav-item">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <circle cx="12" cy="12" r="10" stroke-width="2"/>
            <path d="M12 6v6l4 2" stroke-width="2"/>
        </svg>
        <span>Pickup</span>
    </a>
    <a href="/missions" class="nav-item">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z" stroke-width="2"/>
        </svg>
        <span>Mission</span>
    </a>
    <a href="/profile" class="nav-item">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" stroke-width="2"/>
            <circle cx="12" cy="7" r="4" stroke-width="2"/>
        </svg>
        <span>Profile</span>
    </a>
</div> -->

<!-- Leaflet Map -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Use Surabaya coordinates since user is from Surabaya
        const map = L.map('map').setView([-7.2575, 112.7521], 13);
        
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);
        
        // Add a marker for Clastic drop point
        L.marker([-7.2575, 112.7521]).addTo(map)
            .bindPopup('Clastic Drop Point - Surabaya')
            .openPopup();
    });
</script>
@endsection