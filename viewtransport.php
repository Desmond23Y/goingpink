<?php
session_start();
include('conn.php');

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// Include the navigation bar (moved here to avoid output before header)
include('navi_bar.php');

$result = mysqli_query($con, "SELECT * FROM transport_information");
if (!$result) {
    die('Query Error: ' . mysqli_error($con));
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Transportation Information</title>
    <link rel="stylesheet" href="style_transport.css">
    <style>
        /* Add CSS styles to adjust image size to 800x600 pixels */
        img {
            max-width: 800px;
            max-height: 600px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Transportation Information</h1>
    </header>

    <div class="box">
        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<h3>Transport Type: ' . $row["transport_type"] . '</h3>';
                echo '<h3>Price per KM: $' . $row["transport_price_perKM"] . '</h3>';

                // Check for type of car and display the image accordingly
                if ($row["transport_type"] == "Luxury 4-seater car") {
                    echo '<img src="luxury_4_seater.png" alt="4-Luxury Car">';
                } elseif ($row["transport_type"] == "Luxury 6-seater car") {
                    echo '<img src="luxury_6_seater.png" alt="6-Luxury Car">';
                } elseif ($row["transport_type"] == "Van") {
                    echo '<img src="van.png" alt="van">';
                } elseif ($row["transport_type"] == "6-seater Car") {
                    echo '<img src="6_seater_car.png" alt="6-seater Car">';
                } elseif ($row["transport_type"] == "4-seater Car") {
                    echo '<img src="4_seater_car.png" alt="4-seater Car">';
                } 
                
            }
        } else {
            echo "No transportation information available.";
        }
        ?>
    </div>

    <div class="bottom-button">
        <form method="POST" action="api_googlemap.php">
            <button type="submit">Click here to book a ride</button>
        </form>
    </div>
</body>
</html>
