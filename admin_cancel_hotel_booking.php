<?php
include("conn.php");

$hotel_booking_id = $_GET['hotel_booking_id'];

// Use single quotes for string values in SQL queries
$result = mysqli_query($con, "DELETE FROM hotel_booking WHERE hotel_booking_id='$hotel_booking_id'");

if ($result) {
    // Optionally display a success message here if needed
    // echo "Hotel booking deleted successfully.";
} else {
    echo "Error deleting hotel booking : " . mysqli_error($con);
}

mysqli_close($con);
header('Location: admin_view_hotel_booking.php');
?>
