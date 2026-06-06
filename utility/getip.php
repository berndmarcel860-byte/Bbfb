<?php
session_start(); // Start the session
header('Content-Type: application/json');

function trueip() {
    // Your existing trueip function here
    if (
        !empty($_SERVER["HTTP_CF_CONNECTING_IP"]) &&
        $_SERVER["HTTP_CF_CONNECTING_IP"] != "127.0.0.1" &&
        $_SERVER["HTTP_CF_CONNECTING_IP"] != $_SERVER["SERVER_ADDR"]
    ) {
        return $_SERVER["HTTP_CF_CONNECTING_IP"];
    } elseif (
        !empty($_SERVER["GEOIP_ADDR"]) &&
        $_SERVER["GEOIP_ADDR"] != "127.0.0.1"
    ) {
        return $_SERVER["GEOIP_ADDR"];
    } elseif (
        !empty($_SERVER["HTTP_X_FORWARDED_FOR"]) &&
        $_SERVER["HTTP_X_FORWARDED_FOR"] != "127.0.0.1" &&
        $_SERVER["HTTP_X_FORWARDED_FOR"] != $_SERVER["SERVER_ADDR"]
    ) {
        return explode(",", $_SERVER["HTTP_X_FORWARDED_FOR"])[0];
    } elseif (
        !empty($_SERVER["HTTP_CLIENT_IP"]) &&
        $_SERVER["HTTP_CLIENT_IP"] != "127.0.0.1" &&
        $_SERVER["HTTP_CLIENT_IP"] != $_SERVER["SERVER_ADDR"]
    ) {
        return $_SERVER["HTTP_CLIENT_IP"];
    } else {
        return $_SERVER["REMOTE_ADDR"];
    }
}

// Get the IP address
$ip = trueip();

// Save the IP address into a session variable
$_SESSION['client_ip'] = $ip;

// Return the IP address as JSON
echo json_encode(['ip' => $ip]);
?>
