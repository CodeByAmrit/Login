<?php
session_start();

// Clear all session data
$_SESSION = array();

// If you want to clear the session cookie, set its expiration time to a past date
if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time() - 3600, '/');
}

// Destroy the session
session_destroy();

// Redirect to the login page or any other page
header("Location: login.php");
exit();
?>
