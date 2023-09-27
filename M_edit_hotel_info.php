<?php
session_start();
include('conn.php');

if (isset($_GET['hotel_id']) && is_numeric($_GET['hotel_id'])) {
    $hotelID = mysqli_real_escape_string($con, $_GET['hotel_id']);

    $query = "SELECT * FROM hotel_information WHERE hotel_id = $hotelID";
    $result = mysqli_query($con, $query);

    echo "Debugging information:<br>";
    echo "hotelID: $hotelID<br>";
    echo "Query: $query<br>";

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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $newHotelName = $_POST['hotelName'];
    $newRoomType = $_POST['roomType'];
    $newHotelAvailability = $_POST['hotelAvailability'];
    $newHotelPrice = $_POST['hotelPrice'];

    // Update the hotel information in the database
    $updateQuery = "UPDATE hotel_information SET hotel_name = '$newHotelName', room_type = '$newRoomType', hotel_availability = $newHotelAvailability, hotel_price = '$newHotelPrice' WHERE hotel_id = $hotelID";
    $updateResult = mysqli_query($con, $updateQuery);

    if ($updateResult) {
        // Redirect back to the hotel view page or show a success message
        header('Location: M_view_hotel_info.php');
        exit();
    } else {
        echo 'Error updating hotel information: ' . mysqli_error($con);
    }
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
        <label for="hotelName">Hotel Name: </label>
        <input type="text" id="hotelName" name="hotelName" required value="<?php echo $hotelName; ?>">
    <br><br>
        <label for="roomType">Room Type: </label>
        <input type="text" id="roomType" name="roomType" required value="<?php echo $roomType; ?>">
    <br><br>
        <label for="hotelAvailability">Hotel Availability: </label>
        <input type="number" id="hotelAvailability" name="hotelAvailability" required value="<?php echo $hotelAvailability; ?>">
    <br><br>
        <label for="hotelPrice">Hotel Price: </label>
        <input type="text" id="hotelPrice" name="hotelPrice" required value="<?php echo $hotelPrice; ?>">
        <br><br>
        <input type="submit" value="Save Changes">
</form>
</div>