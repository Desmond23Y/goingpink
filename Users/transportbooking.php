<?php
session_start();
include('conn.php'); 

if (!isset($_SESSION['user_id'])) {
    header('Location: ../login.php');
    exit();
}

include('../navi_bar.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve POST data and perform basic validation
    $userId = isset($_POST['user_id']) ? trim($_POST['user_id']) : null;
    $transportId = isset($_POST['transport_id']) ? trim($_POST['transport_id']) : null;
    $arrivalLocation = isset($_POST['arrival_location']) ? trim($_POST['arrival_location']) : '';
    $departureLocation = isset($_POST['departure_location']) ? trim($_POST['departure_location']) : '';
    $arrivalTime = isset($_POST['arrival_time']) ? trim($_POST['arrival_time']) : '';
    $departureTime = isset($_POST['departure_time']) ? trim($_POST['departure_time']) : '';
    $price = isset($_POST['price']) ? trim($_POST['price']) : 0.0; // Default to 0.0 if price is not set or empty

    // Check if any required fields are empty
    if (empty($userId) || empty($transportId) || empty($arrivalLocation) || empty($departureLocation) || empty($arrivalTime) || empty($departureTime)) {
        echo json_encode(['success' => false, 'error' => 'Missing or invalid data']);
        exit();
    }

    // Insert the booking into the transportation_booking table
    $query = "INSERT INTO transportation_booking (user_id, transport_id, arrival_location, departure_location, arrival_time, departure_time, transport_total_price) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($con, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssssssd", $userId, $transportId, $arrivalLocation, $departureLocation, $arrivalTime, $departureTime, $price);

        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_close($stmt);
            echo json_encode(['success' => true]);
            exit();
        } else {
            mysqli_stmt_close($stmt);
            echo json_encode(['success' => false, 'error' => 'Database error: ' . mysqli_error($con)]);
            exit();
        }
    } else {
        echo json_encode(['success' => false, 'error' => 'Backend error: ' . mysqli_error($con)]);
        exit();
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid request']);
    exit();
}
