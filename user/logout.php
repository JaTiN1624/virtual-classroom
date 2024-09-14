<?php
// Start the session only if it's not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Destroy the session
session_unset();
session_destroy();
header("Location: home.php");
exit(); 
?>
