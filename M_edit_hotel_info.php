<?php
session_start();
include('conn.php');

if (isset($_GET['hotel_id'])) {
    $hotel_id = $_GET['hotel_id']; // Corrected variable name

    $query = "SELECT * FROM hotel_information WHERE hotel_id = ?";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "i", $hotel_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        $hotelName = $row['hotel_name'];
        $roomType = $row['room_type'];
        $hotelAvailability = $row['hotel_availability'];
        $hotelPrice = $row['hotel_price'];
    } else {
        echo "Hotel not found.";
        exit();
    }
} else {
    echo "Hotel ID not provided.";
    exit();
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
            <li><a href="M_hotel_availability.php">HOTEL AVAILABILITY</a></li>
            <li><a href="logout.php" class="right">LOGOUT</a></li>
        </ul>
    </nav>
</head>
  
<body>
    <h1>Edit Hotel Information</h1>
    <div class="box">
        <form action="M_edit_hotel_info.php?hotel_id=' . $row['hotel_id'] . '" method="POST">
            <label for="hotelName">Hotel Name: </label>
            <input type="text" id="hotelName" name="hotelName" required value="<?php echo $hotelName; ?>">
            <br><br>
            <label for="roomType">Room Type: </label>
            <input type="text" id="roomType" name="roomType" required value="<?php echo $roomType; ?>">
            <br><br>
            <label for="hotelAvailability">Hotel Availability: </label>
            <input type="text" id="hotelAvailability" name="hotelAvailability" required value="<?php echo $hotelAvailability; ?>">
            <br><br>
            <label for="hotelPrice">Hotel Price: </label>
            <input type="number" id="hotelPrice" name="hotelPrice" required value="<?php echo $hotelPrice; ?>">
            <br><br>
            <input type="submit" value="Save Changes">
        </form>
    </div>
</body>
</html>

<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newHotelName = $_POST['hotelName'];
    $newRoomType = $_POST['roomType'];
    $newHotelAvailability = $_POST['hotelAvailability'];
    $newHotelPrice = $_POST['hotelPrice'];

    $updateQuery = "UPDATE hotel_information SET hotel_name = ?, room_type = ?, hotel_availability = ?, hotel_price = ? WHERE hotel_id = ?";
    $stmt = mysqli_prepare($con, $updateQuery);
    mysqli_stmt_bind_param($stmt, "ssidi", $newHotelName, $newRoomType, $newHotelAvailability, $newHotelPrice, $hotel_id);
    $updateResult = mysqli_stmt_execute($stmt);

    if ($updateResult) {
        header('Location: M_view_hotel_info.php');
        exit();
    } else {
        echo 'Error updating hotel information: ' . mysqli_error($con);
    }
}

?>