<?php
session_start();
include('conn.php');

if (!isset($_SESSION['user_id'])) {
    header('Location: ../login.php');
    exit();
}

$user_id = $_SESSION['user_id'];
$hotel_id = $_SESSION['selected_hotel_id'];

if (isset($_GET['hotel_id']) && isset($_GET['user_id'])) {
    $hotel_id = $_GET['hotel_id'];

    $result = mysqli_query($con, "SELECT * FROM hotel_booking WHERE hotel_id = '$hotel_id' AND user_id = '$user_id'");

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
    <link rel="stylesheet" href="Viewhotelpayment.css">
</head>

<body>
<h1>Fare Summary</h1>
    <div class="box">
        <?php
        if (isset($result) && isset($result2) && isset($result3)) {
            if (mysqli_num_rows($result) > 0 && mysqli_num_rows($result2) > 0 && mysqli_num_rows($result3) > 0) {
                $row1 = mysqli_fetch_assoc($result);
                $row2 = mysqli_fetch_assoc($result2);
                $row3 = mysqli_fetch_assoc($result3);

                echo '<h3> Username: '. $row2["username"] . '</h3>';
                echo '<h3> Phone number: ' . $row2["phone_number"] . '</h3>';
                echo '<h3> Email: ' . $row2["email"] . '</h3>';
                echo '<h3> Booking ID: ' . $row1["hotel_booking_id"] . '</h3>';
                echo '<h3> Hotel Name: ' . $row3["hotel_name"] . '</h3>';
                echo '<h3> Room type: ' . $row3["room_type"] . '</h3>';
                echo '<h3> Check in Date: ' . $row1["check_in_date"] . '</h3>';
                echo '<h3> Check out Date: ' . $row1["check_out_date"] . '</h3>';
                echo '<h3> Number of Guests: ' . $row1["number_of_pax"] . '</h3>';
                echo '<h3> Hotel Price: ' . $row3["hotel_price"] . '</h3>';
            }
        }
        ?>
    </div>
        <button href="hotel_payment.php">Proceed to Payment</button>
</body>
</html>
