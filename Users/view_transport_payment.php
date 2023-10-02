<?php
session_start();
include('conn.php');

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

if (isset($_GET['transport_id'])) {
    $transport_id = $_GET['transport_id'];
    $result = mysqli_query($con, "SELECT * FROM transport_booking WHERE transport_id = '$transport_id");
    if (!$result) {
        die('Query Error: ' . mysqli_error($con));
    }
}
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Summary</title>
    <link rel="stylesheet" href=".css">
</head>

<body>
<h1>Fare Summary</h1>
    <div class="box">
        <form action="" method="POST">
    </div>
</body>
</html>
