<?php
// Start the session and include necessary files
session_start();
include('conn.php');

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['success'])) {
    $success = $_POST['success'];

    if ($success === 'true') {
        // Payment was successful
        echo "<h2>Payment Successful</h2>";
        
        // Retrieve and display the parameters
        echo "User ID: " . $_SESSION['user_id'] . "<br>";
        echo "Transport ID: " . $_SESSION['transport_id'] . "<br>";
        echo "Arrival Location: " . $_POST['arrival_location'] . "<br>";
        echo "Departure Location: " . $_POST['departure_location'] . "<br>";
        echo "Arrival Time: " . $_POST['arrival_time'] . "<br>";
        echo "Departure Time: " . $_POST['departure_time'] . "<br>";
        echo "Price: " . $_POST['price'] . "<br>";
    } else {
        // Payment failed
        $error = isset($_POST['error']) ? $_POST['error'] : 'An error occurred during payment.';
        echo "Payment failed. Error: " . $error;
    }
} else {
    // Invalid request
    echo "Invalid request.";
}
?>
