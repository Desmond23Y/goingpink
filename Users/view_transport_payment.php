<?php
session_start();
include('conn.php');

if (!isset($_SESSION['user_id'])) {
    header('Location: ../login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Retrieve data sent through AJAX
    $userId = isset($_GET['user_id']) ? $_GET['user_id'] : '';
    $transportId = isset($_GET['transport_id']) ? $_GET['transport_id'] : '';
    $arrivalLocation = isset($_GET['arrival_location']) ? $_GET['arrival_location'] : '';
    $departureLocation = isset($_GET['departure_location']) ? $_GET['departure_location'] : '';
    $arrivalTime = isset($_GET['arrival_time']) ? $_GET['arrival_time'] : '';
    $departureTime = isset($_GET['departure_time']) ? $_GET['departure_time'] : '';
    $price = isset($_GET['price']) ? $_GET['price'] : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Successful</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }

        .payment-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            max-width: 400px;
            margin: 0 auto;
            text-align: center;
        }

        h2 {
            color: #007bff;
        }

        p {
            font-size: 18px;
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <div class="payment-container">
        <h2>Payment Successful</h2>
        <p>User ID: <?php echo $userId; ?></p>
        <p>Transport ID: <?php echo $transportId; ?></p>
        <p>Arrival Location: <?php echo $arrivalLocation; ?></p>
        <p>Departure Location: <?php echo $departureLocation; ?></p>
        <p>Arrival Time: <?php echo $arrivalTime; ?></p>
        <p>Departure Time: <?php echo $departureTime; ?></p>
        <p>Price: <?php echo $price; ?></p>
    </div>
</body>
</html>

<?php
} else {
    // Invalid request
    echo "Invalid request.";
}
?>