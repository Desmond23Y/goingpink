<!DOCTYPE html>
<head>
    <title>Edit User Account</title>
</head>

<body>
    <h2>Edit User Account</h2>
    <?php
        include("conn.php");
        $uid=intval($_GET['user_id']); 
        $result=mysqli_query($con,"SELECT* FROM user WHERE id=$uid");
        while($row=mysqli_fetch_array($result))
        {
        $sql="UPDATE user SET
        username = '$_POST[name]',
        password = '$_POST[password]',
        first_name = '$_POST[fname]',
        last_name = '$_POST[lname]',
        email = '$_POST[email]',
        phone_number = '$_POST[phone_no]',
        date_of_birth = '$_POST[dob]',
        gender = '$_POST[gender]',
        WHERE user_id = $uid;";

        if (mysqli_query($con,$sql)) {
            mysqli_close($con);
        }

    ?>
    <form method="post">
        <label> User ID: </label>
		<input name='uid' readonly='readonly' value="<?php echo $row['user_id']?>">
		<br><br>
		
		<label> Username: </label>
        <input type="text" id="name" name="name" value="<?php echo $row['username']?>">
        <br><br>

        <label> Password: </label>
        <input type="text" id="password" name="password" value="<?php echo $row['password']?>">
        <br><br>

        <label> First Name: </label>
        <input type="text" id="fname" name="fname" value="<?php echo $row['first_name']?>">
        <br><br>

        <label> Last Name: </label>
        <input type="text" id="lname" name="lname" value="<?php echo $row['last_name']?>">
        <br><br>

        <label> Email: </label>
        <input type="text" id="email" name="email" value="<?php echo $row['email']?>">
        <br><br>

        <label> Phone Number: </label>
        <input type="tel" id="phone_no" name="phone_no" value="<?php echo $row['phone_number']?>">
        <br><br>

        <label> Date of Birth: </label>
        <input type="date" id="dob" name="dob" value="<?php echo $row['date_of_birth']?>">
        <br><br>

        <label> Gender: </label>
		<input type="radio"name="gender"<?php if ($row['gender'] == "Male") { ?> checked="checked" <?php } ?> value="Male"required="required">Male 
		<input type="radio"name="gender"<?php if ($row['gender'] == "Female") { ?> checked="checked" <?php } ?> value="Female"required="required">Female
		<br><br>

        <button type="submit" value="submit">Edit User Account</button>
    </form><br>
    <?php
    }mysqli_close($con);
    ?>
</body>
</html>