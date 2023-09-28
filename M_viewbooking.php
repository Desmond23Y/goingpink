<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Hotel Booking</title>
    <link rel="stylesheet" href="M_navibar.css">
     <nav>
        <ul class="navibar">
            <li><a href="M_hotel_homepage.php">HOME</a></li>
            <li><a href="M_view_hotel_info.php">HOTELS INFO</a></li>
            <li><a href="M_viewbooking.php">BOOKING</a></li>
            <li><a href="logout.php" class="right">LOGOUT</a></li>
        </ul>
    </nav>
</head>

<body>
<h1>Hotel Information</h1>
    <div class="box">
        <?php
        if ($result->num_rows > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<h3> Hotel Booking ID: ' . $row["hotel_booking_id"] . '</h3>';
                echo '<h3> User ID: ' . $row["user_id"] . '</h3>';
                echo '<h3> Hotel ID: ' . $row["hotel_id"] . '</h3>';
                echo '<h3> Number of Pax: ' . $row["number_of_pax"] . '</h3>';
                echo '<h3> Check In Date: ' . $row["check_in_date"] . '</h3>';
                echo '<h3> Check Out Date: ' . $row["check_out_date"] . '</h3>';
            }
        } else {
            echo "No hotel booking available";
        }
        ?>
    </div>
</body>
</html>
