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

                // Add a button to proceed to the Google Maps API page
                echo '<form method="POST" action="api_googlemap.php">';
                echo '<button type="submit">Proceed</button>';
                echo '</form>';
            }
        } else {
            echo "No transportation information available.";
        }
        ?>
    </div>
</body>
</html>
