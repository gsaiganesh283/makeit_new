<?php
session_start();

// Set the session timeout duration (e.g., 1800 seconds = 30 minutes)
$timeout_duration = 1800;

// Check if the user is logged in
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    // Check if the session has timed out
    if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity']) > $timeout_duration) {
        // Session has timed out
        session_unset();     // Unset all session variables
        session_destroy();   // Destroy the session
        header("Location: login.php?timeout=true"); // Redirect to login page with timeout message
        exit();
    }

    // Update last activity time
    $_SESSION['last_activity'] = time();
} else {
    // If not logged in, redirect to login page
    header("Location: login.php");
    exit();
}
?>
