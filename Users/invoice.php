<?php
session_start();
include('conn.php');

if (!isset($_SESSION['user_id'])) {
    header('Location: ../login.php');
    exit();
}

$user_id = $_SESSION['user_id'];

// Query to retrieve invoice details based on the user ID
$invoice_query = "SELECT invoice_id, hotel_booking_id, transport_booking_id, invoice_date, invoice_status, total_amount
                 FROM invoice
                 WHERE user_id = '$user_id'";

$invoice_result = mysqli_query($con, $invoice_query);

if (!$invoice_result) {
    die('Query Error: ' . mysqli_error($con));
}
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Details</title>
    <!-- Add your CSS stylesheets here -->
</head>

<body>
    <h1>Invoice Details</h1>
    <table>
        <tr>
            <th>Invoice ID</th>
            <th>Hotel Booking ID</th>
            <th>Transport Booking ID</th>
            <th>Invoice Date</th>
            <th>Invoice Status</th>
            <th>Total Amount</th>
        </tr>
        <?php
        while ($row = mysqli_fetch_assoc($invoice_result)) {
            echo '<tr>';
            echo '<td>' . $row["invoice_id"] . '</td>';
            echo '<td>' . $row["hotel_booking_id"] . '</td>';
            echo '<td>' . $row["transport_booking_id"] . '</td>';
            echo '<td>' . $row["invoice_date"] . '</td>';
            echo '<td>' . $row["invoice_status"] . '</td>';
            echo '<td>' . $row["total_amount"] . '</td>';
            echo '</tr>';
        }
        ?>
    </table>
</body>
</html>
