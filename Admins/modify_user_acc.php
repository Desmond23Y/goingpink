<?php
// Include the database connection
include("conn.php");

if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id']; 
    $result = mysqli_query($con, "SELECT * FROM user WHERE user_id = '$user_id'");

    while ($row = mysqli_fetch_array($result)) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['name'];
            $password = $_POST['password'];
            $first_name = $_POST['fname'];
            $last_name = $_POST['lname'];
            $email = $_POST['email'];
            $phone_number = $_POST['phone_no'];
            $date_of_birth = $_POST['dob'];
            $gender = $_POST['gender'];

            // Data validation
            if (strlen($username) < 5 || strlen($username) > 50) {
                echo "Length of username must be between 5 and 50 characters.";
            } elseif (strlen($password) < 5 || strlen($password) > 50) {
                echo "Password length must be between 5 and 50 characters. Please try again.";
            } elseif (!preg_match('/[A-Z]/', $password)) {
                echo "Password must contain at least one UPPERCASE letter. Please try again.";
            } elseif (!preg_match('/[a-z]/', $password)) {
                echo "Password must contain at least one lowercase letter. Please try again.";
            } elseif (!preg_match('/[^a-zA-Z0-9]/', $password)) {
                echo "Password must contain at least one special character. Please try again.";
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo "Invalid email address. Please try again.";
            } elseif (strlen($phone_number) < 9 || strlen($phone_number) > 12) {
                echo "Invalid phone number. Please try again.";
            } else {
                // Handle form submission and update database here
                $user_id = $row['user_id']; // Get the user_id from the row

                // Use prepared statements to prevent SQL injection
                $update_sql = "UPDATE user SET
                    username = ?,
                    password = ?,
                    first_name = ?,
                    last_name = ?,
                    email = ?,
                    phone_number = ?,
                    date_of_birth = ?,
                    gender = ?
                    WHERE user_id = ? ;";

                $update_stmt = mysqli_prepare($con, $update_sql);
                mysqli_stmt_bind_param($update_stmt, "sssssssss", $username, $password, $first_name, $last_name, $email, $phone_number, $date_of_birth, $gender, $user_id);

                if (mysqli_stmt_execute($update_stmt)) {
                    echo "<script>alert('This user account has been modified!');</script>";
                } else {
                    echo "Error updating user account: " . mysqli_error($con);
                }
            }
        }
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title>Modify User Account</title>
            <link rel="stylesheet" href="modifyuseracc.css">
        </head>
        <body>
            <h2>User Account Modification</h2>
            <form method="post" action="modify_user_acc.php?user_id=<?php echo $user_id; ?>">
                <label for="name">Username:</label>
                <input type="text" id="name" name="name" required="required" value="<?php echo $row['username']; ?>">
                <br><br>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" maxlength="50" required value="<?php echo $row['password']; ?>">
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
            </form>
        <?php
        }
        mysqli_close($con);
    } else {
        echo "User ID not provided.";
    }
?>
</body>
</html>
