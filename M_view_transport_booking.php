<?php
session_start();
include('conn.php');

$result = mysqli_query($con, "SELECT * FROM transport_booking");
if (!$result) {
    die('Query Error: ' . mysqli_error($con));
}
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Transport Booking</title>
    <link rel="stylesheet" href="M_navibar.css">
     <nav>
        <ul class="navibar">
            <li><a href="M_hotel_homepage.php">HOME</a></li>
            <li><a href="M_view_hotel_info.php">HOTELS INFO</a></li>
            <li><a href="M_view_hotel_booking.php">HOTEL BOOKING</a></li>
            <li><a href="logout.php" class="right">LOGOUT</a></li>
        </ul>
    </nav>
</head>

<body>
<h1>Transport Booking</h1>
    <div class="box">
        <?php
        if ($result->num_rows > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<h3> Transport Booking ID: ' . $row["transport_booking_id"] . '</h3>';
                echo '<h3> Transport ID: ' . $row["transport_id"] . '</h3>';
                echo '<h3> User ID: ' . $row["user_id"] . '</h3>';
                echo '<h3> Arrival Time: ' . $row["arrival_time"] . '</h3>';
                echo '<h3> Departure Time: ' . $row["departure_time"] . '</h3>';
                echo '<h3> Arrival Location: ' . $row["arrival_location"] . '</h3>';
                echo '<h3> Departure Location: ' . $row["departure_location"] . '</h3>';
            }
        } else {
            echo "No transport booking available";
        }
        ?>
    </div>
</body>
</html>