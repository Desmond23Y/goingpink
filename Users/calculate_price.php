<?php
session_start();
include('conn.php');

if (!isset($_SESSION['user_id'])) {
    header('Location: ../login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $distance = isset($_POST['distance']) ? floatval($_POST['distance']) : 0.0;
    $transportType = isset($_POST['transportType']) ? $_POST['transportType'] : '';

    // Validate the inputs
    if ($distance <= 0 || empty($transportType)) {
        die(json_encode(['success' => false, 'message' => 'Invalid input data']));
    }

    // Use prepared statements to fetch the price
    $stmt = mysqli_prepare($con, "SELECT transport_price_perKM FROM transport_information WHERE transport_type = ?");
    mysqli_stmt_bind_param($stmt, "s", $transportType);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

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

