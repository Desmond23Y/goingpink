<?php
session_start();
include('conn.php');

if (!isset($_SESSION['user_id'])) {
    header('Location: ../login.php');
    exit();
}

$user_id = $_SESSION['user_Id'];
$transport_id = $_SESSION['transport_Id'];

if (isset($_GET['transport_id']) && isset($_GET['user_id'])) {
    $transport_id = $_GET['transport_id'];

    $result = mysqli_query($con, "SELECT * FROM transportation_booking WHERE transport_id = '$transport_Id' AND user_id = '$user_Id'");

    $result2 = mysqli_query($con, "SELECT * FROM user WHERE user_id = '$user_id'");

    $result3 = mysqli_query($con, "SELECT * FROM transport_information WHERE transport_id = '$transport_Id'");
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
        if (isset($result) && isset($result2) && isset($result3)) {
            if (mysqli_num_rows($result) > 0 && mysqli_num_rows($result2) > 0 && mysqli_num_rows($result3) > 0) {
                $row1 = mysqli_fetch_assoc($result);
                $row2 = mysqli_fetch_assoc($result2);
                $row3 = mysqli_fetch_assoc($result3);

                echo '<h3> Username: '. $row2["username"] . '</h3>';
                echo '<h3> Phone number: ' . $row2["phone_number"] . '</h3>';
                echo '<h3> Booking ID: ' . $row1["transport_booking_id"] . '</h3>';
                echo '<h3> Transport Type: ' . $row3["transport_type"] . '</h3>';
                echo '<h3> Arriaval Time: ' . $row1["arrival_time"] . '</h3>';
                echo '<h3> Departure Time: ' . $row1["departure_time"] . '</h3>';
                echo '<h3> Arriaval Location: ' . $row1["arrival_location"] . '</h3>';
                echo '<h3> Departure Location: ' . $row1["departure_location"] . '</h3>';
                echo '<h3> Fare Price: ' . $row1["transport_total_price"] . '</h3>';
            }
        }
        ?>
    </div>
    <div class="button">
        <a href="transport_payment.php">Proceed to Payment</a>
    </div>
</body>
</html>