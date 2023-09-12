<?php
session_start();
include('conn.php');

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}
// Include the navigation bar
include('navi_bar.php');

$result = mysqli_query($con, "SELECT * FROM hotel_information");
if (!$result) {
    die('Query Error: ' . mysqli_error($con));
}

// Initialize a variable to store the selected hotel ID
$selectedHotelID = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['book_hotel'])) {
    // If a hotel is selected for booking, store its ID in the session
    $selectedHotelID = $_POST['book_hotel'];
    $_SESSION['selected_hotel_id'] = $selectedHotelID;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Going Pink Hotel Viewing</title>
    <link rel="stylesheet" href="style_booking.css">
</head>
<body>
    <header>
        <h1>Hotel Viewing</h1>
    </header>

    <div class="box">
        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<h3> Hotel Name: ' . $row["hotel_name"] . '</h3>';
                echo '<h3> Room Type: ' . $row["room_type"] . '</h3>';
                echo '<h3> Room Availability: ' . $row["room_availability"] . '</h3>';
                echo '<h3> Hotel Availability: ' . $row["hotel_availability"] . '</h3>';
                echo '<h3> Hotel Price: US$ ' . $row["hotel_price"] . '</h3>';
                
                // Check the user type to determine what to display
                if ($_SESSION['user_type'] == 'admin' || $_SESSION['user_type'] == 'hotel_management') {
                    // Admins and hotel managers can edit hotel information
                    echo '<a href="edithotel.php?hotel_id=' . $row["hotel_id"] . '">Edit This Hotel</a>';
                } elseif ($_SESSION['user_type'] == 'user') {
                    // Regular users can book hotels
                    echo '<form method="POST" action="hotelbooking.php">';
                    echo '<input type="hidden" name="book_hotel" value="' . $row["hotel_id"] . '">';
                    echo '<button type="submit">Book This Hotel</button>';
                    echo '</form>';
                }
            }
        } else {
            echo "No hotels available.";
        }
        ?>
    </div>
</body>
</html>
