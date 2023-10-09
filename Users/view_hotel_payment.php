<?php
session_start();
include('conn.php');

if (!isset($_SESSION['user_id'])) {
    header('Location: ../login.php');
    exit();
}

$user_id = $_SESSION['user_id'];

$latest_booking_query = "SELECT hb.*, hi.hotel_name, hi.room_type, hi.hotel_price, u.username, u.phone_number, u.email
                         FROM hotel_booking hb
                         JOIN user u ON hb.user_id = u.user_id
                         JOIN hotel_information hi ON hb.hotel_id = hi.hotel_id
                         WHERE hb.user_id = '$user_id'
                         ORDER BY hb.hotel_booking_id DESC
                         LIMIT 1";

$latest_booking_result = mysqli_query($con, $latest_booking_query);

if (!$latest_booking_result) {
    die('Query Error: ' . mysqli_error($con));
}

$row = mysqli_fetch_assoc($latest_booking_result);
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Summary</title>
    <link rel="stylesheet" href="viewhotelpayment.css">
</head>

<body>
<h1>Hotel Charges</h1>
<div class="box">
    <?php
    if ($row) {
        echo '<h3> Username: '. $row["username"] . '</h3>';
        echo '<h3> Phone number: ' . $row["phone_number"] . '</h3>';
        echo '<h3> Email: ' . $row["email"] . '</h3>';
        echo '<h3> Booking ID: ' . $row["hotel_booking_id"] . '</h3>';
        echo '<h3> Hotel Name: ' . $row["hotel_name"] . '</h3>';
        echo '<h3> Room type: ' . $row["room_type"] . '</h3>';
        echo '<h3> Check in Date: ' . $row["check_in_date"] . '</h3>';
        echo '<h3> Check out Date: ' . $row["check_out_date"] . '</h3>';
        echo '<h3> Number of Guests: ' . $row["number_of_pax"] . '</h3>';
        echo '<h3> Hotel Price: ' . $row["hotel_price"] . '</h3>';
    } else {
        echo '<p>No hotel booking found.</p>';
    }
    ?>
</div>
<div class="button">
    <a href="payment_hotel.php">Proceed</a>
</div>
</body>
</html>