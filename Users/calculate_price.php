<?php
// Include your database connection here
session_start();
include('conn.php');

if (!isset($_SESSION['user_id'])) {
    header('Location: ../login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $distance = $_POST['distance'];
    $transportType = $_POST['transportType'];

    // Fetch the price for the selected transport type from the database
    $result = mysqli_query($con, "SELECT transport_price_perKM FROM transport_information WHERE transport_type = '$transportType'");

    if (!$result) {
        die(json_encode(['success' => false, 'message' => 'Error fetching price from the database']));
    }

    $row = mysqli_fetch_assoc($result);
    $pricePerKm = $row['transport_price_perKM'];

    // Calculate the total price
    $price = ($distance * $pricePerKm);

    echo json_encode(['success' => true, 'price' => $price]);
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request']);
}
?>
