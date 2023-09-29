<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include("conn.php");
    
    if (strlen($_POST['name']) < 5 || strlen($_POST['name']) > 50) {
        echo "Length of username must be between 5 and 50 characters.";
    } elseif (strlen($_POST['password']) < 5 || strlen($_POST['password']) > 50) {
        echo "Password length must be between 5 and 50 characters. Please try again.";
    } else {
        $admin_id = intval($_GET['admin_id']);
        $username = $_POST['name'];
        $password = $_POST['password'];
        
        // Use prepared statements to prevent SQL injection
        $update_sql = "UPDATE admin SET username = ?, password = ? WHERE admin_id = ?";
        $update_stmt = mysqli_prepare($con, $update_sql);
        mysqli_stmt_bind_param($update_stmt, "ssi", $username, $password, $admin_id);
        
        if (mysqli_stmt_execute($update_stmt)) {
            echo "<script>alert('This admin account has been modified!');</script>";
        } else {
            echo "Error updating admin account: " . mysqli_error($con);
        }

        mysqli_close($con);
    }
}

// Fetch the admin data before the HTML form
$admin_id = intval($_GET['admin_id']);
$result = mysqli_query($con, "SELECT * FROM admin WHERE admin_id = $admin_id");
$row = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<body>
    <form method="post">
        <label for="name">Username:</label>
        <input type="text" id="name" name="name" required="required" value="<?php echo $row['username']; ?>"><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" maxlength="50" required value="<?php echo $row['password']; ?>"><br><br>

        <button type="submit">Edit Admin Account</button>
    </form>
</body>
</html>
