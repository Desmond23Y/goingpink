<?php
session_start();
include('conn.php');

$result = mysqli_query($con, "SELECT * FROM transportation_booking");
if (!$result) {
    die('Query Error: ' . mysqli_error($con));
}
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Transport Booking</title>
    <link rel="stylesheet" href="mviewtransportinfo.css">
     <nav>
        <ul class="navibar">
            <li><a href="M_transport_homepage.php">HOME</a></li>
            <li><a href="M_view_transport_info.php">TRANSPORT INFORMATION</a></li>
            <li><a href="M_view_transport_booking.php">TRANSPORT BOOKING</a></li>
            <li><a href="../logout.php" class="right">LOGOUT</a></li>
        </ul>
    </nav>
</head>

<body>
    <header>
    <h1>Transport Booking</h1>
    </header>

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
