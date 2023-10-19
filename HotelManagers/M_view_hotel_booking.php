<?php
session_start();
include("../conn.php");

$result = mysqli_query($con, "SELECT * FROM hotel_booking");
if (!$result) {
    die('Query Error: ' . mysqli_error($con));
}
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Hotel Booking</title>
    <link rel="stylesheet" href="mviewhotelinfo.css">
    <nav>
        <ul class="navibar">
        <li><a href="M_hotel_homepage.php">HOME</a></li>
            <li><a href="M_view_hotel_info.php">HOTEL INFORMATION</a></li>
            <li><a href="M_view_hotel_booking.php">HOTEL BOOKING</a></li>
            <li><a href="M_add_hotel_info.php">CREATE HOTEL </a></li>
            <li><a href="../logout.php" class="right">LOGOUT</a></li>
        </ul>
    </nav>
</head>

<body>
<header>
    <h1>Hotel Booking</h1>
</header>
    <div class="box">
        <?php
        if ($result->num_rows > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<h3> Hotel Booking ID:  <span class="thin-font">' . $row["hotel_booking_id"] . '</span></h3>';
                echo '<h3> User ID:  <span class="thin-font">' . $row["user_id"] . '</span></h3>';
                echo '<h3> Hotel ID: <span class="thin-font"> ' . $row["hotel_id"] . '</span></h3>';
                echo '<h3> Number of Pax:  <span class="thin-font">' . $row["number_of_pax"] . '</span></h3>';
                echo '<h3> Check In Date:  <span class="thin-font">' . $row["check_in_date"] . '</span></h3>';
                echo '<h3> Check Out Date:  <span class="thin-font">' . $row["check_out_date"] . '</span></h3>';
                echo '<br>';
            }
        } else {
            echo "No hotel booking available";
        }
        ?>
    </div>
</body>
</html>
