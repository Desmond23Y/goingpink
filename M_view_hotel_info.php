<?php
session_start();
include('conn.php');

if (!isset($_SESSION['transport_manager_id'])) {
    header('Location: login.php');
    exit();
}

$selectedHotelID = null;

$sql = "SELECT * FROM hotel_information";
$result = $conn->query($sql);
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Information</title>
    <link rel="stylesheet" href="M_navibar.css">
    <nav>
        <ul class="navibar">
            <li><a href="M_hotel_homepage.php">HOME</a></li>
            <li><a href="M_view_hotel_info.php">HOTELS</a></li>
            <li><a href="M_viewbooking.php">BOOKING</a></li>
            <li><a href="M_room_availability.php">ROOM AVAILABILITY</a></li>
            <li><a href="logout.php" class="right">LOGOUT</a></li>
        </ul>
    </nav>
</head>

<body>
<h1>Hotel Information</h1>
    <div class="box">
        <?php
            if ($result->num_rows > 0) {
                echo "<table>";
                while ($row = $result->fetch_assoc()) {
                    echo '<h3> Hotel Name: ' . $row["hotel_name"] . '</h3>';
                    echo '<h3> Room Type: ' . $row["room_type"] . '</h3>';
                    echo '<h3> Room Availability: ' . $row["room_availability"] . '</h3>';
                    echo '<h3> Hotel Availability: ' . $row["hotel_availability"] . '</h3>';
                    echo '<h3> Hotel Price: US$ ' . $row["hotel_price"] . '</h3>';
                    
                    if ($_SESSION['user_type'] == 'admin' || $_SESSION['user_type'] == 'hotel_management') {
                    echo '<a href="edithotel.php?hotel_id=' . $row["hotel_id"] . '">Edit This Hotel</a>';
                    }
                    echo '</div>';
                }
            } else {
                echo "No hotels available";
            }
            $conn->close();
    ?>
    </div>
</body>
</html>
