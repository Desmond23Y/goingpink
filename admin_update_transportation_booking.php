<!DOCTYPE html>
<head>
    <title>Update Transportation Booking</title>
</head>

<body>
    <h2>Booking Update</h2>
    <?php
        include("conn.php");
        if (isset($_GET['transport_booking_id'])) {
            $transport_booking_id = $_GET['transport_booking_id']; 
            $result = mysqli_query($con, "SELECT * FROM transportation_booking WHERE transport_booking_id = '$transport_booking_id'");
            
            while ($row = mysqli_fetch_array($result)) {
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Handle form submission and update database here
                    $transport_booking_id = $row['transport_booking_id']; // Get the transport_booking_id from the row
                    $arrival_time = $_POST['atime'];
                    $departure_time = $_POST['dtime'];
                    $arrival_location = $_POST['alocation'];
                    $departure_location = $_POST['dlocation'];
                            
                // Use prepared statements to prevent SQL injection
                    $update_sql = "UPDATE transportation_booking SET
                        arrival_time = ?,
                        departure_time = ?,
                        arrival_location = ?,
                        departure_location = ?
                        WHERE transport_booking_id = ?";
                    
                    $update_stmt = mysqli_prepare($con, $update_sql);
                    mysqli_stmt_bind_param($update_stmt, "sssss", $atime, $dtime, $alocation, $dlocation, $transport_booking_id);
    		    
                    
                    if (mysqli_stmt_execute($update_stmt)) {
                        echo "<script>alert('Transport booking information has been updated!');</script>";
                    } else {
                        echo "Error updating transport booking information: " . mysqli_error($con);
                    }
                }
                
                // Display transport_booking information and form
    ?>
                <p>
                    <label> Transport Booking ID: </label>
                    <input name='tbid' readonly='readonly' value="<?php echo $row['transport_booking_id']?>">
                </p>
                
                <p>
                    <label> Transport Manager ID: </label>
                    <input name='tmid' readonly='readonly' value="<?php echo $row['transport_manager_id']?>">
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
                    <label> Transport ID: </label>
                    <input name='tid' readonly='readonly' value="<?php echo $row['transport_id']?>">
                </p>

                <p>
                <form method="post">
                    <label for="atime"> Select an Arrival Time: </label>
                    <input type="time" name="atime" id="atime" required="required" value="<?php echo $row['arrival_time']?>">
                <br>

                    <label for="dtime"> Select a Departure Time: </label>
                    <input type="time" name="dtime" id="dtime" required="required" value="<?php echo $row['departure_time']?>">
                <br>

                    <label> Arrival Location: </label>
                    <input type='text' name="alocation" required="required" value="<?php echo $row['arrival_location']?>">
                <br>

                    <label> Departure Location: </label>
                    <input type='text' name="dlocation" required="required" value="<?php echo $row['departure_location']?>">
                <br>

                <button type="submit" value="Submit">Update Booking</button>
                </form><br>
    <?php
            }
            mysqli_close($con);
        } else {
            echo "Transport Booking ID not provided.";
        }
    ?>
</body>
</html>
