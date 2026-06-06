<?php 
session_start(); // Start the session

// Replace with your Telegram Bot API details
$telegramBotToken = '';
$telegramChatId = '';

// Get the current protocol and host
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
$currentHost = $_SERVER['HTTP_HOST'];

// Set global link to current URL
$globalLink = "{$protocol}://{$currentHost}";

// For debugging (remove in production)
// error_log("Global Link: " . $globalLink);
?>
