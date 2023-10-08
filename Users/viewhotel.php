<?php
session_start();
include('conn.php');

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../login.php');
    exit();
}

// Initialize variables to store the selected hotel ID and price
$selectedHotelID = null;
$selectedHotelPrice = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['book_hotel'])) {
    // If a hotel is selected for booking, store its ID and price in the session
    $selectedHotelID = $_POST['book_hotel'];
    
    // Retrieve the hotel price from the database based on the selected ID
    $result = mysqli_query($con, "SELECT hotel_price FROM hotel_information WHERE hotel_id = $selectedHotelID");
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $selectedHotelPrice = $row["hotel_price"];
    }
    
    $_SESSION['selected_hotel_id'] = $selectedHotelID;
    $_SESSION['selected_hotel_price'] = $selectedHotelPrice;

    // Redirect to the hotel booking page
    header('Location: hotelbooking.php');
    exit();
}

// Include the navigation bar (moved here to avoid output before header)
include('../navi_bar.php');

$result = mysqli_query($con, "SELECT * FROM hotel_information");
if (!$result) {
    die('Query Error: ' . mysqli_error($con));
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Going Pink Hotel Viewing</title>
    <link rel="stylesheet" href="view_rating.css">
</head>
<body>
    <header>
        <h1>Hotel Viewing</h1>
    </header>

    <li class="box">
        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<h3> Hotel Name: ' . $row["hotel_name"] . '</h3>';
                echo '<h3> Room Type: ' . $row["room_type"] . '</h3>';
                echo '<h3> Room Availability: ' . $row["room_availability"] . '</h3>';
                echo '<h3> Hotel Availability: ' . $row["hotel_availability"] . '</h3>';
                echo '<h3> Hotel Price: US$ ' . $row["hotel_price"] . '</h3>';
                echo '<form method="POST" action="">';
                echo '<button type="submit" name="book_hotel" value="' . $row["hotel_id"] . '">Book This Hotel</button>';
                echo '</form>';
                }
            }
         else {
            echo "No hotels available.";
        }
        ?>
    </li>
</body>
</html>
