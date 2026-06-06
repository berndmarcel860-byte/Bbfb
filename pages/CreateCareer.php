
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
    
<!-- Job Start -->
<?php include "./components/Jobs.php"; ?>
<!-- Job End -->
<!-- Footer Start -->
<?php include "./components/Footer.php"; ?>
 <!-- Footer End -->
</body>
</html>