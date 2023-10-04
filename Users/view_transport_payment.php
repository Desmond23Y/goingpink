<?php
// Start the session and include necessary files
session_start();
include('conn.php');

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['success'])) {
    $success = $_POST['success'];

    if ($success === 'true') {
        // Payment was successful
        echo "<h2>Payment Successful</h2>";
        
        // Retrieve and display the parameters
        echo "User ID: " . $_SESSION['user_id'] . "<br>";
        echo "Transport ID: " . $_SESSION['transport_id'] . "<br>";
        echo "Arrival Location: " . $_POST['arrival_location'] . "<br>";
        echo "Departure Location: " . $_POST['departure_location'] . "<br>";
        echo "Arrival Time: " . $_POST['arrival_time'] . "<br>";
        echo "Departure Time: " . $_POST['departure_time'] . "<br>";
        echo "Price: " . $_POST['price'] . "<br>";
    } else {
        // Payment failed
        $error = isset($_POST['error']) ? $_POST['error'] : 'An error occurred during payment.';
        echo "Payment failed. Error: " . $error;
    }
} else {
    // Invalid request
    echo "Invalid request.";
}
?>

<<<<<<< HEAD
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
        <a href="payment_transport.php">Proceed to Payment</a>
    </div>
</body>
</html>