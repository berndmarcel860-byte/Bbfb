<?php 
// Check if the 'first-name', 'last-name', 'email', and 'phone' parameters are set in the URL
if (isset($_GET['first-name']) && isset($_GET['last-name']) && isset($_GET['email']) && isset($_GET['phone'])) {
    // Sanitize and assign the GET parameters to variables
    $firstName = htmlspecialchars($_GET['first-name']);
    $lastName = htmlspecialchars($_GET['last-name']);
    $email = filter_var($_GET['email'], FILTER_SANITIZE_EMAIL);
    $phone = htmlspecialchars($_GET['phone']);

    // Validate the email format
    if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
        die('Invalid email format');
    }

    // Save the sanitized values to the session variables
    $_SESSION['firstName'] = $firstName;
    $_SESSION['lastName'] = $lastName;
    $_SESSION['email'] = $email;
    $_SESSION['phone'] = $phone;

    // Optionally, redirect to another page or display a success message
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | Jobs and Careers with <?php echo htmlspecialchars($settings['site_name']); ?></title>
    <link rel="shortcut icon" href="./assets/img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>
    <?php include "./components/Header.php"; ?>
    
    <section class="career-profile">
    <h2>My Career Profile</h2>
    <p style="font-size:13px;color:#00000080">Your source for the information and resources you need for your career journey at <?php echo htmlspecialchars($settings['site_name']); ?>. Create personalized job alerts, see jobs recommended for you, try our coding puzzles, get interview schedules and more.</p>
    <form>
        <div class="form-row">
            <div class="form-field">
                <label for="first-name">First Name</label>
                <input type="text" id="first-name" name="first-name" value="<?php echo $_SESSION['firstName'];?>">
            </div>
            <div class="form-field">
                <label for="last-name">Last Name</label>
                <input type="text" id="last-name" name="last-name" value="<?php echo $_SESSION['lastName'];?>">
            </div>
        </div>
        <div class="form-field">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="<?php echo $_SESSION['email'];?>">
        </div>
        <div class="form-field">
            <label for="phone">Mobile Phone Number <small>(include country code)</small></label>
            <input type="tel" id="phone" name="phone" value="<?php echo $_SESSION['phone'];?>">
        </div>
        <button type="submit" class="submit-button">Edit Career Profile</button>
    </form>

    <br>
    <br>
    <br>
</section>

<!-- Footer Start -->
<?php include "./components/Footer.php"; ?>
 <!-- Footer End -->
</body>
</html>