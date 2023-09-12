<?php
// Start or resume the session
session_start();

if (isset($_SESSION['user_id'])) {
    // User is logged in, log them out
    include('conn.php'); 
    if (isset($_POST['logout'])) {
        // Unset session variables
        unset($_SESSION['user_type']);
        unset($_SESSION['user_id']);

        // Destroy the session
        session_destroy();

        echo "<script>alert('Logged out successfully!');</script>";
        header('Location: login.php'); 
    }
} else {
    // User is not logged in, redirect to the login page
    header('Location: login.php'); 
    exit();
}
?>

