<?php
session_start();
include('conn.php');

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../login.php');
    exit();
}

$user_id = $_SESSION['user_id'];

// Fetch the user's latest hotel booking
$hotel_query = "SELECT hotel_booking_id, hotel_total_price 
               FROM hotel_booking 
               WHERE user_id = '$user_id'
               ORDER BY hotel_booking_id DESC
               LIMIT 1"; // Fetch only the latest booking
$hotel_result = mysqli_query($con, $hotel_query);

if (!$hotel_result) {
    die('Query Error: ' . mysqli_error($con));
}

$currentDate = date('Y-m-d');

// Query to randomly select an available admin
$random_admin_query = "SELECT admin_id FROM admin WHERE is_available = 1 ORDER BY RAND() LIMIT 1";
$admin_result = mysqli_query($con, $random_admin_query);

if (!$admin_result) {
    die('Query Error: ' . mysqli_error($con));
}

// Fetch the randomly selected admin ID
$row = mysqli_fetch_assoc($admin_result);
$selected_admin_id = $row['admin_id'];

// Fetch the hotel booking data
if (mysqli_num_rows($hotel_result) > 0) {
    $hotel_data = mysqli_fetch_assoc($hotel_result);
    $hotel_booking_id = $hotel_data['hotel_booking_id'];
    $hotel_total_price = $hotel_data['hotel_total_price'];

    // Insert the booking data into the invoice table
    $insert_invoice_query = "INSERT INTO invoice (user_id, hotel_booking_id, total_amount, invoice_date, invoice_status, admin_id)
                             VALUES ('$user_id', '$hotel_booking_id', '$hotel_total_price', '$currentDate', 'Created', '$selected_admin_id')";
    $insert_invoice_result = mysqli_query($con, $insert_invoice_query);

    if (!$insert_invoice_result) {
        die('Insert Error: ' . mysqli_error($con));
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Payment Details</title>
    <script>
        function showPaymentStatus() {
            alert("Payment Successful!");
        }
        function formatExpirationDate(input) {
            input.value = input.value.replace(/\D/g, '');
            
            if (input.value.length >= 2 && input.value.charAt(1) !== '/') {
                input.value = input.value.substring(0, 2) + '/' + input.value.substring(2);
            }
        }
    </script>
</head>
<body>
    <h2>Payment Details</h2>
    <form action="invoice.php" method="POST" onsubmit="showPaymentStatus()">
        <label for="card_information">Card Information:</label>
        <input type="text" name="card_information" pattern="[0-9]{16}" placeholder="1234 1234 1234 1234" required>
        <br><br>
        <label for="expiration_date">Expiration Date:</label>
        <input type="text" id="expiration_date" name="expiration_date" pattern="^(0[1-9]|1[0-2])\/\d{2}$" placeholder="MM/YY" required onkeyup="formatExpirationDate(this)">
        <br><br>
        <label for="cvc">CVC:</label>
        <input type="text" id="cvc" name="cvc" pattern="[0-9]{3}" placeholder="CVC" required>
        <br><br>
        <label for="cardholder_name">Cardholder name:</label>
        <input type="text" name="cardholder_name" placeholder="Full Name on Card" required>
        <br><br>
        <button type="submit">PAY NOW</button>
    </form>
</body>
</html>
