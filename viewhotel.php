<?php
include('navi_bar.php');
include('conn.php');

// Check if a hotel has been selected for booking
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['book_hotel'])) {
    $hotel_id_to_book = $_POST['book_hotel'];
    // Redirect to a booking page with the selected hotel ID
    header("Location: book_hotel.php?hotel_id=$hotel_id_to_book");
    exit();
}

$result = mysqli_query($con, "SELECT * FROM hotel_information");
if (!$result) {
    die('Query Error: ' . mysqli_error($con));
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
                echo '<h3> Hotel ID: ' . $row["hotel_id"] . '</h3>';
                echo '<h3> Hotel Name: ' . $row["hotel_name"] . '</h3>';
                echo '<h3> Room Type: ' . $row["room_type"] . '</h3>';
                echo '<h3> Room Availability: ' . $row["room_availability"] . '</h3>';
                echo '<h3> Hotel Availability: ' . $row["hotel_availability"] . '</h3>';
                echo '<h3> Hotel Price: US$ ' . $row["hotel_price"] . '</h3>';
                
                // Add a form to allow users to book this hotel
                echo '<form method="POST" action="">';
                echo '<input type="hidden" name="book_hotel" value="' . $row["hotel_id"] . '">';
                echo '<button type="submit">Book This Hotel</button>';
                echo '</form>';
            }
        } else {
            echo "No hotels available.";
        }
        ?>
    </div>

</body>
</html>
