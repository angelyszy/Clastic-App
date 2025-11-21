@extends('layouts.app')

@section('content')
<style>
    body {
        background: linear-gradient(135deg, #f0f9f7 0%, #e8f8f5 100%);
        min-height: 100vh;
        margin: 0;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .classify-container {
        max-width: 480px;
        margin: 0 auto;
        padding: 0;
        min-height: 100vh;
        background: white;
        padding-bottom: 100px;
        box-shadow: 0 0 30px rgba(0, 0, 0, 0.1);
    }

    /* Header */
    .header {
        background: linear-gradient(135deg, #7dd3c0 0%, #5eb3a6 100%);
        padding: 1rem 1.5rem;
        color: white;
        font-size: 1.25rem;
        font-weight: 600;
        display: flex;
        justify-content: space-between;
        align-items: center;
        box-shadow: 0 2px 10px rgba(125, 211, 192, 0.3);
    }

    .help-button {
        background: rgba(255, 255, 255, 0.3);
        color: white;
        border: 2px solid white;
        border-radius: 50%;
        width: 40px;
        height: 40px;
        font-size: 1.5rem;
        font-weight: bold;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .help-button:hover {
        background: white;
        color: #5eb3a6;
        transform: rotate(15deg) scale(1.1);
    }

    /* Content */
    .content {
        padding: 2rem 1.5rem;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    /* Fun Header Text */
    .page-title {
        text-align: center;
        margin-bottom: 1.5rem;
    }

    .page-title h2 {
        font-size: 1.75rem;
        color: #2d3748;
        margin: 0 0 0.5rem 0;
        font-weight: 700;
    }

    .page-title p {
        color: #4a9d8f;
        font-size: 1rem;
        margin: 0;
    }

    /* Image Preview - Enhanced */
    .image-preview {
        width: 100%;
        max-width: 300px;
        aspect-ratio: 1;
        border: 3px dashed #7dd3c0;
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 2rem;
        overflow: hidden;
        background: linear-gradient(135deg, #f7fafc 0%, #edf2f7 100%);
        position: relative;
        transition: all 0.4s ease;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .image-preview:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(125, 211, 192, 0.3);
    }

    .image-preview img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        animation: fadeIn 0.5s ease-in;
    }

    .image-preview .placeholder {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 1rem;
        animation: pulse 2s infinite;
    }

    .camera-icon {
        font-size: 5rem;
        filter: drop-shadow(0 4px 8px rgba(0, 0, 0, 0.1));
    }

    .placeholder-text {
        font-size: 1.1rem;
        color: #4a9d8f;
        font-weight: 600;
    }

    /* Scanning Animation Overlay */
    .scanning-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(94, 179, 166, 0.1);
        display: none;
        align-items: center;
        justify-content: center;
    }

    .scanning-overlay.active {
        display: flex;
    }

    .scan-line {
        width: 100%;
        height: 3px;
        background: linear-gradient(90deg, transparent, #7dd3c0, transparent);
        animation: scan 2s linear infinite;
    }

    @keyframes scan {
        0%, 100% { transform: translateY(-150px); }
        50% { transform: translateY(150px); }
    }

    @keyframes pulse {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.05); }
    }

    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    /* Buttons - Enhanced */
    .button-group {
        width: 100%;
        display: flex;
        flex-direction: column;
        gap: 1rem;
        align-items: center;
    }

    .button-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1rem;
        width: 100%;
        max-width: 400px;
    }

    .btn {
        padding: 1.25rem 1.5rem;
        border-radius: 16px;
        font-weight: 600;
        font-size: 1rem;
        cursor: pointer;
        transition: all 0.3s ease;
        border: none;
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .btn::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 0;
        height: 0;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.3);
        transform: translate(-50%, -50%);
        transition: width 0.6s, height 0.6s;
    }

    .btn:hover::before {
        width: 300px;
        height: 300px;
    }

    .btn-primary {
        background: linear-gradient(135deg, #7dd3c0 0%, #5eb3a6 100%);
        color: white;
        border: 2px solid transparent;
        box-shadow: 0 4px 15px rgba(125, 211, 192, 0.3);
        position: relative;
    }

    .btn-primary:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 20px rgba(125, 211, 192, 0.4);
    }

    .btn-primary:active {
        transform: translateY(-1px);
    }

    .btn-icon {
        font-size: 1.5rem;
        display: block;
        margin-bottom: 0.5rem;
    }

    .btn-outline {
        background: white;
        color: #5eb3a6;
        border: 2px solid #7dd3c0;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    }

    .btn-outline:hover {
        background: #e8f8f5;
        transform: translateY(-3px);
        box-shadow: 0 4px 15px rgba(125, 211, 192, 0.2);
    }

    .btn-full {
        width: 100%;
        max-width: 400px;
    }

    .btn:disabled {
        opacity: 0.6;
        cursor: not-allowed;
        transform: none !important;
    }

    /* Result Section - Enhanced */
    .result-section {
        width: 100%;
        max-width: 400px;
        margin-top: 2rem;
        text-align: center;
        animation: slideUp 0.5s ease-out;
    }

    @keyframes slideUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .result-section h3 {
        color: #5eb3a6;
        font-size: 1.25rem;
        margin-bottom: 1rem;
        font-weight: 600;
    }

    .result-badge {
        background: linear-gradient(135deg, #ffd166 0%, #ffb933 100%);
        color: #2d3748;
        padding: 1.5rem 2rem;
        border-radius: 16px;
        font-size: 1.75rem;
        font-weight: 700;
        box-shadow: 0 4px 20px rgba(255, 209, 102, 0.4);
        animation: bounceIn 0.6s ease-out;
        position: relative;
        overflow: hidden;
    }

    .result-badge::before {
        content: '✨';
        position: absolute;
        top: -10px;
        right: -10px;
        font-size: 3rem;
        opacity: 0.3;
    }

    @keyframes bounceIn {
        0% {
            transform: scale(0.3);
            opacity: 0;
        }
        50% {
            transform: scale(1.05);
        }
        70% {
            transform: scale(0.9);
        }
        100% {
            transform: scale(1);
            opacity: 1;
        }
    }

    .confidence-text {
        margin-top: 1rem;
        color: #4a9d8f;
        font-weight: 600;
        font-size: 1.1rem;
    }

    /* Modal - Enhanced */
    .modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.6);
        backdrop-filter: blur(5px);
        z-index: 1000;
        align-items: center;
        justify-content: center;
        animation: fadeIn 0.3s ease;
    }

    .modal.active {
        display: flex;
    }

    .modal-content {
        background: white;
        border-radius: 24px;
        padding: 2.5rem;
        max-width: 400px;
        width: 90%;
        text-align: center;
        animation: slideDown 0.4s ease-out;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
    }

    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-50px) scale(0.9);
        }
        to {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }

    .modal-content h3 {
        font-size: 1.75rem;
        color: #2d3748;
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
    }

    .modal-icon {
        font-size: 2rem;
    }

    .modal-content p {
        color: #4a5568;
        line-height: 1.8;
        margin-bottom: 1.5rem;
        font-size: 1.05rem;
    }

    /* Loading Spinner */
    .spinner {
        border: 3px solid rgba(255, 255, 255, 0.3);
        border-top: 3px solid white;
        border-radius: 50%;
        width: 20px;
        height: 20px;
        animation: spin 1s linear infinite;
        display: inline-block;
        margin-left: 0.5rem;
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    /* Bottom Nav */
    .bottom-nav {
        position: fixed;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        max-width: 480px;
        width: 100%;
        background: linear-gradient(135deg, #4a9d8f 0%, #3d8b7f 100%);
        padding: 1rem;
        display: flex;
        justify-content: space-around;
        border-radius: 30px 30px 0 0;
        box-shadow: 0 -4px 20px rgba(0, 0, 0, 0.15);
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
        transition: all 0.3s ease;
        padding: 0.5rem;
        border-radius: 12px;
    }

    .nav-item:hover {
        opacity: 1;
        background: rgba(255, 255, 255, 0.1);
    }

    .nav-item.active {
        opacity: 1;
        background: rgba(255, 255, 255, 0.2);
    }

    .nav-item svg {
        width: 24px;
        height: 24px;
    }

    .hidden {
        display: none !important;
    }

    @media (max-width: 480px) {
        .classify-container {
            max-width: 100%;
        }
    }
</style>

<div class="classify-container">
    <!-- Header -->
    <div class="header">
        <span>🔍 Classify Plastic</span>
        <button class="help-button" onclick="showGuide()">?</button>
    </div>

    <!-- Main Content -->
    <div class="content">
        <!-- Page Title -->
        <div class="page-title">
            <h2>Scan Your Plastic Waste</h2>
            <p>Let's identify and recycle responsibly! ♻️</p>
        </div>

        <!-- Image Preview -->
        <div class="image-preview" id="imagePreview">
            <div class="placeholder">
                <div class="camera-icon">📸</div>
                <div class="placeholder-text">Ready to scan</div>
            </div>
            <div class="scanning-overlay" id="scanningOverlay">
                <div class="scan-line"></div>
            </div>
        </div>

        <!-- Buttons -->
        <div class="button-group">
            <div class="button-row" id="initialButtons">
                <button class="btn btn-primary" onclick="openCamera()">
                    <span class="btn-icon">📷</span>
                    Camera
                </button>
                <button class="btn btn-primary" onclick="document.getElementById('photoInput').click()">
                    <span class="btn-icon">🖼️</span>
                    Gallery
                </button>
            </div>

            <!-- Hidden file input -->
            <input type="file" id="photoInput" accept="image/*" capture="environment" style="display:none" onchange="handlePhoto(this)">

            <button class="btn btn-outline btn-full hidden" id="clearButton" onclick="clearPhoto()">
                🗑️ Clear Photo
            </button>
            <button class="btn btn-primary btn-full hidden" id="submitButton" onclick="submitPhoto()">
                <span id="submitText">✨ Classify Now</span>
                <span id="loadingText" class="hidden">Analyzing<span class="spinner"></span></span>
            </button>
        </div>

        <!-- Result -->
        <div class="result-section hidden" id="resultSection">
            <h3>🎉 Detected Plastic Type:</h3>
            <div class="result-badge" id="resultBadge">PET Bottle</div>
            <p class="confidence-text" id="confidenceText">✓ 98% confidence</p>
        </div>
    </div>
</div>

<!-- Guide Modal -->
<div class="modal" id="guideModal">
    <div class="modal-content">
        <h3><span class="modal-icon">💡</span> How to Scan</h3>
        <p>Point your camera at plastic waste with good lighting for the best result! Make sure the plastic is clearly visible and well-lit.</p>
        <button class="btn btn-primary btn-full" onclick="closeGuide()">Got it! 👍</button>
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
    <a href="/classify" class="nav-item active">
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
</div>

<script>
    let photoFile = null;

    function openCamera() {
        showGuide();
        setTimeout(() => {
            document.getElementById('photoInput').setAttribute('capture', 'environment');
            document.getElementById('photoInput').click();
        }, 600);
    }

    function handlePhoto(input) {
        if (input.files && input.files[0]) {
            photoFile = input.files[0];
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('imagePreview').innerHTML = `
                    <img src="${e.target.result}" alt="Photo">
                    <div class="scanning-overlay" id="scanningOverlay"></div>
                `;
                document.getElementById('initialButtons').classList.add('hidden');
                document.getElementById('clearButton').classList.remove('hidden');
                document.getElementById('submitButton').classList.remove('hidden');
            };
            reader.readAsDataURL(photoFile);
        }
    }

    function clearPhoto() {
        photoFile = null;
        document.getElementById('imagePreview').innerHTML = `
            <div class="placeholder">
                <div class="camera-icon">📸</div>
                <div class="placeholder-text">Ready to scan</div>
            </div>
            <div class="scanning-overlay" id="scanningOverlay"></div>
        `;
        document.getElementById('initialButtons').classList.remove('hidden');
        document.getElementById('clearButton').classList.add('hidden');
        document.getElementById('submitButton').classList.add('hidden');
        document.getElementById('resultSection').classList.add('hidden');
    }

    function submitPhoto() {
        if (!photoFile) return alert('Please take a photo first!');

        // Show scanning animation
        document.getElementById('scanningOverlay').classList.add('active');

        const formData = new FormData();
        formData.append('photo', photoFile);

        document.getElementById('submitText').classList.add('hidden');
        document.getElementById('loadingText').classList.remove('hidden');
        document.getElementById('submitButton').disabled = true;

        fetch("{{ route('classify.upload') }}", {
            method: 'POST',
            body: formData,
            headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' }
        })
        .then(r => r.json())
        .then(data => {
            document.getElementById('scanningOverlay').classList.remove('active');
            if (data.success) {
                document.getElementById('resultBadge').textContent = data.type;
                document.getElementById('confidenceText').textContent = '✓ ' + data.confidence;
                document.getElementById('resultSection').classList.remove('hidden');
                document.getElementById('resultSection').scrollIntoView({ behavior: 'smooth' });
            } else {
                alert('Could not classify. Try a clearer photo! 📸');
            }
        })
        .catch(() => {
            document.getElementById('scanningOverlay').classList.remove('active');
            alert('Error. Check your connection. 📡');
        })
        .finally(() => {
            document.getElementById('submitText').classList.remove('hidden');
            document.getElementById('loadingText').classList.add('hidden');
            document.getElementById('submitButton').disabled = false;
        });
    }

    function showGuide() {
        document.getElementById('guideModal').classList.add('active');
    }

    function closeGuide() {
        document.getElementById('guideModal').classList.remove('active');
    }

    // Close modal when clicking outside
    document.getElementById('guideModal').addEventListener('click', function(e) {
        if (e.target === this) closeGuide();
    });
</script>
@endsection