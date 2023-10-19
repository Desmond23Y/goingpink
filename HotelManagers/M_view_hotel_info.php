<?php
session_start();
include("../conn.php");

$selectedHotelID = null;

$result = mysqli_query($con, "SELECT * FROM hotel_information");
if (!$result) {
    die('Query Error: ' . mysqli_error($con));
}
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel </title>
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
    <h1>Hotel Information</h1>
</header>
    <div class="box">
        <?php
        if ($result->num_rows > 0) {
            while ($row = mysqli_fetch_assoc($result)) {

                $hotelImageSrc = "../picture/hotel" . $row["hotel_id"] . ".jpg"; // 
        
                echo '<img src="' . $hotelImageSrc . '" alt="' . $row["hotel_name"] . '" class="hotel-image">';

                echo '<h3> Hotel Name:  <span class="thin-font"> ' . $row["hotel_name"] . '</span></h3>';
                echo '<h3> Room Type:   <span class="thin-font">' . $row["room_type"] . '</span></h3>';
                echo '<h3> Room Availability:  <span class="thin-font"> ' . $row["room_availability"] . '</span></h3>';
                echo '<h3> Hotel Availability:   <span class="thin-font">' . $row["hotel_availability"] . '</span></h3>';
                echo '<h3> Hotel Price:  <span class="thin-font"> US$ ' . $row["hotel_price"] . '</span></h3>';
                echo '<br>';

                if ($_SESSION['user_type'] == 'admin' || $_SESSION['user_type'] == 'hotel_management') {
                    echo '<a href="M_edit_hotel_info.php?hotel_id=' . $row["hotel_id"] . '" class="button edit-button">Edit This Hotel</a>';
                    
                }
               
            }
          
        } else {
            echo "No hotels available";
        }
        ?>
    </div>
</body>
</html>
