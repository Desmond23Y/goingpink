<?php
session_start();
include('conn.php');

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $hotel_name = mysqli_real_escape_string($con, $_POST['hotel_name']);
    $room_type = mysqli_real_escape_string($con, $_POST['room_type']);
    $room_availability = $_POST['room_availability'];
    $hotel_availability = mysqli_real_escape_string($con, $_POST['hotel_availability']);
    $hotel_price = $_POST['hotel_price'];

    // Prepare the SQL statement using placeholders
    $query = "INSERT INTO hotel_information (hotel_name, room_type, room_availability, hotel_availability, hotel_price)
               VALUES (?, ?, ?, ?, ?)";

    // Create a prepared statement
    $stmt = mysqli_prepare($con, $query);

    // Bind the parameters
    mysqli_stmt_bind_param($stmt, 'ssdss', $hotel_name, $room_type, $room_availability, $hotel_availability, $hotel_price);

    // Execute the statement
    if (mysqli_stmt_execute($stmt)) {
        echo "<script>alert('New Hotel has been created successfully!');</script>";
    } else {
        echo "Error creating new hotel: " . mysqli_error($con);
    }

    // Close the statement
    mysqli_stmt_close($stmt);
}
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Hotel Information</title>
    <link rel="stylesheet" href="M_hotel_homepage.css">
    <nav>
        <ul class="navibar">
            <li><a href="M_hotel_homepage.php">HOME</a></li>
            <li><a href="M_view_hotel_info.php">HOTEL INFORMATION</a></li>
            <li><a href="M_view_hotel_booking.php">HOTEL BOOKING</a></li>
            <li><a href="M_add_hotel_info.php">CREATE HOTEL </a></li>
            <li><a href="../logout.php" class="right">LOGOUT</a></li>
        </ul>
    </nav>
</head>

<body>
<h1>New Hotel Information</h1>
    <div class="box">
        <form action="M_view_hotel_info.php" method="POST">
            <label for="hotel_name">Hotel Name: </label>
            <input type="text" id="hotel_name" name="hotel_name" required>
            <br><br>
            <label for="room_type">Room Type: </label>
            <select id="room_type" name="room_type" required>
                <option value="Single Room">Single Room</option>
                <option value="King Room">King Room</option>
                <option value="Queen Room">Queen Room</option>
                <option value="Presidential Suite">Presidential Suite</option>
            </select>
            <br><br>
            <label for="room_availability">Room Availability: </label>
            <input type="number" id="room_availability" name="room_availability" required>
            <br><br>
            <label for="hotel_availability">Hotel Availability: </label>
            <select id="hotel_availability" name="hotel_availability" required>
                <option value="Available">Availability</option>
                <option value="Unavailable">Unavailable</option>
            </select>
            <br><br>
            <label for="hotel_price">Hotel Price: </label>
            <input type="number" id="hotel_price" name="hotel_price" required>
            <br><br>
            <input type="submit" name="submit" value="Create">
        </form>
    </div>
</body>
</html>