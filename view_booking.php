<?php
include('navi_bar.php')
include("conn.php");

$result = mysqli_query($con, "SELECT * FROM hotel_information");
if (!$result) {
    die('Query Error: ' . mysqli_error($con));
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Going Pink Hotel Viewing</title>
    <link rel="stylesheet" href="style_booking.css">
</head>
<body>
    <header>
        <h1>Hotel Viewing</h1>
    </header>

    <div class="box">
        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<h3> Hotel ID: '. $row["hotel_id"].'</h3>';
                echo '<h3> Hotel Name: '. $row["hotel_name"].'</h3>';
                echo '<h3> Room Type: '. $row["room_type"].'</h3>';
                echo '<h3> Room Availability: '. $row["room_availability"].'</h3>';
                echo '<h3> Hotel Availability: '. $row["hotel_availability"].'</h3>';
                echo '<h3> Hotel Price: US$ '. $row["hotel_price"].'</h3>';
            }
        } else {
            echo "No hotels available.";
        }
        ?>
    </div>

</body>
</html>
<?php
include('footer.php');
?>
