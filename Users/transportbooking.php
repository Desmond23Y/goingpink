<?php
session_start();
include('conn.php'); 

if (!isset($_SESSION['user_id'])) {
    header('Location: ../login.php');
    exit();
}

include('../navi_bar.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve POST data including the price
    $userId = isset($_POST['user_id']) ? trim($_POST['user_id']) : null;
    $transportId = isset($_POST['transport_id']) ? trim($_POST['transport_id']) : null;
    $arrivalLocation = isset($_POST['arrival_location']) ? trim($_POST['arrival_location']) : '';
    $departureLocation = isset($_POST['departure_location']) ? trim($_POST['departure_location']) : '';
    $arrivalTime = isset($_POST['arrival_time']) ? trim($_POST['arrival_time']) : '';
    $departureTime = isset($_POST['departure_time']) ? trim($_POST['departure_time']) : '';
    $price = isset($_POST['price']) ? floatval($_POST['price']) : 0.0; // Cast the price to a float

    // Check if any required fields are empty
    if (empty($userId) || empty($transportId) || empty($arrivalLocation) || empty($departureLocation) || empty($arrivalTime) || empty($departureTime)) {
        echo json_encode(['success' => false, 'error' => 'Missing or invalid data']);
        exit();
    }

    // Randomly select a transport manager from the transport_management table
    $randomManagerQuery = "SELECT transport_manager_id FROM transport_management ORDER BY RAND() LIMIT 1";
    $randomManagerResult = mysqli_query($con, $randomManagerQuery);

    if (!$randomManagerResult) {
        echo json_encode(['success' => false, 'error' => 'Error selecting transport manager']);
        exit();
    }

    $managerRow = mysqli_fetch_assoc($randomManagerResult);
    $transportManagerId = $managerRow['transport_manager_id'];

    // Insert the booking into the transportation_booking table
    $query = "INSERT INTO transportation_booking (user_id, transport_id, arrival_location, departure_location, arrival_time, departure_time, transport_total_price, transport_manager_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($con, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssssssdd", $userId, $transportId, $arrivalLocation, $departureLocation, $arrivalTime, $departureTime, $price, $transportManagerId);

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
?>
