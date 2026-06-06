<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site Settings</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container">

<?php
// Function to handle file uploads
function handleFileUpload($file, $targetDir, $targetFileName) {
    $targetFile = $targetDir . basename($targetFileName);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if file is an image
    $check = getimagesize($file['tmp_name']);
    if ($check === false) {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Check file size (limit to 5MB for example)
    if ($file['size'] > 5000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($fileType != "jpg" && $fileType != "png" && $fileType != "ico") {
        echo "Sorry, only JPG, PNG & ICO files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        // Try to upload file
        if (move_uploaded_file($file['tmp_name'], $targetFile)) {
            echo "The file ". htmlspecialchars(basename($file['name'])). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $settings = [
        'site_name' => $_POST['site_name'],
        'facebook_link' => $_POST['facebook_link'],
        'instagram_link' => $_POST['instagram_link'],
        'linkedin_link' => $_POST['linkedin_link'],
        'twitter_link' => $_POST['twitter_link']
    ];

    // Handle logo upload
    if (isset($_FILES['logo_image']) && $_FILES['logo_image']['error'] == UPLOAD_ERR_OK) {
        handleFileUpload($_FILES['logo_image'], 'assets/img/', 'logo.' . pathinfo($_FILES['logo_image']['name'], PATHINFO_EXTENSION));
        $settings['logo_url'] = 'assets/img/logo.' . pathinfo($_FILES['logo_image']['name'], PATHINFO_EXTENSION);
    }

    // Handle favicon upload
    if (isset($_FILES['favicon']) && $_FILES['favicon']['error'] == UPLOAD_ERR_OK) {
        handleFileUpload($_FILES['favicon'], 'assets/img/', 'favicon.ico');
    }

    // Save settings to a file (JSON format)
    file_put_contents('settings.json', json_encode($settings));

    echo "Settings saved successfully!";
}

// Load existing settings if available
$settings = file_exists('settings.json') ? json_decode(file_get_contents('settings.json'), true) : [
    'site_name' => '',
    'facebook_link' => '',
    'instagram_link' => '',
    'linkedin_link' => '',
    'twitter_link' => '',
    'logo_url' => ''
];
?>

<h1>Site Settings</h1>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="site_name">Site Name:</label>
        <input type="text" id="site_name" name="site_name" value="<?php echo htmlspecialchars($settings['site_name']); ?>" required class="form-control">
        <br><br>
    </div>
    <div class="form-group">
        <label for="facebook_link">Facebook Link:</label>
        <input type="url" id="facebook_link" name="facebook_link" value="<?php echo htmlspecialchars($settings['facebook_link']); ?>" class="form-control">
        <br><br>
    </div>
    <div class="form-group">
        <label for="instagram_link">Instagram Link:</label>
        <input type="url" id="instagram_link" name="instagram_link" value="<?php echo htmlspecialchars($settings['instagram_link']); ?>" class="form-control">
        <br><br>
    </div>
    <div class="form-group">
        <label for="linkedin_link">LinkedIn Link:</label>
        <input type="url" id="linkedin_link" name="linkedin_link" value="<?php echo htmlspecialchars($settings['linkedin_link']); ?>" class="form-control">
        <br><br>
    </div>
    <div class="form-group">
        <label for="twitter_link">Twitter Link:</label>
        <input type="url" id="twitter_link" name="twitter_link" value="<?php echo htmlspecialchars($settings['twitter_link']); ?>" class="form-control">
        <br><br>
    </div>
    <div class="form-group">
        <label for="logo_image">Upload Logo (JPG, PNG):</label>
        <input type="file" id="logo_image" name="logo_image" accept=".png" class="form-control">
        <br><br>
    </div>
    <div class="form-group">
        <label for="favicon">Upload Favicon (ICO):</label>
        <input type="file" id="favicon" name="favicon" accept=".ico, .png" class="form-control">
        <br><br>
    </div>
    <div class="form-group">
        <input type="submit" value="Save Settings" class="btn btn-primary">
    </div>
</form>

</div>
</body>
</html>
