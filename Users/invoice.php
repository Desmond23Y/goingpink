<?php
session_start();
include('conn.php'); 


if (!isset($_SESSION['user_id'])) {
    header('Location: ../login.php');
    exit();
}

// Retrieve the user's latest hotel booking
$user_id = $_SESSION['user_id'];
$latestHotelBookingQuery = "SELECT hotel_id, hotel_total_price FROM hotel_booking WHERE user_id = '$user_id' ORDER BY booking_timestamp DESC LIMIT 1";
$latestHotelBookingResult = mysqli_query($con, $latestHotelBookingQuery);

// Retrieve the user's latest transport booking
$latestTransportBookingQuery = "SELECT transport_id, transport_total_price FROM transport_booking WHERE user_id = '$user_id' ORDER BY booking_timestamp DESC LIMIT 1";
$latestTransportBookingResult = mysqli_query($con, $latestTransportBookingQuery);

// Check if both queries were successful
if (!$latestHotelBookingResult || !$latestTransportBookingResult) {
    die('Query Error: ' . mysqli_error($con));
}

// Fetch the latest hotel booking information
$latestHotelBooking = mysqli_fetch_assoc($latestHotelBookingResult);

// Fetch the latest transport booking information
$latestTransportBooking = mysqli_fetch_assoc($latestTransportBookingResult);

// Close the database connection
mysqli_close($con);
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Latest Booking</title>
    <!-- Add your CSS styling here if needed -->
</head>
<body>
    <h2>User Latest Booking</h2>
    <table>
        <tr>
            <th>Hotel ID</th>
            <th>Hotel Total Price</th>
        </tr>
        <tr>
            <td><?php echo $latestHotelBooking['hotel_id']; ?></td>
            <td><?php echo $latestHotelBooking['hotel_total_price']; ?></td>
        </tr>
    </table>

    <br>

    <table>
        <tr>
            <th>Transport ID</th>
            <th>Transport Total Price</th>
        </tr>
        <tr>
            <td><?php echo $latestTransportBooking['transport_id']; ?></td>
            <td><?php echo $latestTransportBooking['transport_total_price']; ?></td>
        </tr>
    </table>
</body>
</html>
