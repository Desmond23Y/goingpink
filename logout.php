<?php
// Start or resume the session
session_start();

include('conn.php'); // Moved the inclusion of 'conn.php' here

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['logout'])) {
    // Unset session variables
    unset($_SESSION['user_type']);
    unset($_SESSION['user_id']);

    echo "<script>alert('Logged out successfully!');</script>";
}

// Check if the user is already logged in
if (isset($_SESSION['user_type']) && isset($_SESSION['user_id'])) {
    echo "<script>alert('Please login first!');</script>";
}

include('index.php'); // Moved the inclusion of 'navi_bar.php' after the potential error messages


mysqli_close($con);
?>

