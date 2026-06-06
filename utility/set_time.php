<?php
session_start();
date_default_timezone_set('UTC'); // Use UTC for consistency

// Define the expiration times
$sixtyMinutes = new DateTime();
$sixtyMinutes->add(new DateInterval('PT60M')); // 60 minutes from now

$tenMinutes = new DateTime();
$tenMinutes->add(new DateInterval('PT10M')); // 10 minutes from now

// Check some condition to determine which expiration time to use
if (isset($_GET['type']) && $_GET['type'] === 'short') {
    // Set 10-minute session expiration
    $_SESSION['future_time'] = $tenMinutes->format('Y-m-d H:i:s');
    $_SESSION['session_duration'] = '10 minutes';
} else {
    // Set 60-minute session expiration
    $_SESSION['future_time'] = $sixtyMinutes->format('Y-m-d H:i:s');
    $_SESSION['session_duration'] = '60 minutes';
}

// Output the result (for debugging)
echo "Session expiration time set for: " . $_SESSION['session_duration'];
echo "<br>Future time: " . $_SESSION['future_time'];
?>
