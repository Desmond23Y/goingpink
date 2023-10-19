<?php
session_start();
include("../conn.php");

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../login.php');
    exit();
}

$result = mysqli_query($con, "SELECT * FROM transport_information");
if (!$result) {
    die('Query Error: ' . mysqli_error($con));
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Transportation Information</title>
    <link rel="stylesheet" href="viewtransport.css">
    <style>
        /* CSS styles to adjust image size to 800x600 pixels */
        img {
            max-width: 800px;
            max-height: 600px;
        }
    </style>
</head>
<body>
    <?php
        include('../navi_bar.php');
    ?>
    <header>
        <h1>Transportation Information</h1>
    </header>

    <div class="transport-item">
        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<h3>Transport Type:   <span class="thin-font">' . $row["transport_type"] . '</span></h3>';
                echo '<h3>Price per KM:   <span class="thin-font">US$' . $row["transport_price_perKM"] . '</span></h3>';

                // Check for type of car and display the image accordingly

                } elseif ($row["transport_type"] == "Luxury 6-seater car") {
                    echo '<img src="../picture/luxury_6_seater.png" alt="6-Luxury Car">';
                } elseif ($row["transport_type"] == "Van") {
                    echo '<img src="../picture/van.png" alt="van">';
                } elseif ($row["transport_type"] == "6-seater Car") {
                    echo '<img src="../picture/6_seater_car.png" alt="6-seater Car">';
                } elseif ($row["transport_type"] == "4-seater Car") {
                    echo '<img src="../picture/4_seater_car.png" alt="4-seater Car">';
                } 
                echo '<br>';
                echo '<br>';
            }
        } else {
            echo "No transportation information available.";
        }
        ?>
    </div>

    <div class="bottom-button">
        <form method="POST" action="api_googlemap.php">
            <button type="submit" style="font-weight: bold;">Click here to book a ride</button>
        </form>
    </div>
</body>
</html>
