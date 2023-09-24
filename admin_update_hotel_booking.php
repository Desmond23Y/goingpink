<!DOCTYPE html>
<head>
    <title>Edit Hotel Booking</title>
</head>

<body>
    <h2>Edit Booking Information</h2>
    <?php
        include("conn.php");
        $h_booking=intval($_GET['hotel_booking_id']); 
        $result=mysqli_query($con,"SELECT* FROM hotel_booking WHERE id=$h_booking");
        while($row=mysqli_fetch_array($result))
        {
        $sql="UPDATE hotel_booking SET
        number_of_pax = '$_POST[numpax]',
        check_in_date = '$_POST[indate]',
        check_out_date = '$_POST[outdate]',
        WHERE hotel_booking_id = $h_booking;";

        if (mysqli_query($con,$sql)) {
            mysqli_close($con);
        }

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
            <input type="number" id="numpax" name="numpax" required="required" value="<?php echo $row['number_of_pax']?>"><br>

            <label for="indate">Check in date:</label>
            <input type="date" id="indate" name="indate" required="required" value="<?php echo $row['check_in_date']?>"><br>

            <label for="outdate">Check out date:</label>
            <input type="date" id="outdate" name="outdate" required="required" value="<?php echo $row['check_out_date']?>"><br>
            
            <button type="submit" value="submit">Edit Booking</button>
    </form><br>
    <?php
    }mysqli_close($con);
    ?>
</body>
</html>