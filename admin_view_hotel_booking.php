<?php include("conn.php");
$result=mysqli_query($con,"SELECT* FROM hotel_booking");
?>
<table width="90%">
    <tr bgcolor="#FFB6C1">
        <td>Hotel Booking ID</td>
        <td>Hotel Manager ID</td>
        <td>User ID</td>
        <td>Admin ID</td>
        <td>Hotel ID</td>
        <td>Number of Pax</td>
        <td>Check In Date</td>
        <td>Check Out Date</td>
        <td>Update</td>
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
        echo'<td><a href="admin_update_hotel_booking.php?hotel_booking_id='.$row["hotel_booking_id"].'">Update</a></td>';
        echo'</tr>';
    }
    mysqli_close($con);
?>
</table>
