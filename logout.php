<?php
// Start or resume the session
session_start();

if (isset($_SESSION['user_id'])) {
        // Destroy the session
        session_destroy();
        echo 'You have been logged out.';

        // Redirect to the login page
        header('Location: login.php'); 
        exit();
    
} else {
    // User is not logged in, redirect to the login page
    header('Location: login.php'); 
    exit();
}
?>
