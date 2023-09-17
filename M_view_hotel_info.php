<?php
session_start();
include('conn.php');

if (!isset($_SESSION['transport_manager_id'])) {
    header('Location: login.php');
    exit();
}

$sql = "SELECT * FROM hotel_information";
$result = $conn->query($sql);
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Information</title>
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
<h1>Hotel Information</h1>
    <div class="box">
        <?php
            if ($result->num_rows > 0) {
                echo "<table>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<tr>" . $row['column1'] . "</tr>";
                    echo "<tr>" . $row['column2'] . "</tr>";
                    echo "<tr>" . $row['column3'] . "</tr>";
                    echo "<tr>" . $row['column4'] . "</tr>";
                    echo "<tr>" . $row['column5'] . "</tr>";
                    echo "</tr>";
                }
            echo "</tabl>";
} else {
    echo "No data found";

$conn->close();
?>
    </div>
</body>
</html>
