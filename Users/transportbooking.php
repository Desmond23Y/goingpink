<?php
session_start();
include('conn.php'); 

if (!isset($_SESSION['user_id'])) {
    header('Location: ../login.php');
    exit();
}

//include('../navi_bar.php');   #include this only when your user is accessing it as a GUI (if needed)

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

    // Insert the booking into the transportation_booking table
    $query = "INSERT INTO transportation_booking (transport_manager_id, user_id, admin_id, transport_id, arrival_location, departure_location, arrival_time, departure_time, transport_total_price) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($con, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssssssssd", $transportManagerId, $userId, $adminId, $transportId, $arrivalLocation, $departureLocation, $arrivalTime, $departureTime, $price);
        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_close($stmt);

            $_SESSION['user_id'] = $userId;
            $_SESSION['transport_id'] = $transportId;

            // Send an AJAX request to view_transport_payment.php
            $.ajax({
                type: "POST",
                url: "view_transport_payment.php",
                data: {
                    success: true,
                    user_id: '<?php echo $userId; ?>',
                    transport_id: '<?php echo $transportId; ?>',
                    arrival_location: '<?php echo $arrivalLocation; ?>',
                    departure_location: '<?php echo $departureLocation; ?>',
                    arrival_time: '<?php echo $arrivalTime; ?>',
                    departure_time: '<?php echo $departureTime; ?>',
                    price: '<?php echo $price; ?>'
                },
                success: function (response) {
                    // Display the response to the user
                    $("#booking-message").html(response);
                },
                error: function () {
                    // Handle the error if the AJAX request fails
                    $("#booking-message").html("An error occurred during payment.");
                }
            });
            // No need to exit() here
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

<!DOCTYPE html>
<html>
<head>
    <title>Hotel Booking</title>
    <link rel="stylesheet" href="Hotelbooking.css">
</head>
<body>
    <h2>Book a Hotel</h2>
    <form id="hotel-booking-form" method="POST" action="">
        <label for="number_of_pax">Number of Guests:</label>
        <input type="number" id="number_of_pax" name="number_of_pax" min="1" required><br><br>

        <label for="check_in_date">Check-In Date:</label>
        <input type="date" id="check_in_date" name="check_in_date" required><br><br>

        <label for="check_out_date">Check-Out Date:</
