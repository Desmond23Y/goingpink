<?php
session_start(); // Start the session at the beginning of the file
include('conn.php'); 

if (!isset($_SESSION['user_id'])) {
    // User is not logged in, handle this case as needed (e.g., redirect to login)
    echo json_encode(['success' => false, 'message' => 'User not logged in']);
    header ('Location: login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get user ID from the session
    $userId = $_SESSION['user_id'];
    
    // Get other parameters from the POST request
    $departureLocation = $_POST['departure_location'];
    $arrivalLocation = $_POST['arrival_location'];
    $transportType = $_POST['transport_type'];
    $estimatedArrivalTime = $_POST['estimated_arrival_time'];
    $transportId = $_POST['transport_id']; // The transport ID is passed from JavaScript

    // Current timestamp for departure_time
    $departureTime = date('Y-m-d H:i:s');

    // Insert the booking details into the transport_booking table
    $insertQuery = "INSERT INTO transport_booking (user_id, transport_id, arrival_time, departure_time, arrival_location, departure_location) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($con, $insertQuery);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "iissss", $userId, $transportId, $estimatedArrivalTime, $departureTime, $arrivalLocation, $departureLocation);
        
        if (mysqli_stmt_execute($stmt)) {
            echo json_encode(['success' => true, 'message' => 'Booking successful']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Booking failed']);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error preparing statement']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
}
?>
