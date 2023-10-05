<?php
session_start();
include('conn.php');

if (!isset($_SESSION['user_id'])) {
    header('Location: ../login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Retrieve data sent through AJAX
    $userId = isset($_GET['user_id']) ? $_GET['user_id'] : '';
    $transportId = isset($_GET['transport_id']) ? $_GET['transport_id'] : '';
    $arrivalLocation = isset($_GET['arrival_location']) ? $_GET['arrival_location'] : '';
    $departureLocation = isset($_GET['departure_location']) ? $_GET['departure_location'] : '';
    $arrivalTime = isset($_GET['arrival_time']) ? $_GET['arrival_time'] : '';
    $departureTime = isset($_GET['departure_time']) ? $_GET['departure_time'] : '';
    $price = isset($_GET['price']) ? $_GET['price'] : '';

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
