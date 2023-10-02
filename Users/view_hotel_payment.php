<?php
session_start();
include('conn.php');

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$user_id = $_SESSION['user_id'];
$hotel_id = $_SESSION['selected_hotel_id'];

if (isset($_GET['hotel_id']) && isset($_GET['user_id'])) {
    $hotel_id = $_GET['hotel_id'];
    $result = mysqli_query($con, "SELECT * FROM hotel_booking WHERE hotel_id = '$hotel_id'");
    $result2 = mysqli_query($con, "SELECT * FROM user WHERE user_id = '$user_id'");
    $result3 = mysqli_query($con, "SELECT * FROM hotel_information WHERE hotel_id = '$hotel_id'");
    if (!$result || !$result2 || !$result3) {
        die('Query Error: ' . mysqli_error($con));
    }
}
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Summary</title>
    <link rel="stylesheet" href="your_css_file.css">
</head>

<body>
<h1>Fare Summary</h1>
    <div class="box">
        <?php
        if (isset($result) && isset($result2) && isset($result3) && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result && $result2 && $result3)) {
                echo '<h3>' . $row["username"] . '</h3>';
                echo '<h3> Phone number: ' . $row["phone_number"] . '</h3>';
                echo '<h3> Email: ' . $row["email"] . '</h3>';
                echo '<h3> Booking ID: ' . $row["hotel_booking_id"] . '</h3>';
                echo '<h3> Hotel Name: ' . $row["hotel_name"] . '</h3>';
                echo '<h3> Room type: ' . $row["room_type"] . '</h3>';
                echo '<h3> Check in Date: ' . $row["check_in_date"] . '</h3>';
                echo '<h3> check out Date: ' . $row["check_out_date"] . '</h3>';
                echo '<h3> Number of Guests: ' . $row["number_of_pax"] . '</h3>';
                echo '<h3> Hotel Price: ' . $row["hotel_price"] . '</h3>';
            }
        }
        ?>
    </div>
</body>
</html>
