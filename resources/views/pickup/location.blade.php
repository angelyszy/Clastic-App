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
            transition: .3s;
            width: 40px;
            height: 40px;
            justify-content: center;
        }

        /* Search Section */
        .search-section {
            padding: 1.25rem 1.5rem;
            background: white;
            z-index: 999;
        }

        .search-container {
            display: flex;
            gap: 0.75rem;
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
            transition: .3s;
            background: white;
            color: #2d3748;
        }

        .search-input:focus {
            border-color: #7dd3c0;
            box-shadow: 0 0 0 3px rgba(125, 211, 192, 0.1);
        }

        /* Suggestions Dropdown */
        .suggestions-dropdown {
            position: absolute;
            top: calc(100% + 0.5rem);
            left: 0;
            right: 0;
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
        }

        .suggestion-item {
            padding: 1rem 1.25rem;
            cursor: pointer;
            border-bottom: 1px solid #f7fafc;
            display: flex;
            gap: 0.75rem;
            align-items: center;
        }

        .suggestion-item:hover {
            background: #f0f9f7;
        }

        .suggestion-item::before {
            content: "📍";
            font-size: 1.1rem;
        }

        /* Map Section */
        .map-section {
            padding: 0 1.5rem 1rem 1.5rem;
        }

        .map-container {
            width: 100%;
            height: 700px; /* updated height */
            border-radius: 16px;
            overflow: hidden;
            border: 2px solid #e2e8f0;
            position: relative;
        }

        #map {
            width: 100%;
            height: 100%;
        }

        /* Hide zoom when typing */
        .hide-zoom .leaflet-control-zoom {
            display: none !important;
        }

        /* Bottom Section */
        .bottom-section {
            padding: 1rem 1.5rem 1.5rem 1.5rem;
            background: white;
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

        .label {
            font-size: .875rem;
            color: #4a5568;
        }

        .address {
            font-size: 1rem;
            font-weight: 600;
            color: #2d3748;
        }

        .confirm-btn {
            width: 100%;
            background: linear-gradient(135deg, #7dd3c0, #5eb3a6);
            color: white;
            border: none;
            padding: 1.1rem;
            border-radius: 12px;
            font-size: 1.05rem;
            font-weight: 600;
            cursor: pointer;
            transition: .3s;
        }

        .confirm-btn:disabled {
            background: #cbd5e0;
        }

    </style>
</head>

<body>
    <div class="location-container">

        <!-- Header -->
        <div class="location-header">
            <button class="back-btn" onclick="window.history.back()">←</button>
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

                <button class="location-btn" id="currentLocationBtn">📍</button>

            </div>
        </div>

        <!-- Map Section -->
        <div class="map-section">
            <div class="map-container" id="mapContainer">
                <div id="map"></div>
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

    <!-- Leaflet -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    <script>
        let map, marker;
        let selectedLocation = null;

        const defaultCoords = [-7.2575, 112.7521];
        const addressInput = document.getElementById("addressInput");
        const suggestionsDropdown = document.getElementById("suggestionsDropdown");

        const suggestions = [
            { name: 'Jl. Kertajaya, Surabaya', lat: -7.2819, lng: 112.7908 },
            { name: 'Jl. Keputih, Surabaya', lat: -7.2916, lng: 112.7957 },
            { name: 'Jl. Dharmawangsa, Surabaya', lat: -7.2845, lng: 112.7387 },
            { name: 'Jl. Raya Darmo, Surabaya', lat: -7.2840, lng: 112.7324 },
            { name: 'Tunjungan Plaza, Surabaya', lat: -7.2636, lng: 112.7384 },
            { name: 'Kampus ITS Sukolilo, Surabaya', lat: -7.2820, lng: 112.7948 },
            { name: 'Galaxy Mall, Surabaya', lat: -7.3208, lng: 112.7305 }
        ];

        document.addEventListener("DOMContentLoaded", () => {

    document.getElementById("confirmBtn").addEventListener("click", function () {
        if (selectedLocation) {
            sessionStorage.setItem("pickupLocation", JSON.stringify(selectedLocation));
            window.location.href = "/pickup/schedule";
        }
    });



            /* MAP INIT */
            map = L.map("map").setView(defaultCoords, 13);
            L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png").addTo(map);

            marker = L.marker(defaultCoords, { draggable: true }).addTo(map);

            marker.on("dragend", () => {
                const pos = marker.getLatLng();
                updateLocation(pos.lat, pos.lng, "Selected location");
            });

            map.on("click", (e) => {
                marker.setLatLng(e.latlng);
                updateLocation(e.latlng.lat, e.latlng.lng, "Selected location");
            });

            updateLocation(defaultCoords[0], defaultCoords[1], "Surabaya, East Java");

            /* --- HIDE ZOOM WHILE TYPING --- */
            addressInput.addEventListener("focus", () => {
                document.getElementById("mapContainer").classList.add("hide-zoom");
            });

            addressInput.addEventListener("blur", () => {
                setTimeout(() => {
                    document.getElementById("mapContainer").classList.remove("hide-zoom");
                }, 200);
            });

            /* SEARCH FUNCTION */
            addressInput.addEventListener("input", (e) => {
                const q = e.target.value.toLowerCase();
                if (!q) return suggestionsDropdown.classList.remove("active");

                const filtered = suggestions.filter(s => s.name.toLowerCase().includes(q));
                suggestionsDropdown.innerHTML = filtered
                    .map(s => 
                        `<div class="suggestion-item" data-lat="${s.lat}" data-lng="${s.lng}" data-name="${s.name}">
                            ${s.name}
                         </div>`
                    ).join("");

                suggestionsDropdown.classList.add("active");
            });

            /* CLICK SUGGESTION */
            suggestionsDropdown.addEventListener("click", (e) => {
                const item = e.target.closest(".suggestion-item");
                if (!item) return;

                const lat = parseFloat(item.dataset.lat);
                const lng = parseFloat(item.dataset.lng);
                const name = item.dataset.name;

                addressInput.value = name;
                map.setView([lat, lng], 16);
                marker.setLatLng([lat, lng]);
                updateLocation(lat, lng, name);

                suggestionsDropdown.classList.remove("active");
            });

            /* CLOSE DROPDOWN ON OUTSIDE CLICK */
            document.addEventListener("click", (e) => {
                if (!e.target.closest(".search-container")) {
                    suggestionsDropdown.classList.remove("active");
                }
            });

        });

        function updateLocation(lat, lng, address) {
            selectedLocation = { lat, lng, address };

            document.getElementById("selectedAddress").innerText = address;
            document.getElementById("selectedLocation").classList.add("active");
            document.getElementById("confirmBtn").disabled = false;
        }

    </script>

</body>
</html>
