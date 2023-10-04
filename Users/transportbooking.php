<?php
session_start();
include('conn.php'); 

if (!isset($_SESSION['user_id'])) {
    header('Location: ../login.php');
    exit();
}

$user_id = $_SESSION['user_id'];
$transport_id = $_SESSION['transport_id'];

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

    // Randomly select an admin from the admin table
    $randomAdminQuery = "SELECT admin_id FROM admin ORDER BY RAND() LIMIT 1";
    $randomAdminResult = mysqli_query($con, $randomAdminQuery);

    if (!$randomManagerResult || !$randomAdminResult) {
        echo json_encode(['success' => false, 'error' => 'Error selecting transport manager or admin']);
        exit();
    }

    $managerRow = mysqli_fetch_assoc($randomManagerResult);
    $transportManagerId = $managerRow['transport_manager_id'];

    $adminRow = mysqli_fetch_assoc($randomAdminResult);
    $adminId = $adminRow['admin_id'];

    // Prepare the data to send to the first code block using AJAX
    $ajaxData = [
        'user_id' => $userId,
        'transport_id' => $transportId,
        'arrival_location' => $arrivalLocation,
        'departure_location' => $departureLocation,
        'arrival_time' => $arrivalTime,
        'departure_time' => $departureTime,
        'price' => $price
    ];

    // Send an AJAX request to the first code block
    echo '<script>
            $.ajax({
                type: "POST",
                url: "first_code_block.php",
                data: ' . json_encode($ajaxData) . ',
                success: function (response) {
                    // Display the response to the user
                    $("#booking-message").html(response);
                },
                error: function () {
                    // Handle the error if the AJAX request fails
                    $("#booking-message").html("An error occurred during payment.");
                }
            });
        </script>';

    // Insert the booking into the transportation_booking table
    $query = "INSERT INTO transportation_booking (transport_manager_id, user_id, admin_id, transport_id, arrival_location, departure_location, arrival_time, departure_time, transport_total_price) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($con, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssssssssd", $transportManagerId, $userId, $adminId, $transportId, $arrivalLocation, $departureLocation, $arrivalTime, $departureTime, $price);
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