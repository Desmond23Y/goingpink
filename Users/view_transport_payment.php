<?php
session_start();
include('conn.php');

if (!isset($_SESSION['user_id'])) {
    header('Location: ../login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve data sent through AJAX
    $userId = isset($_POST['user_id']) ? $_POST['user_id'] : '';
    $transportId = isset($_POST['transport_id']) ? $_POST['transport_id'] : '';
    $arrivalLocation = isset($_POST['arrival_location']) ? $_POST['arrival_location'] : '';
    $departureLocation = isset($_POST['departure_location']) ? $_POST['departure_location'] : '';
    $arrivalTime = isset($_POST['arrival_time']) ? $_POST['arrival_time'] : '';
    $departureTime = isset($_POST['departure_time']) ? $_POST['departure_time'] : '';
    $price = isset($_POST['price']) ? $_POST['price'] : '';

    echo "<h2>Payment Successful</h2>";
    
    // Display the received data
    echo "User ID: " . $userId . "<br>";
    echo "Transport ID: " . $transportId . "<br>";
    echo "Arrival Location: " . $arrivalLocation . "<br>";
    echo "Departure Location: " . $departureLocation . "<br>";
    echo "Arrival Time: " . $arrivalTime . "<br>";
    echo "Departure Time: " . $departureTime . "<br>";
    echo "Price: " . $price . "<br>";
} else {
    // Invalid request
    echo "Invalid request.";
}
?>
