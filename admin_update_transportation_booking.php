<!DOCTYPE html>
<head>
    <title>Edit Transport Booking</title>
</head>

<body>
    <h2>Edit Booking Information</h2>
    <?php
        include("conn.php");
        $t_booking=intval($_GET['transport_booking_id']); 
        $result=mysqli_query($con,"SELECT* FROM transportation_booking WHERE id=$t_booking");
        while($row=mysqli_fetch_array($result))
        {
        $sql="UPDATE transportation_booking SET
        arrival_time = '$_POST[atime]',
        departure_time = '$_POST[dtime]',
        arrival_location = '$_POST[alocation]',
        departure_location = '$_POST[dlocation]',
        WHERE transport_booking_id = $t_booking;";

        if (mysqli_query($con,$sql)) {
            mysqli_close($con);
        }

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

        <p>
        <label> Arrival Location: </label>
		<input type='text' name="alocation" required="required" value="<?php echo $row['arrival_location']?>">
		</p>

        <p>
        <label> Departure Location: </label>
		<input type='text' name="dlocation" required="required" value="<?php echo $row['departure_location']?>">
		</p>

        <button type="submit" value="Submit">Update Booking</button>
        
    </form><br>
    <?php
    }mysqli_close($con);
    ?>
</body>
</html>