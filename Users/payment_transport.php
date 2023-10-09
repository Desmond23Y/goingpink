<?php
session_start();
include('conn.php');

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../login.php');
    exit();
}

$user_id = $_SESSION['user_id'];

// Fetch the user's latest transport booking
$transport_query = "SELECT transport_booking_id, transport_total_price 
               FROM transport_booking 
               WHERE user_id = '$user_id'
               ORDER BY transport_booking_id DESC
               LIMIT 1"; // Fetch only the latest booking
$transport_result = mysqli_query($con, $transport_query);

if (!$transport_result) {
    die('Query Error: ' . mysqli_error($con));
}

// Fetch the transport booking data
if (mysqli_num_rows($transport_result) > 0) {
    $transport_data = mysqli_fetch_assoc($transport_result);
    $transport_booking_id = $transport_data['transport_booking_id'];
    $transport_total_price = $transport_data['transport_total_price'];

    // Insert the booking data into the invoice table
    $insert_invoice_query = "INSERT INTO invoice (user_id, transport_booking_id, total_amount)
                             VALUES ('$user_id', '$transport_booking_id', '$transport_total_price')";
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
    </script>
</head>
<body>
    <h2>Payment Details</h2>
    <form action="invoice.php" method="POST" onsubmit="showPaymentStatus">
        <label for="card_information">Card Information:</label>
        <input type="text" name="card_information" pattern="[0-9]{16}" placeholder="1234 1234 1234 1234" required>
        <br><br>
        <label for="expiration_date">Expiration Date:</label>
        <input type="text" id="expiration_date" name="expiration_date" pattern="^(0[1-9]|1[0-2])\/\d{2}$" placeholder="MM/YY" required>
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