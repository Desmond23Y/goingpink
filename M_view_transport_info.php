<?php
session_start();
include('conn.php');

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
    <link rel="stylesheet" href="M_navibar.css">
    <nav>
        <ul class="navibar">
            <li><a href="M_transport_homepage.php">HOME</a></li>
            <li><a href="M_view_transport_info.php">TRANSPORTS INFO</a></li>
            <li><a href="M_view_transport_booking.php">TRANSPORT BOOKING</a></li>
            <li><a href="logout.php" class="right">LOGOUT</a></li>
        </ul>
    </nav>
</head>

<body>
<h1>Transport Information</h1>
    <div class="box">
        <?php
        if ($result->num_rows > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<h3> Transport Type: ' . $row["transport_type"] . '</h3>';
                echo '<h3> Price per KM: US$' . $row["transport_price_perKM"] . '</h3>';

                if ($_SESSION['user_type'] == 'admin' || $_SESSION['user_type'] == 'transport_management') {
                    echo '<a href="M_edit_transport_info.php?transport_id=' . $row["transport_id"] . '">Edit This Transport</a>';
                }
            }
        } else {
            echo "No transport available";
        }
        ?>
    </div>
</body>
</html>
