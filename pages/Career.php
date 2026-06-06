
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | Jobs and Careers with <?php echo htmlspecialchars($settings['site_name']); ?></title>
    <link rel="shortcut icon" href="./assets/img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link href="./assets/css/boxicons.min.css" rel="stylesheet">

    <style>
        .error-message{
            color:red;
        }
    </style>
</head>
<body>
    <?php include "./components/Header.php"; ?>
    
    <section class="career-profile">
    <h2>Sign up for Career Profile</h2>
    <p style="font-size:13px;color:#00000080">Your source for the information and resources you need for your career journey at <?php echo htmlspecialchars($settings['site_name']); ?>. Create personalized job alerts, see jobs recommended for you, try our coding puzzles, get interview schedules and more.</p>
    <form method="POST"onsubmit="return onCreateProfile(this)">

        <div class="form-row">
            <div class="form-field">
                <label for="first-name">First Name</label>
                <input type="text" id="first-name" name="first-name">
                <div id="first-name-error" class="error-message"></div>

            </div>
            <div class="form-field">
                <label for="last-name">Last Name</label>
                <input type="text" id="last-name" name="last-name">
                <div id="last-name-error" class="error-message"></div>
            </div>
        </div>
        <div class="form-field">
            <label for="email">Email</label>
            <input type="email" id="email" name="email">
            <div id="email-error" class="error-message"></div>
        </div>
        <div class="form-field">
            <label for="phone">Mobile Phone Number <small>(include country code)</small></label>
            <input type="tel" id="phone" name="phone">
            <div id="phone-error" class="error-message"></div>

        </div>
        <button type="submit" class="submit-button">
    <i class="bx bx-loader-alt bx-spin bx-rotate-90" style="display: none;"></i> <!-- Spinner icon -->
    Create Career Profile
</button>
    </form>

    <p style="text-align:center;padding:20px 0px;margin-bottom:0px !important;">Or</p>
    <a href="login"><button type="submit" class="submit-button submitfb">Continue with Facebook</button></a>
    <br>
    <br>
    <br>
    <p>Already have a Career Profile? <a href="login" style="text-decoration:none;color:#15151E;font-weight:600">Log in</a></p>
</section>

<!-- Footer Start -->
<?php include "./components/Footer.php"; ?>
 <!-- Footer End -->
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./assets/js/createCareer.js"></script>

</body>
</html>