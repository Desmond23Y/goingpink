<?php
session_start();
include('conn.php');

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
</head>

<body>
<h1>Hotel Information</h1>
    <div class="box">
        <?php
        if ($result->num_rows > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<h3> Hotel Name: ' . $row["hotel_name"] . '</h3>';
                echo '<h3> Room Type: ' . $row["room_type"] . '</h3>';
                echo '<h3> Room Availability: ' . $row["room_availability"] . '</h3>';
                echo '<h3> Hotel Availability: ' . $row["hotel_availability"] . '</h3>';
                echo '<h3> Hotel Price: US$ ' . $row["hotel_price"] . '</h3>';
                
                if ($_SESSION['user_type'] == 'admin' || $_SESSION['user_type'] == 'hotel_management') {
                    echo '<a href="edithotel.php?hotel_id=' . $row["hotel_id"] . '">Edit This Hotel</a>';
                }
            }
        } else {
            echo "No hotels available";
        }
        ?>
    </div>
</body>
</html>
