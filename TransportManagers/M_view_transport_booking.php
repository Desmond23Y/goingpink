<?php
session_start();
include("../conn.php");

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
                echo '<h3> Transport Booking ID:  <span class="thin-font">' . $row["transport_booking_id"] . '</span></h3>';
                echo '<h3> Transport ID:  <span class="thin-font">' . $row["transport_id"] . '</span></h3>';
                echo '<h3> User ID:  <span class="thin-font">' . $row["user_id"] . '</span></h3>';
                echo '<h3> Arrival Time:  <span class="thin-font">' . $row["arrival_time"] . '</span></h3>';
                echo '<h3> Departure Time:  <span class="thin-font">' . $row["departure_time"] . '</span></h3>';
                echo '<h3> Arrival Location:  <span class="thin-font">' . $row["arrival_location"] . '</span></h3>';
                echo '<h3> Departure Location:  <span class="thin-font">' . $row["departure_location"] . '</span></h3>';
                echo '<br>';
                echo '<br>';
            }
        } else {
            echo "No transport booking available";
        }
        ?>
    </div>
</body>
</html>
