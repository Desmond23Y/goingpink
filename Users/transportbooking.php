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

    // Randomly select a transport manager and an admin
    $random_manager_query = "SELECT transport_manager_id FROM transport_management ORDER BY RAND() LIMIT 1";
    $random_admin_query = "SELECT admin_id FROM admin ORDER BY RAND() LIMIT 1";

    $manager_result = mysqli_query($con, $random_manager_query);
    $admin_result = mysqli_query($con, $random_admin_query);

    // Check if the queries returned any rows
    if ($manager_result && $admin_result && mysqli_num_rows($manager_result) > 0 && mysqli_num_rows($admin_result) > 0) {
        $manager_row = mysqli_fetch_assoc($manager_result);
        $admin_row = mysqli_fetch_assoc($admin_result);

        $transport_manager_id = $manager_row['transport_manager_id'];
        $admin_id = $admin_row['admin_id'];

        // Insert the booking into the transportation_booking table
        $query = "INSERT INTO transportation_booking (transport_manager_id, user_id, admin_id, transport_id, arrival_location, departure_location, arrival_time, departure_time, transport_total_price) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($con, $query);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "sssssssd", $transport_manager_id, $userId, $admin_id, $transportId, $arrivalLocation, $departureLocation, $arrivalTime, $departureTime, $price);

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
        echo json_encode(['success' => false, 'error' => 'Error selecting transport manager']);
        exit();
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid request']);
    exit();
}
?>
