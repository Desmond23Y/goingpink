<?php 
session_start();
include("conn.php");

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$result=mysqli_query($con,"SELECT* FROM invoice");

include("Navi_bar_admin.php");
?>

<head>
    <link rel="stylesheet" href="Viewinvoice.css">
</head>

<table width="90%">
    <tr bgcolor="#FFB6C1">
        <td>Invoice ID</td>
        <td>User ID</td>
        <td>Admin ID</td>
        <td>Hotel Booking ID</td>
        <td>Transport Booking ID</td>
        <td>Invoice Date</td>
        <td>Invoice Status</td>
        <td>Total Amount</td>

    </tr>

<?php
    while($row=mysqli_fetch_array($result))
    {
        echo'<tr>';
        echo'<td>'.$row["invoice_id"].'</td>';
        echo'<td>'.$row["user_id"].'</td>';
        echo'<td>'.$row["admin_id"].'</td>';
        echo'<td>'.$row["hotel_booking_id"].'</td>';
        echo'<td>'.$row["transport_booking_id"].'</td>';
        echo'<td>'.$row["invoice_date"].'</td>';
        echo'<td>'.$row["invoice_status"].'</td>';
        echo'<td>'.$row["total_amount"].'</td>';
        echo'</tr>';
    }
    mysqli_close($con);
?>
</table>
