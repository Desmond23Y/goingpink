<?php
session_start();
include("../conn.php");

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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Summary</title>
    <link rel="stylesheet" href="viewhotelpayment.css">
</head>
<body>
    <div class="box">
        <h1>Fare Charges</h1>
        <?php
        echo '<h3> User ID: ' . $userId . '</h3>';
        echo '<h3> Transport ID: ' . $transportId . '</h3>';
        echo '<h3> Arrival Location: ' . $arrivalLocation . '</h3>';
        echo '<h3> Departure Location: ' . $departureLocation . '</h3>';
        echo '<h3> Arrival Time: ' . $arrivalTime . '</h3>';
        echo '<h3> Departure Time: ' . $departureTime . '</h3>';
        echo '<h3> Price: ' . $price . '</h3>';
    }else {
    echo '<p>No transport booking found.</p>';
}       
        ?>
    </div>
<div class="button">
    <a href="payment_transport.php">Proceed</a>
</div>
</body>
</html>