<?php
session_start();
include('conn.php');

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

if (isset($_GET['hotel_id'])) {
$hotel_id = $_GET['hotel_id'];
$result = mysqli_query($con, "SELECT * FROM hotel_booking WHERE hotel_id = $hotel_id");
if (!$result) {
    die('Query Error: ' . mysqli_error($con));
}
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Information</title>
    <link rel="stylesheet" href=".css">
</head>

<body>
<h1>Fare Summary</h1>
    <div class="box">
        <form action="" method="POST"
    </div>
</body>
</html>
