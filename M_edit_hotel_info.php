<?php
session_start();
include('conn.php');

$selectedHotelID = null;

$result = mysqli_query($con, "SELECT * FROM hotel_information");
if (!$result) {
    die('Query Error: ' . mysqli_error($con));
}
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Hotel Information</title>
    <link rel="stylesheet" href="M_navibar.css">
     <nav>
        <ul class="navibar">
            <li><a href="M_hotel_homepage.php">HOME</a></li>
            <li><a href="M_view_hotel_info.php">HOTELS</a></li>
            <li><a href="M_viewbooking.php">BOOKING</a></li>
            <li><a href="M_room_availability.php">ROOM AVAILABILITY</a></li>
            <li><a href="logout.php" class="right">LOGOUT</a></li>
        </ul>
    </nav>
</head>
  
<body>
<h1>Edit Hotel Information</h1>
<div class="box">
<form action="M_edit_hotel_info.php" method="post">
        <label for="name">Hotel Name: </label>
        <input type="text" id="hotelName" name="hotelName" required>
        <label for="name">Room Type: </label>
        <input type="text" id="roomType" name="roomType" required>
        <label for="name">Hotel Availability: </label>
        <input type="number" id="hotelAvailability" name="hotelAvailability" required>
        <label for="name">Hotel Price: </label>
        <input type="text" id="hotelPrice" name="hotelPrice" required>
        <br><br>
        <input type="submit" value= Save Changes">
</form>
</div>
