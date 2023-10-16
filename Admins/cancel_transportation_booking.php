<?php
include("../conn.php");

$transport_booking_id = $_GET['transport_booking_id'];

// Use single quotes for string values in SQL queries
$result = mysqli_query($con, "DELETE FROM transportation_booking WHERE transport_booking_id='$transport_booking_id'");

if ($result) {
    // Optionally display a success message here if needed
    // echo "Hotel Manager account deleted successfully.";
} else {
    echo "Error deleting transport booking: " . mysqli_error($con);
}

mysqli_close($con);
header('Location: admin_view_transport_booking.php');
?>
