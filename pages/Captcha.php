<?php
// Load settings
$settings_file = dirname(__DIR__) . '/settings.json';
if (!file_exists($settings_file)) {
    die('Settings file not found');
}
$settings = json_decode(file_get_contents($settings_file), true);
if ($settings === null) {
    die('Invalid settings file');
}
$company_name = $settings['company_name'] ?? 'Company Name';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Security Check</title>

    <!-- Bootstrap for layout -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- BBDO-style font -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <style>
        /* General styling */
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #F4F4F4;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            max-width: 600px;
            background-color: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .<?php echo htmlspecialchars($company_name); ?>-logo {
            margin-bottom: 30px;
        }

        .<?php echo htmlspecialchars($company_name); ?>-logo img {
            width: 180px;
        }

        h4 {
            font-weight: 700;
            color: #000;
        }

        .textreason {
            font-size: 16px;
            color: #666;
        }

        .btn {
            background-color: #0066ff !important; /* BBDO blue */
            color: #fff;
            border: none;
            padding: 12px 20px;
            border-radius: 25px;
            font-size: 16px;
            cursor: pointer;
            width: 150px;
        }

        .btn:disabled {
            background-color: #ccc;
            cursor: not-allowed;
        }

        /* Footer */
        .footer {
            font-size: 12px;
            color: #888;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">


        <!-- Security Check message -->
        <h4>Security Check</h4>
        <p class="textreason"><?php echo htmlspecialchars($company_name); ?> uses security checks to ensure the people accessing this site are real. Please complete the CAPTCHA below to continue.</p>

        <!-- hCaptcha form -->
        <form action="check.php" method="post" class="form" id="captcha-form">
            <p>Before you proceed, please complete the CAPTCHA below.</p>

            <!-- hCaptcha widget -->
            <div class="h-captcha" data-sitekey="0312fdba-32fa-41e6-ab0c-a4723d7e4f6e" data-callback="enableSubmitButton"></div>
<br>
            <!-- Submit button -->
            <input type="submit" value="Continue" id="sbmt" class="btn" disabled>
        </form>
</div>

    <!-- hCaptcha Script -->
    <script src="https://hcaptcha.com/1/api.js" async defer></script>

    <script>
        // Function to enable the submit button once CAPTCHA is solved
        function enableSubmitButton() {
            document.getElementById("sbmt").removeAttribute("disabled");
        }

        // Listen for the form submission
        document.getElementById('captcha-form').addEventListener('submit', function(event) {
            if (document.getElementById("sbmt").disabled) {
                event.preventDefault(); // Prevent form submission if the button is disabled
            }
        });
    </script>

</body>

</html>
