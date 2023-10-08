<?php
session_start();
include('conn.php'); 

$user_id = $_SESSION['user_id'];

// Query to fetch the most recent hotel booking
$hotel_query = "SELECT hotel_id, hotel_total_price 
               FROM hotel_booking 
               WHERE user_id = '$user_id'
               ORDER BY hotel_id DESC
               LIMIT 1";
$hotel_result = mysqli_query($con, $hotel_query);

// Query to fetch the most recent transportation booking
$transport_query = "SELECT transport_id, transport_total_price 
                   FROM transportation_booking 
                   WHERE user_id = '$user_id'
                   ORDER BY transport_id DESC
                   LIMIT 1";
$transport_result = mysqli_query($con, $transport_query);

mysqli_close($con);
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Booking Details</title>
    <link rel="stylesheet" href="havent_do.css">
</head>
<body>
    <h2>User Booking Details</h2>
    <h3>Hotel Booking:</h3>
    <?php
    if ($hotel_result && mysqli_num_rows($hotel_result) > 0) {
        $hotel_row = mysqli_fetch_assoc($hotel_result);
        echo "Hotel ID: " . $hotel_row['hotel_id'] . "<br>";
        echo "Hotel Total Price: " . $hotel_row['hotel_total_price'] . "<br>";
    } else {
        echo "No hotel booking found.";
    }
    ?>

    <h3>Transportation Booking:</h3>
    <?php
    if ($transport_result && mysqli_num_rows($transport_result) > 0) {
        $transport_row = mysqli_fetch_assoc($transport_result);
        echo "Transport ID: " . $transport_row['transport_id'] . "<br>";
        echo "Transport Total Price: " . $transport_row['transport_total_price'] . "<br>";
    } else {
        echo "No transportation booking found.";
    }
    ?>
</body>
</html>
