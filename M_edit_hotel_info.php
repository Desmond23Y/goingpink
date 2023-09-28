<?php
session_start();
include('conn.php');

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

if (isset($_GET['hotel_id'])) {
    $hotel_id = $_GET['hotel_id'];

    $fetch_hotel_query = "SELECT * FROM hotel_information WHERE hotel_id = ?";
    $stmt = mysqli_prepare($con, $fetch_hotel_query);
    mysqli_stmt_bind_param($stmt, "s", $hotel_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        $hotel_name = $row['hotel_name'];
        $room_type = $row['room_type'];
        $hotel_availability = $row['hotel_availability'];
        $hotel_price = $row['hotel_price'];
    } else {
        echo "Hotel not found.";
        exit();
    }
} else {
    echo "Hotel ID not provided.";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $hotel_name = $_POST['hotel_name'];
    $room_type = $_POST['room_type'];
    $hotel_availability = $_POST['hotel_availability'];
    $hotel_price = $_POST['hotel_price'];

    $update_hotel_query = "UPDATE `hotel_information` SET
    hotel_name = '$hotel_name',
    room_type = '$room_type',
    hotel_availability = '$hotel_availability',
    hotel_price = '$hotel_price'
    WHERE hotel_id = '$hotel_id'";

    $update_stmt = mysqli_prepare($con, $update_hotel_query);
    mysqli_stmt_bind_param($update_stmt, "ssssi", $hotelName, $roomType, $hotelAvailability, $hotelPrice, $hotel_id);

    if (mysqli_stmt_execute($update_stmt)) {
        echo "<script>alert('Hotel information has been updated!');</script>";
    } else {
        echo "Error updating hotel information: " . mysqli_error($con);
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
            <li><a href="M_hotel_availability.php">HOTEL AVAILABILITY</a></li>
            <li><a href="logout.php" class="right">LOGOUT</a></li>
        </ul>
    </nav>
</head>
  
<body>
    <h1>Edit Hotel Information</h1>
    <div class="box">
        <form action=M_view_hotel_info.php method="POST">
        <input type="hidden" name="hotel_id" value="<?php echo $hotel_id; ?>">
            <label for="hotel_name">Hotel Name: </label>
            <input type="text" id="hotel_name" name="hotel_name" required value="<?php echo $hotel_name; ?>">
            <br><br>
            <label for="room_type">Room Type: </label>
            <input type="text" id="room_type" name="room_type" required value="<?php echo $rooom_type; ?>">
            <br><br>
            <label for="hotel_availability">Hotel Availability: </label>
            <input type="text" id="hotel_availability" name="hotel_availability" required value="<?php echo $hotel_availability; ?>">
            <br><br>
            <label for="hotel_price">Hotel Price: </label>
            <input type="number" id="hotel_price" name="hotel_price" required value="<?php echo $hotel_price; ?>">
            <br><br>
            <input type="submit" name="submit" value="Save Changes">
        </form>
    </div>
</body>
</html>