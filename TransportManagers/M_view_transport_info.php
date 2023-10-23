<?php
session_start();
include("../conn.php");

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$result = mysqli_query($con, "SELECT * FROM transport_information");
if (!$result) {
    die('Query Error: ' . mysqli_error($con));
}
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Information</title>
    <link rel="stylesheet" href="mviewtransportinfo.css">
    <nav>
        <ul class="navibar">
            <li><a href="M_transport_homepage.php">HOME</a></li>
            <li><a href="M_view_transport_info.php">TRANSPORT INFORMATION</a></li>
            <li><a href="M_view_transport_booking.php">TRANSPORT BOOKING</a></li>
            <li><a href="../logout.php" class="right">LOGOUT</a></li>
        </ul>
    </nav>
    <style>
     @import url('https://fonts.cdnfonts.com/css/butler');
     @import url('https://fonts.cdnfonts.com/css/futura-pt');
     </style>
</head>

<body>
    <header>
        <h1>Transport Information</h1>
    </header>
    <div class="box">
        <?php
        if ($result->num_rows > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<br>';
                echo '<br>';
                echo '<br>';

                 // Check for type of car and display the image accordingly
                 if ($row["transport_type"] == "Luxury 4-seater carr") {
                    echo '<img src="../picture/luxury_4_seater.png" alt="4-Luxury Car">';
                } elseif ($row["transport_type"] == "Luxury 6-seater car") {
                    echo '<img src="../picture/luxury_6_seater.png" alt="6-Luxury Car">';
                } elseif ($row["transport_type"] == "Van") {
                    echo '<img src="../picture/van.png" alt="van">';
                } elseif ($row["transport_type"] == "6-seater Car") {
                    echo '<img src="../picture/6_seater_car.png" alt="6-seater Car">';
                } elseif ($row["transport_type"] == "4-seater Car") {
                    echo '<img src="../picture/4_seater_car.png" alt="4-seater Car">';
                } 
                

                echo '<h3> Transport Type: <span class="thin-font"> ' . $row["transport_type"] . '</span></h3>';
                echo '<h3> Price per KM: <span class="thin-font"> US$' . $row["transport_price_perKM"] . '</span></h3>';

                if ($_SESSION['user_type'] == 'admin' || $_SESSION['user_type'] == 'transport_management') {
                    echo '<a href="M_edit_transport_info.php?transport_id=' . $row["transport_id"] . '" class="button">Edit This Transport</a>';
                    echo '<br>';
                    echo '<br>';
                }
            }
        } else {
            echo "No transport available";
        }
        ?>
    </div>
</body>
</html>
