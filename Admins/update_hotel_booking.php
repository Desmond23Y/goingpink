<!DOCTYPE html>
<head>
    <title>Update Hotel Booking</title>
</head>

<body>
    <h2>Booking Update</h2>
    <?php
        include("conn.php");
        if (isset($_GET['hotel_booking_id'])) {
            $hotel_booking_id = $_GET['hotel_booking_id']; 
            $result = mysqli_query($con, "SELECT * FROM hotel_booking WHERE hotel_booking_id = '$hotel_booking_id'");

            while ($row = mysqli_fetch_array($result)) {
                if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['numpax']) && isset($_POST['indate']) && isset($_POST['outdate'])) {
                    $number_of_pax = $_POST['numpax'];
                    $check_in_date = $_POST['indate'];
                    $check_out_date = $_POST['outdate'];

                    if ($number_of_pax < 1) {
                        echo "Number of guests must be at least 1.";
                    } elseif (strtotime($check_in_date) >= strtotime($check_out_date)) {
                        echo "Invalid check-in or check-out dates.";
                    } else {
                        $update_query = "UPDATE hotel_booking SET
                           number_of_pax = ?,
                           check_in_date = ?,
                           check_out_date = ?
                           WHERE hotel_booking_id = ?";

                        $update_stmt = mysqli_prepare($con, $update_query);
                        mysqli_stmt_bind_param($update_stmt, "isss", $number_of_pax, $check_in_date, $check_out_date, $hotel_booking_id);

                        if (mysqli_stmt_execute($update_stmt)) {
                            echo "<script>alert('Hotel booking information has been updated!');</script>";
                        } else {
                            echo "Error updating hotel booking information: " . mysqli_error($con);
                        }
                    }
                }

                // Display hotel_booking information and form
    ?>
                <p>
                    <label> Hotel Booking ID: </label>
                    <input name='hbid' readonly='readonly' value="<?php echo $row['hotel_booking_id']?>">
                </p>
                
                 <p>
                    <label> Hotel Manager ID: </label>
                    <input name='hmid' readonly='readonly' value="<?php echo $row['hotel_manager_id']?>">
                </p>
                
                <p>
                    <label> User ID: </label>
                    <input name='uid' readonly='readonly' value="<?php echo $row['user_id']?>">
                </p>

                <p>
                    <label> Admin ID: </label>
                    <input name='aid' readonly='readonly' value="<?php echo $row['admin_id']?>">
                </p>
    
                <p>
                    <label> Hotel ID: </label>
		    <input name='hid' readonly='readonly' value="<?php echo $row['hotel_id']?>">
		</p>
                
                <p>
                    <form method="post">
                        <label for="numpax">Number of Pax:</label>
                        <input type="number" id="numpax" name="numpax" required="required" value="<?php echo $row['number_of_pax']?>"><br><br>
                        
                        <label for="indate">Check in date:</label>
                        <input type="date" id="indate" name="indate" required="required" value="<?php echo $row['check_in_date']?>"><br><br>
                        
                        <label for="outdate">Check out date:</label>
                        <input type="date" id="outdate" name="outdate" required="required" value="<?php echo $row['check_out_date']?>"><br><br>

                        <button type="submit" value="submit">Edit Booking</button>
                    </form><br>
                </p>
    <?php
            }
            mysqli_close($con);
        } else {
            echo "Hotel Booking ID not provided.";
        }
    ?>
</body>
</html>
