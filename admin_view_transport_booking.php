<?php include("conn.php");
$result=mysqli_query($con,"SELECT* FROM transportation_booking");
?>
<table width="90%">
    <tr bgcolor="#FFB6C1">
        <td>Transport Booking ID</td>
        <td>Transport Manager ID</td>
        <td>User ID</td>
        <td>Admin ID</td>
        <td>Transport ID</td>
        <td>Arrival Time</td>
        <td>Departure Time</td>
        <td>Arrival Location</td>
        <td>Departure Location</td>
        <td>Cancel</td>
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
        echo'<td><a onclick="return confirm(\'Cancel '.$row["user_id"].' booking details?\')" href="admin_cancel_transportation_booking.php?transport_booking_id='.$row["transport_booking_id"].'">Cancel</a></td>';
        echo'</tr>';
    }
    mysqli_close($con);
?>
</table>
