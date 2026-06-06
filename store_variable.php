<?php
session_start();

if (isset($_POST['socketId'])) {
    $socketId = $_POST['socketId'];
    $_SESSION['socketId'] = $socketId;
    echo "PHP Session Set to : " . $_SESSION['socketId'];
    
}
?>
