<?php
session_start();
include('conn.php'); 

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve POST data
    $userId = $_POST['user_id'];
    $transportId = $_POST['transport_id'];
    $arrivalLocation = $_POST['arrival_location'];
    $departureLocation = $_POST['departure_location'];
    $arrivalTime = $_POST['arrival_time'];
    $departureTime = $_POST['departure_time'];

    // Insert the booking into the transport_booking table
    $query = "INSERT INTO transport_booking (user_id, transport_id, arrival_location, departure_location, arrival_time, departure_time) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($con, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "iissss", $userId, $transportId, $arrivalLocation, $departureLocation, $arrivalTime, $departureTime);
        $result = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        if ($result) {
            echo json_encode(['success' => true]);
            exit();
        }
    }
}

echo json_encode(['success' => false]);
?>
