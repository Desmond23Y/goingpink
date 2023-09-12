<?php
session_start();
include('conn.php'); 

$user_id = $_SESSION['user_id'];
$selectedhotelid = $_SESSION['selected_hotel_id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['number_of_pax']) && isset($_POST['check_in_date']) && isset($_POST['check_out_date'])) {
    $number_of_pax = $_POST['number_of_pax'];
    $check_in_date = $_POST['check_in_date'];
    $check_out_date = $_POST['check_out_date'];

    // Validate user inputs
    if ($number_of_pax < 1) {
        echo "Number of guests must be at least 1.";
    } elseif (strtotime($check_in_date) >= strtotime($check_out_date)) {
        echo "Invalid check-in or check-out dates.";
    } else {
        // Check if the selected hotel ID exists in the hotel_information table
        $check_hotel_query = "SELECT * FROM hotel_information WHERE hotel_id = '$selectedhotelid'";
        $result = mysqli_query($con, $check_hotel_query);

        if (mysqli_num_rows($result) == 0) {
            echo "Selected hotel not found.";
        } else {
            // Insert the hotel booking
            $hotel_booking_query = "INSERT INTO hotel_booking (user_id, hotel_id, number_of_pax, check_in_date, check_out_date) 
                                    VALUES ('$user_id', '$selectedhotelid', '$number_of_pax', '$check_in_date', '$check_out_date')";
            
            if (mysqli_query($con, $hotel_booking_query)) {
                header('Location: viewtransport.php');
            } else {
                echo "Error: " . mysqli_error($con);
            }
        }

        mysqli_close($con);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Hotel Booking</title>
</head>
<body>
    <h2>Book a Hotel</h2>
    <form id="hotel-booking-form" method="POST" action="">
        <label for="number_of_pax">Number of Guests:</label>
        <input type="number" id="number_of_pax" name="number_of_pax" min="1" required><br><br>

        <label for="check_in_date">Check-In Date:</label>
        <input type="date" id="check_in_date" name="check_in_date" required><br><br>

        <label for="check_out_date">Check-Out Date:</label>
        <input type="date" id="check_out_date" name="check_out_date" required><br><br>

        <button type="submit">Book Hotel</button>
    </form>
    <p id="booking-message"></p>
</body>
</html>


