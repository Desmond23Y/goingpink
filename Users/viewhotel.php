<?php
session_start();
include("../conn.php");

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../login.php');
    exit();
}

// Initialize a variable to store the selected hotel ID
$selectedHotelID = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['book_hotel'])) {
    // If a hotel is selected for booking, store its ID in the session
    $selectedHotelID = $_POST['book_hotel'];
    $_SESSION['selected_hotel_id'] = $selectedHotelID;


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
    <link rel="stylesheet" href="viewhotel.css">
</head>
<body>
        <h1>Hotel Viewing</h1>

    <li class="hotel-item">
        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                 // Check for type of car and display the image accordingly
                 if ($row["hotel_name"] == "Secret View Hotel") {
                    echo '<img src="../picture/hotel/secretrecipehotel.jpg" alt="sr-hotel">';
                } elseif ($row["hotel_name"] == "Northern Resort") {
                    echo '<img src="../picture/hotel/nn.jpg" alt="nn-hotel">';
                } elseif ($row["hotel_name"] == "Prophecy Hotel") {
                    echo '<img src="../picture/hotel/prophecy.jpg" alt="p-hotel">';
                } elseif ($row["hotel_name"] == "Jade Forest Hotel") {
                    echo '<img src="../picture/hotel/jf.jpg" alt="jf-hotel">';
                } elseif ($row["hotel_name"] == "Ancient Manor Hotel & Sp") {
                    echo '<img src="../picture/hotel/am.jpg" alt="am-hotel">';
                } elseif ($row["hotel_name"] == "China Town Hotel") {
                    echo '<img src="../picture/hotel/ct.jpg" alt="ct-hotel">';
                } elseif ($row["hotel_name"] == "Vanilla Hotel & Spa") {
                    echo '<img src="../picture/hotel/vhs.jpg" alt="vhs-hotel">';
                }elseif ($row["hotel_name"] == "Coast Hotel") {
                    echo '<img src="../picture/hotel/d1.jpg" alt="d1-hotel">';
                } elseif ($row["hotel_name"] == "Elegant Relax Hotel") {
                    echo '<img src="../picture/hotel/d2.jpg" alt="d2-hotel">';
                } else {
                     echo '<img src="../picture/hotel/defaulthotel.jpg" alt="defaul-hotel">';
                }

                echo '<h3> Hotel Name: <span class="thin-font"> ' . $row["hotel_name"] . '</span></h3>';
                echo '<h3> Room Type:<span class="thin-font"> ' . $row["room_type"] . '</span></h3>';
                echo '<h3> Room Availability: <span class="thin-font">' . $row["room_availability"] . '</span></h3>';
                echo '<h3> Hotel Availability:<span class="thin-font"> ' . $row["hotel_availability"] . '</span></h3>';
                echo '<h3> Hotel Price: <span class="thin-font">US$ ' . $row["hotel_price"] . '</span></h3>';
                echo '<form method="POST" action="">';
                echo '<button type="submit" style="font-weight:bold" name="book_hotel" value="' . $row["hotel_id"] . '">Book This Hotel</button>';
                echo '</form>';
                echo '<br>';
                echo '<br>';
                echo '<br>';
                }
            }
         else {
            echo "No hotels available.";
        }
        ?>
    </li>
</body>
</html>
