<?php
session_start();
include('conn.php');

if (isset($_GET['hotel_id'])) {
    $hotel_id = $_GET['hotel_id']; 
    $result = mysqli_query($con, "SELECT * FROM hotel_information WHERE hotel_id = '$hotel_id'");

    while ($row = mysqli_fetch_array($result)) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $hotel_id = $row['hotel_id'];
            $hotel_name = $_POST['hotel_name'];
            $room_type = $_POST['room_type'];
            $room_availability = $_POST['room_availability'];
            $hotel_availability = $_POST['hotel_availability'];
            $hotel_price = $_POST['hotel_price'];

            $update_sql = "UPDATE hotel_information SET
                hotel_name = ?,
                room_type = ?,
                room_availability = ?,
                hotel_availability = ?,
                hotel_price = ?
                WHERE hotel_id = ?";

            $update_stmt = mysqli_prepare($con, $update_sql);
            mysqli_stmt_bind_param($update_stmt, "ssisis", $hotel_name, $room_type, $room_availability, $hotel_availability, $hotel_price, $hotel_id);

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
                <link rel="stylesheet" href="M_hotel_homepage.css">
                <link rel="stylesheet" href="medithotelinfo.css">
                 <nav>
                    <ul class="navibar">
                        <li><a href="M_hotel_homepage.php">HOME</a></li>
                        <li><a href="M_view_hotel_info.php">BACK</a></li>
                        <li><a href="../logout.php" class="right">LOGOUT</a></li>
                    </ul>
                </nav>
            </head>
              
            <body>
                <h1>Edit Hotel Information</h1>
                <div class="box">
                    <form action="M_edit_hotel_info.php?hotel_id=<?php echo $hotel_id; ?>" method="POST">
                        <label for="hotel_id">Hotel ID: </label>
                        <input name="hotel_id" readonly="readonly" value="<?php echo $hotel_id; ?>">
                        <br><br>
                        <label for="hotel_name">Hotel Name: </label>
                        <input type="text" id="hotel_name" name="hotel_name" required value="<?php echo $row['hotel_name']; ?>">
                        <br><br>
                        <label for="room_type">Room Type: </label>
                        <input type="text" id="room_type" name="room_type" required value="<?php echo $row['room_type']; ?>">
                        <br><br>
                        <label for="room_availability">Room Availability: </label>
                        <input type="number" id="room_availability" name="room_availability" required value="<?php echo $row['room_availability']; ?>">
                        <br><br>
                        <label for="hotel_availability">Hotel Availability: </label>
                        <input type="text" id="hotel_availability" name="hotel_availability" required value="<?php echo $row['hotel_availability']; ?>">
                        <br><br>
                        <label for="hotel_price">Hotel Price: </label>
                        <input type="number" id="hotel_price" name="hotel_price" required value="<?php echo $row['hotel_price']; ?>">
                        <br><br>
                        <button type="submit" name="submit" value="Save Changes">Save changes</button>
                    </form>
                </div>
            <?php
            }
            mysqli_close($con);
        } else {
            echo "Hotel ID not provided.";
        }
    ?>
</body>
</html>
