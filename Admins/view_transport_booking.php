<?php 
session_start();
include("conn.php");

if (!isset($_SESSION['user_id'])) {
    header('Location: ../login.php');
    exit();
}

$result=mysqli_query($con,"SELECT* FROM transportation_booking");

include("Navi_bar_admin.php");
?>

<head>
    <link rel="stylesheet" href="Viewtransportbooking.css">
</head>

<table width="90%">
    <tr bgcolor="#FFB6C1">
        <th>Transport Booking ID</th>
        <th>Transport Manager ID</th>
        <th>User ID</th>
        <th>Admin ID</th>
        <th>Transport ID</th>
        <th>Arrival Time</th>
        <th>Departure Time</th>
        <th>Arrival Location</th>
        <th>Departure Location</th>
        <th>Cancel</th>
    </tr>

<?php
    while($row=mysqli_fetch_array($result))
    {
        echo'<tr>';
        echo'<td>'.$row["transport_booking_id"].'</td>';
        echo'<td>'.$row["transport_manager_id"].'</td>';
        echo'<td>'.$row["user_id"].'</td>';
        echo'<td>'.$row["admin_id"].'</td>';
        echo'<td>'.$row["transport_id"].'</td>';
        echo'<td>'.$row["arrival_time"].'</td>';
        echo'<td>'.$row["departure_time"].'</td>';
        echo'<td>'.$row["arrival_location"].'</td>';
        echo'<td>'.$row["departure_location"].'</td>';
        echo'<td><a onclick="return confirm(\'Cancel '.$row["transport_booking_id"].' booking details?\')" href="cancel_transportation_booking.php?transport_booking_id='.$row["transport_booking_id"].'">Cancel</a></td>';
        echo'</tr>';
    }
    mysqli_close($con);
?>
</table>
