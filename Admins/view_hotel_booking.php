<?php
session_start();
include("../conn.php");

if (!isset($_SESSION['user_id'])) {
    header('Location: ../login.php');
    exit();
}

$result=mysqli_query($con,"SELECT* FROM hotel_booking");

include("Navi_bar_admin.php");
?>

<head>
    <link rel="stylesheet" href="viewhmgtacc.css">
</head>

<table width="90%">
    <tr bgcolor="#FFB6C1">
        <th>Hotel Booking ID</th>
        <th>Hotel Manager ID</th>
        <th>User ID</th>
        <th>Admin ID</th>
        <th>Hotel ID</th>
        <th>Number of Pax</th>
        <th>Check In Date</th>
        <th>Check Out Date</th>
        <th>Update</th>
        <th>Cancel</th>
    </tr>
    
<?php
    while($row=mysqli_fetch_array($result))
    {
        echo'<tr>';
        echo'<td>'.$row["hotel_booking_id"].'</td>';
        echo'<td>'.$row["hotel_manager_id"].'</td>';
        echo'<td>'.$row["user_id"].'</td>';
        echo'<td>'.$row["admin_id"].'</td>';
        echo'<td>'.$row["hotel_id"].'</td>';
        echo'<td>'.$row["number_of_pax"].'</td>';
        echo'<td>'.$row["check_in_date"].'</td>';
        echo'<td>'.$row["check_out_date"].'</td>';
        echo'<td><a href="update_hotel_booking.php?hotel_booking_id='.$row["hotel_booking_id"].'">Update</a></td>';
        echo'<td><a onclick="return confirm(\'Cancel '.$row["hotel_booking_id"].' booking details?\')" href="cancel_hotel_booking.php?hotel_booking_id='.$row["hotel_booking_id"].'">Cancel</a></td>';
        echo'</tr>';
    }
    mysqli_close($con);
?>
</table>
