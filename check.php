<?php
session_start();
// hCaptcha secret key and response
$data = array(
    'secret' => "ES_889aba78d51a42d88447b5e41a24c44b",
    'response' => $_POST['h-captcha-response']
);

// Initialize cURL request to hCaptcha for verification
$verify = curl_init();
curl_setopt($verify, CURLOPT_URL, "https://hcaptcha.com/siteverify");
curl_setopt($verify, CURLOPT_POST, true);
curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($data));
curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($verify);
$responseData = json_decode($response);

// If hCaptcha is successfully solved
if ($responseData->success) {
    // Set session variable indicating CAPTCHA success
    $_SESSION['CaptchaSuccess'] = 'success';
    
    // Redirect to the desired page (change 'verify' to whatever you want)
    header("Location: /");
    exit;
} else {
    header("Location: /captcha");

}
?>
