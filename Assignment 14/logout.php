<?php
session_start();

// Unset all session variables
session_unset();

// Destroy the session
session_destroy();

// Remove the username cookie
setcookie("username", "", time() - 3600, "/");

// Redirect to the login page
header("Location: login.php");
exit();
?>