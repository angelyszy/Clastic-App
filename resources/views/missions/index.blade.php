<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mission - Clastic</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: #f0f9f7;
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding: 0;
        }

        .mission-container {
            max-width: 480px;
            margin: 0 auto;
            min-height: 100vh;
            background: white;
            padding-bottom: 100px;
        }

        /* Header */
        .mission-header {
            background: #7dd3c0;
            color: #2d3748;
            padding: 1rem 1.5rem;
            font-size: 1.5rem;
            font-weight: 600;
        }

        /* Streak Section */
        .streak-section {
            text-align: center;
            padding: 2rem 1.5rem;
            background: white;
        }

        .fire-icon {
            font-size: 5rem;
            margin: 0 auto 1.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            height: 120px;
        }

        .fire-emoji {
            font-size: 5rem;
            line-height: 1;
        }

        .week-flames {
            display: flex;
            justify-content: center;
            gap: 0.5rem;
            margin-bottom: 1.5rem;
            flex-wrap: wrap;
        }

        .day-flame {
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            font-size: 0.9rem;
            background: #e89a3c;
            border-radius: 50%;
            box-shadow: 0 2px 8px rgba(232, 154, 60, 0.3);
        }

        .streak-number {
            font-size: 2.5rem;
            font-weight: 700;
            color: #2d3748;
            margin-bottom: 0.5rem;
        }

        .streak-title {
            font-size: 1.75rem;
            font-weight: 700;
            color: #2d3748;
            margin-bottom: 0.5rem;
        }

        .streak-message {
            color: #4a5568;
            font-size: 1rem;
            line-height: 1.5;
        }

        /* Mission Section */
        .mission-content {
            padding: 1.5rem;
            background: white;
        }

        .mission-section-title {
            font-size: 1.75rem;
            font-weight: 700;
            color: #2d3748;
            margin-bottom: 1.5rem;
        }

        .mission-card {
            background: white;
            border: 3px solid #7dd3c0;
            border-radius: 24px;
            padding: 1.25rem 1.5rem;
            margin-bottom: 1rem;
            transition: all 0.3s ease;
        }

        .mission-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(125, 211, 192, 0.15);
        }

        .mission-status {
            font-size: 0.8rem;
            font-weight: 600;
            color: #718096;
            margin-bottom: 0.5rem;
            text-transform: capitalize;
        }

        .mission-title {
            font-size: 1rem;
            font-weight: 700;
            color: #2d3748;
            margin-bottom: 0.5rem;
            line-height: 1.3;
        }

        .mission-points {
            font-size: 0.95rem;
            font-weight: 600;
            color: #7dd3c0;
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
            .mission-container {
                max-width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="mission-container">
        <!-- Header -->
        <div class="mission-header">
            Mission
        </div>

        <!-- Streak Section -->
        <div class="streak-section">
            <div class="fire-icon">
                <div class="fire-emoji">🔥</div>
            </div>

            <div class="streak-number" id="streakNumber">24</div>

            <div class="week-flames">
                <div class="day-flame">M</div>
                <div class="day-flame">T</div>
                <div class="day-flame">W</div>
                <div class="day-flame">T</div>
                <div class="day-flame">F</div>
                <div class="day-flame">S</div>
                <div class="day-flame">S</div>
            </div>

            <div class="streak-title" id="streakTitle">24 Day Streak</div>
            <div class="streak-message">
                You're on fire. Keep it up<br>for the better world
            </div>
        </div>

        <!-- Mission List -->
        <div class="mission-content">
            <h2 class="mission-section-title">Mission</h2>

            <div class="mission-card">
                <div class="mission-status">Uncompleted</div>
                <div class="mission-title">Recycle 5 PET Plastic Waste</div>
                <div class="mission-points">+ 4,500 pts</div>
            </div>

            <div class="mission-card">
                <div class="mission-status">Uncompleted</div>
                <div class="mission-title">Classify 3 PP Plastic Waste</div>
                <div class="mission-points">+ 4,500 pts</div>
            </div>

            <div class="mission-card">
                <div class="mission-status">Uncompleted</div>
                <div class="mission-title">Drop off 10kg of plastic</div>
                <div class="mission-points">+ 5,000 pts</div>
            </div>
        </div>
    </div>

    <!-- Bottom Navigation -->
    <div class="bottom-nav">
        <a href="/" class="nav-item">
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
        <a href="/missions" class="nav-item active">
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
    </div>

    <script>
        // Get streak from backend - replace 24 with dynamic value
        const currentStreak = 24;
        document.getElementById('streakNumber').textContent = currentStreak;
        document.getElementById('streakTitle').textContent = currentStreak + ' Day Streak';
    </script>
</body>
</html>