<?php
// Start or resume the session
session_start();

include('conn.php'); // Include your database connection

if (isset($_POST['logout'])) {
    // Unset session variables
    unset($_SESSION['user_type']);
    unset($_SESSION['user_id']);

    // Destroy the session
    session_destroy();

    echo "<script>alert('Logged out successfully!');</script>";
}

// Redirect the user to the login page
header('Location: login.php'); 
exit();
?>
