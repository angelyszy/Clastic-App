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

        .missions-container {
            max-width: 480px;
            margin: 0 auto;
            min-height: 100vh;
            background: white;
            padding-bottom: 100px;
        }

        /* Header */
        .header {
            background: #7dd3c0;
            padding: 1rem 1.5rem;
            color: #2d3748;
            font-size: 1.25rem;
            font-weight: 600;
        }

        /* Content */
        .content {
            padding: 2rem 1.5rem;
        }

        /* Streak Banner */
        .streak-banner {
            text-align: center;
            margin-bottom: 2.5rem;
        }

        .streak-banner h1 {
            font-size: 1.25rem;
            color: #2d3748;
            margin: 0 0 0.5rem 0;
            font-weight: 500;
        }

        .streak-banner .streak-number {
            font-size: 2.5rem;
            font-weight: 700;
            color: #4a9d8f;
        }

        .streak-banner h2 {
            font-size: 1.1rem;
            color: #2d3748;
            margin: 1rem 0 0 0;
            font-weight: 600;
        }

        /* Calendar Section */
        .calendar-section {
            background: white;
            border: 2px solid #e2e8f0;
            border-radius: 20px;
            padding: 1.25rem;
            margin-bottom: 2.5rem;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .calendar-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .calendar-header h3 {
            font-size: 1.1rem;
            color: #2d3748;
            margin: 0;
            font-weight: 600;
        }

        .calendar-nav {
            display: flex;
            gap: 0.75rem;
            align-items: center;
        }

        .calendar-nav button {
            background: none;
            border: none;
            font-size: 1.2rem;
            color: #4a9d8f;
            cursor: pointer;
            padding: 0.25rem 0.5rem;
            transition: color 0.3s;
        }

        .calendar-nav button:hover {
            color: #7dd3c0;
        }

        #currentMonth {
            font-size: 0.95rem;
            color: #2d3748;
            font-weight: 600;
            min-width: 110px;
            text-align: center;
        }

        /* Calendar Grid */
        .calendar-wrapper {
            width: 100%;
        }

        .calendar-weekdays {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 0.4rem;
            margin-bottom: 0.8rem;
            width: 100%;
        }

        .weekday {
            text-align: center;
            font-size: 0.75rem;
            font-weight: 600;
            color: #4a5568;
            padding: 0.5rem 0;
            aspect-ratio: 1;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .calendar-days {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 0.4rem;
            width: 100%;
        }

        .calendar-day {
            aspect-ratio: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            font-size: 0.9rem;
            font-weight: 600;
            position: relative;
            padding: 0.25rem;
            min-height: 50px;
        }

        .calendar-day .date {
            color: #2d3748;
            font-size: 0.8rem;
            margin-bottom: 0.2rem;
        }

        .calendar-day .emoji {
            font-size: 1.3rem;
            line-height: 1;
        }

        .calendar-day.empty {
            background: transparent;
        }

        .calendar-day.completed {
            background: #fef3c7;
        }

        .calendar-day.future {
            background: transparent;
        }

        .calendar-day.future .date {
            color: #cbd5e0;
        }

        .calendar-day.today {
            background: #1e293b;
            border-radius: 50%;
        }

        .calendar-day.today .date {
            color: white;
        }

        .calendar-day.today .emoji {
            font-size: 1.5rem;
        }

        /* Mission Section */
        .mission-section {
            margin-bottom: 2rem;
        }

        .mission-section h3 {
            font-size: 1.25rem;
            color: #2d3748;
            margin: 0 0 1.5rem 0;
            font-weight: 600;
        }

        .mission-progress {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 0;
            position: relative;
        }

        .progress-step {
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
            flex: 1;
        }

        .progress-step:not(:last-child)::after {
            content: '';
            position: absolute;
            top: 35px;
            left: 50%;
            width: 100%;
            height: 4px;
            background: #e2e8f0;
            z-index: 0;
        }

        .progress-step.completed:not(:last-child)::after {
            background: #ffd166;
        }

        .progress-icon {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            margin-bottom: 0.75rem;
            z-index: 1;
            position: relative;
        }

        .progress-step.completed .progress-icon {
            background: #ffd166;
        }

        .progress-step.pending .progress-icon {
            background: #7dd3c0;
        }

        .progress-label {
            font-size: 0.85rem;
            color: #4a5568;
            text-align: center;
            font-weight: 600;
            line-height: 1.3;
        }

        .progress-step.completed .progress-label {
            color: #ffd166;
        }

        .progress-step.pending .progress-label {
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
            .missions-container {
                max-width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="missions-container">
        <!-- Header -->
        <div class="header">
            Mission
        </div>

        <!-- Content -->
        <div class="content">
            <!-- Streak Banner -->
            <div class="streak-banner">
                <h1>You have reached <span class="streak-number">24</span> Streak</h1>
                <h2>Keep it up !!</h2>
            </div>

            <!-- Calendar Section -->
            <div class="calendar-section">
                <div class="calendar-header">
                    <h3>Date</h3>
                    <div class="calendar-nav">
                        <button onclick="previousMonth()">‹</button>
                        <span id="currentMonth">November</span>
                        <button onclick="nextMonth()">›</button>
                    </div>
                </div>

                <div class="calendar-wrapper">
                    <!-- Weekdays -->
                    <div class="calendar-weekdays">
                        <div class="weekday">Sun</div>
                        <div class="weekday">Mon</div>
                        <div class="weekday">Tue</div>
                        <div class="weekday">Wed</div>
                        <div class="weekday">Thu</div>
                        <div class="weekday">Fri</div>
                        <div class="weekday">Sat</div>
                    </div>

                    <!-- Calendar Days -->
                    <div class="calendar-days" id="calendarDays">
                        <!-- Will be populated by JavaScript -->
                    </div>
                </div>
            </div>

            <!-- Mission Progress -->
            <div class="mission-section">
                <h3>Mission</h3>
                <div class="mission-progress">
                    <div class="progress-step completed">
                        <div class="progress-icon">⏱️</div>
                        <div class="progress-label">Verification</div>
                    </div>
                    <div class="progress-step pending">
                        <div class="progress-icon">✅</div>
                        <div class="progress-label">Points<br>Converted</div>
                    </div>
                </div>
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
        (function () {
            const today = new Date();
            today.setHours(0, 0, 0, 0);

            let currentMonth = today.getMonth();
            let currentYear = today.getFullYear();

            const streakDays = [
                '2025-11-02', '2025-11-03', '2025-11-04', '2025-11-05', '2025-11-06',
                '2025-11-09', '2025-11-11', '2025-11-12', '2025-11-13', '2025-11-14',
                '2025-11-15', '2025-11-16', '2025-11-17', '2025-11-18', '2025-11-19'
            ];

            const monthNames = ['January', 'February', 'March', 'April', 'May', 'June',
                                'July', 'August', 'September', 'October', 'November', 'December'];

            function renderCalendar() {
                const calendarDays = document.getElementById('calendarDays');
                const monthDisplay = document.getElementById('currentMonth');
                if (!calendarDays || !monthDisplay) return;

                monthDisplay.textContent = `${monthNames[currentMonth]} ${currentYear}`;
                calendarDays.innerHTML = '';

                const firstDay = new Date(currentYear, currentMonth, 1).getDay();
                const daysInMonth = new Date(currentYear, currentMonth + 1, 0).getDate();

                for (let i = 0; i < firstDay; i++) {
                    const emptyDay = document.createElement('div');
                    emptyDay.className = 'calendar-day empty';
                    calendarDays.appendChild(emptyDay);
                }

                for (let day = 1; day <= daysInMonth; day++) {
                    const dayDiv = document.createElement('div');
                    dayDiv.className = 'calendar-day';

                    const dateStr = `${currentYear}-${String(currentMonth + 1).padStart(2, '0')}-${String(day).padStart(2, '0')}`;
                    const currentDate = new Date(currentYear, currentMonth, day);
                    currentDate.setHours(0, 0, 0, 0);

                    const isToday = currentDate.getTime() === today.getTime();
                    const isFuture = currentDate.getTime() > today.getTime();
                    const isPast = currentDate.getTime() < today.getTime();
                    const hasStreak = streakDays.includes(dateStr);

                    if (isToday) {
                        dayDiv.classList.add('today');
                        dayDiv.innerHTML = `
                            <div class="date">${day}</div>
                            <div class="emoji">🔥</div>
                        `;
                    } else if (isFuture) {
                        dayDiv.classList.add('future');
                        dayDiv.innerHTML = `<div class="date">${day}</div>`;
                    } else if (isPast) {
                        if (hasStreak) {
                            dayDiv.classList.add('completed');
                            dayDiv.innerHTML = `
                                <div class="date">${day}</div>
                                <div class="emoji">👏</div>
                            `;
                        } else {
                            dayDiv.innerHTML = `<div class="date">${day}</div>`;
                        }
                    }

                    calendarDays.appendChild(dayDiv);
                }
            }

            window.previousMonth = function () {
                currentMonth--;
                if (currentMonth < 0) {
                    currentMonth = 11;
                    currentYear--;
                }
                renderCalendar();
            };

            window.nextMonth = function () {
                currentMonth++;
                if (currentMonth > 11) {
                    currentMonth = 0;
                    currentYear++;
                }
                renderCalendar();
            };

            document.addEventListener('DOMContentLoaded', function () {
                renderCalendar();
            });
        })();
    </script>
</body>
</html>