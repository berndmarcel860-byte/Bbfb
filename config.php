<?php
// Load settings from settings.json
function getSettings() {
    if (file_exists('settings.json')) {
        return json_decode(file_get_contents('settings.json'), true);
    }
    // Return default settings if settings.json does not exist
    return [
        'site_name' => '',
        'logo_url' => '',
        'favicon_url' => '',
        'facebook_link' => '',
        'instagram_link' => '',
        'linkedin_link' => '',
        'twitter_link' => '',
    ];
}

// Get settings
$settings = getSettings();

?>
