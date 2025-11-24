<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Location - Clastic</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: #f0f9f7;
            min-height: 100vh;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
        }

        .location-container {
            max-width: 480px;
            margin: 0 auto;
            min-height: 100vh;
            background: white;
            display: flex;
            flex-direction: column;
        }

        /* Header */
        .location-header {
            background: #7dd3c0;
            padding: 1rem 1.5rem;
            display: flex;
            align-items: center;
            gap: 1rem;
            color: #2d3748;
            position: relative;
            z-index: 1000;
        }

        .back-btn {
            background: rgba(255, 255, 255, 0.3);
            border: none;
            color: #2d3748;
            font-size: 1.5rem;
            cursor: pointer;
            padding: 0.5rem;
            display: flex;
            align-items: center;
            border-radius: 8px;
            transition: all 0.3s ease;
            width: 40px;
            height: 40px;
            justify-content: center;
        }

        .back-btn:hover {
            background: rgba(255, 255, 255, 0.5);
        }

        .location-header h1 {
            margin: 0;
            font-size: 1.5rem;
            font-weight: 600;
            color: #2d3748;
        }

        /* Search Section */
        .search-section {
            padding: 1.25rem 1.5rem;
            background: white;
            position: relative;
            z-index: 999;
        }

        .search-container {
            position: relative;
            display: flex;
            gap: 0.75rem;
            align-items: flex-start;
        }

        .input-wrapper {
            flex: 1;
            position: relative;
        }

        .search-input {
            width: 100%;
            padding: 1rem 1.25rem;
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            font-size: 1rem;
            outline: none;
            transition: all 0.3s ease;
            background: white;
            color: #2d3748;
        }

        .search-input:focus {
            border-color: #7dd3c0;
            box-shadow: 0 0 0 3px rgba(125, 211, 192, 0.1);
        }

        .search-input::placeholder {
            color: #a0aec0;
        }

        .location-btn {
            background: white;
            border: 2px solid #e2e8f0;
            padding: 1rem;
            border-radius: 12px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            flex-shrink: 0;
        }

        .location-btn:hover {
            border-color: #7dd3c0;
            background: #f0f9f7;
            transform: translateY(-2px);
        }

        .location-btn svg {
            width: 24px;
            height: 24px;
            color: #5eb3a6;
        }

        /* Suggestions Dropdown */
        .suggestions-dropdown {
            position: absolute;
            top: calc(100% + 0.5rem);
            left: 0;
            right: 60px;
            background: white;
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
            max-height: 250px;
            overflow-y: auto;
            z-index: 1001;
            display: none;
        }

        .suggestions-dropdown.active {
            display: block;
            animation: slideDown 0.2s ease-out;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .suggestion-item {
            padding: 1rem 1.25rem;
            cursor: pointer;
            border-bottom: 1px solid #f7fafc;
            transition: background 0.2s ease;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            color: #2d3748;
        }

        .suggestion-item:hover {
            background: #f0f9f7;
        }

        .suggestion-item:last-child {
            border-bottom: none;
        }

        .suggestion-item::before {
            content: '📍';
            font-size: 1.2rem;
        }

        /* Map Section */
        .map-section {
            flex: 1;
            position: relative;
            padding: 0 1.5rem;
            padding-bottom: 0.5rem;
        }

        .map-container {
            width: 100%;
            height: 550px;
            border-radius: 16px;
            overflow: hidden;
            border: 2px solid #e2e8f0;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            position: relative;
        }

        #map {
            width: 100%;
            height: 100%;
        }

        /* Map Instructions */
        .map-instructions {
            position: absolute;
            top: 1rem;
            left: 50%;
            transform: translateX(-50%);
            background: white;
            padding: 0.75rem 1.5rem;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            z-index: 500;
            font-size: 0.9rem;
            color: #4a5568;
            max-width: 90%;
            text-align: center;
        }

        /* Bottom Section */
        .bottom-section {
            padding: 1rem 1.5rem 1.5rem 1.5rem;
            background: white;
            position: relative;
            z-index: 998;
        }

        .selected-location {
            margin-bottom: 0.75rem;
            padding: 0.875rem 1rem;
            background: #f0f9f7;
            border-radius: 12px;
            display: none;
        }

        .selected-location.active {
            display: block;
        }

        .selected-location .label {
            font-size: 0.875rem;
            color: #4a5568;
            margin-bottom: 0.25rem;
        }

        .selected-location .address {
            font-size: 1rem;
            color: #2d3748;
            font-weight: 600;
        }

        .confirm-btn {
            width: 100%;
            background: linear-gradient(135deg, #7dd3c0 0%, #5eb3a6 100%);
            color: white;
            border: none;
            padding: 1.125rem;
            border-radius: 12px;
            font-size: 1.05rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(125, 211, 192, 0.3);
        }

        .confirm-btn:hover:not(:disabled) {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(125, 211, 192, 0.4);
        }

        .confirm-btn:active:not(:disabled) {
            transform: translateY(0);
        }

        .confirm-btn:disabled {
            background: #cbd5e0;
            cursor: not-allowed;
            box-shadow: none;
        }

        /* Loading State */
        .loading {
            display: none;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: white;
            padding: 1.5rem 2rem;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
            z-index: 2000;
        }

        .loading.active {
            display: block;
        }

        .spinner {
            border: 3px solid #f3f3f3;
            border-top: 3px solid #5eb3a6;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            animation: spin 1s linear infinite;
            margin: 0 auto;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        @media (max-width: 480px) {
            .location-container {
                max-width: 100%;
            }

            .map-instructions {
                font-size: 0.85rem;
                padding: 0.5rem 1rem;
            }
        }
    </style>
</head>
<body>
    <div class="location-container">
        <!-- Header -->
        <div class="location-header">
            <button class="back-btn" onclick="window.history.back()">
                ←
            </button>
            <h1>Location</h1>
        </div>

        <!-- Search Section -->
        <div class="search-section">
            <div class="search-container">
                <div class="input-wrapper">
                    <input 
                        type="text" 
                        class="search-input" 
                        id="addressInput"
                        placeholder="Enter Address"
                        autocomplete="off"
                    >
                    <div class="suggestions-dropdown" id="suggestionsDropdown"></div>
                </div>
                <button class="location-btn" id="currentLocationBtn" title="Use current location">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z" stroke-width="2"/>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Map Section -->
        <div class="map-section">
            <div class="map-container">
                <div class="map-instructions" id="mapInstructions">
                    📍 Tap on map or drag marker to select location
                </div>
                <div id="map"></div>
                <div class="loading" id="loading">
                    <div class="spinner"></div>
                </div>
            </div>
        </div>

        <!-- Bottom Section -->
        <div class="bottom-section">
            <div class="selected-location" id="selectedLocation">
                <div class="label">Selected Location:</div>
                <div class="address" id="selectedAddress">-</div>
            </div>
            <button class="confirm-btn" id="confirmBtn" disabled>Confirm Location</button>
        </div>
    </div>

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script>
        let map, marker;
        let selectedLocation = null;
        const surabayaCoords = [-7.2575, 112.7521];

        const suggestions = [
            { name: 'Jl. Kertajaya, Surabaya', lat: -7.2819, lng: 112.7908 },
            { name: 'Jl. Keputih, Surabaya', lat: -7.2916, lng: 112.7957 },
            { name: 'Jl. Dharmawangsa, Surabaya', lat: -7.2845, lng: 112.7387 },
            { name: 'Jl. Raya Darmo, Surabaya', lat: -7.2840, lng: 112.7324 },
            { name: 'Tunjungan Plaza, Surabaya', lat: -7.2636, lng: 112.7384 },
            { name: 'Kampus ITS Sukolilo, Surabaya', lat: -7.2820, lng: 112.7948 },
            { name: 'Galaxy Mall, Surabaya', lat: -7.3208, lng: 112.7305 }
        ];

        document.addEventListener('DOMContentLoaded', function () {
            map = L.map('map', {
                zoomControl: true,
                attributionControl: false
            }).setView(surabayaCoords, 13);
            
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19
            }).addTo(map);

            const redIcon = L.icon({
                iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-red.png',
                shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
                iconSize: [25, 41],
                iconAnchor: [12, 41],
                popupAnchor: [1, -34],
                shadowSize: [41, 41]
            });

            marker = L.marker(surabayaCoords, { 
                icon: redIcon,
                draggable: true 
            }).addTo(map);

            marker.on('dragend', function(e) {
                const position = marker.getLatLng();
                updateLocation(position.lat, position.lng, 'Selected location');
            });

            map.on('click', function(e) {
                marker.setLatLng(e.latlng);
                updateLocation(e.latlng.lat, e.latlng.lng, 'Selected location');
            });

            updateLocation(surabayaCoords[0], surabayaCoords[1], 'Surabaya, East Java');

            const addressInput = document.getElementById('addressInput');
            const suggestionsDropdown = document.getElementById('suggestionsDropdown');

            addressInput.addEventListener('input', function(e) {
                const value = e.target.value.toLowerCase();
                if (value.length > 0) {
                    const filtered = suggestions.filter(s => 
                        s.name.toLowerCase().includes(value)
                    );
                    
                    if (filtered.length > 0) {
                        suggestionsDropdown.innerHTML = filtered.map(s => 
                            `<div class="suggestion-item" data-lat="${s.lat}" data-lng="${s.lng}" data-name="${s.name}">${s.name}</div>`
                        ).join('');
                        suggestionsDropdown.classList.add('active');
                    } else {
                        suggestionsDropdown.innerHTML = '<div class="suggestion-item" style="pointer-events: none; opacity: 0.6;">No results found</div>';
                        suggestionsDropdown.classList.add('active');
                    }
                } else {
                    suggestionsDropdown.classList.remove('active');
                }
            });

            suggestionsDropdown.addEventListener('click', function(e) {
                if (e.target.classList.contains('suggestion-item') && e.target.dataset.lat) {
                    const lat = parseFloat(e.target.dataset.lat);
                    const lng = parseFloat(e.target.dataset.lng);
                    const name = e.target.dataset.name;
                    
                    addressInput.value = name;
                    suggestionsDropdown.classList.remove('active');
                    
                    map.setView([lat, lng], 16);
                    marker.setLatLng([lat, lng]);
                    updateLocation(lat, lng, name);
                }
            });

            document.addEventListener('click', function(e) {
                if (!e.target.closest('.search-container')) {
                    suggestionsDropdown.classList.remove('active');
                }
            });

            document.getElementById('currentLocationBtn').addEventListener('click', function() {
                const loading = document.getElementById('loading');
                
                if (navigator.geolocation) {
                    loading.classList.add('active');
                    
                    navigator.geolocation.getCurrentPosition(function(position) {
                        const lat = position.coords.latitude;
                        const lng = position.coords.longitude;
                        
                        map.setView([lat, lng], 16);
                        marker.setLatLng([lat, lng]);
                        updateLocation(lat, lng, 'Current location');
                        
                        loading.classList.remove('active');
                    }, function(error) {
                        loading.classList.remove('active');
                        alert('Unable to get your location. Please check your location permissions.');
                    });
                } else {
                    alert('Geolocation is not supported by your browser');
                }
            });

            document.getElementById('confirmBtn').addEventListener('click', function() {
                if (selectedLocation) {
                    sessionStorage.setItem('pickupLocation', JSON.stringify(selectedLocation));
                    window.location.href = '/pickup/schedule';  
                }
            });

            setTimeout(function() {
                const instructions = document.getElementById('mapInstructions');
                instructions.style.opacity = '0';
                instructions.style.transition = 'opacity 0.5s ease';
                setTimeout(() => instructions.style.display = 'none', 500);
            }, 3000);

            // Ensure map renders correctly
            setTimeout(function() {
                map.invalidateSize();
            }, 100);
        });

        function updateLocation(lat, lng, address) {
            selectedLocation = { lat, lng, address };
            
            document.getElementById('selectedAddress').textContent = address || 'Selected location';
            document.getElementById('selectedLocation').classList.add('active');
            document.getElementById('confirmBtn').disabled = false;
            
            if (address && !document.getElementById('addressInput').value) {
                document.getElementById('addressInput').value = address;
            }
        }
    </script>
</body>
</html>