<?php

// Check if the required GET fields are set
if (isset($_GET['socketId'], $_GET['ip'], $_GET['disconnectedAt'])) {
    
    // Get the values from the GET request
    $socketId = $_GET['socketId'];
    $clientIp = $_GET['ip'];
    $disconnectedAt = $_GET['disconnectedAt'];
    
    // Create a message for logging or debugging
    $message = "User with IP: $clientIp and Socket ID: $socketId has been disconnected at: $disconnectedAt";
    
    // Log the message or perform further actions (for example, storing in a database, sending notifications, etc.)
    error_log($message);  // Logs the message to the server error log
    
    // Optional: Send the message to Telegram (assuming you have the sendTelegramMessage function)
    sendTelegramMessage($message);
    
    // Send a response back to the client
    echo json_encode(['status' => 'success', 'message' => 'Disconnection recorded.']);
} else {
    // If the required fields are not set, return an error response
    echo json_encode(['status' => 'error', 'message' => 'Missing required parameters.']);
}

// (The sendTelegramMessage function remains unchanged)

/**
 * Function to send a message to Telegram (adjust this to your actual setup).
 */
function sendTelegramMessage($message) {
    
    // Assuming $telegramBotToken and $telegramChatId are defined somewhere in your code
    global $telegramBotToken, $telegramChatId;

    // API endpoint
    $url = "https://api.telegram.org/bot$telegramBotToken/sendMessage";
    
    // Payload for the request
    $postFields = [
        'chat_id' => $telegramChatId,
        'text' => $message,
        'parse_mode' => 'HTML', // Optional, can use Markdown too
    ];
    
    // Initialize cURL to send the request
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
    // Execute the request and get the response
    $response = curl_exec($ch);
    curl_close($ch);
    
    // Return the response (optional, for debugging purposes)
    return $response;
}
?>
