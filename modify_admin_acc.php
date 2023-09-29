<?php
// Include the database connection
include("conn.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get admin_id from the URL parameter
    $admin_id = $_GET['admin_id'];

    // Validate and sanitize the admin_id (you should implement proper validation)
    // For now, we assume it's a valid admin_id

    $username = $_POST['name'];
    $password = $_POST['password'];

    // Use prepared statements to prevent SQL injection
    $update_sql = "UPDATE admin SET username = ?, password = ? WHERE admin_id = ?";
    $update_stmt = mysqli_prepare($con, $update_sql);
    mysqli_stmt_bind_param($update_stmt, "sss", $username, $password, $admin_id);

    if (mysqli_stmt_execute($update_stmt)) {
        echo "<script>alert('This admin account has been modified!');</script>";
    } else {
        echo "Error updating admin account: " . mysqli_error($con);
    }

    mysqli_close($con);
}

// Fetch the admin data based on admin_id
$admin_id = $_GET['admin_id'];
$result = mysqli_query($con, "SELECT * FROM admin WHERE admin_id = '$admin_id'");
$row = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Modify Admin Account</title>
</head>
<body>
    <h2>Admin Account Modification</h2>
    <form method="post" action="modify_admin_acc.php?admin_id=<?php echo $admin_id; ?>">
        <label for="name">Username:</label>
        <input type="text" id="name" name="name" required="required" value="<?php echo $row['username']; ?>"><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" maxlength="50" required value="<?php echo $row['password']; ?>"><br><br>

        <button type="submit">Edit Admin Account</button>
    </form>
</body>
</html>

