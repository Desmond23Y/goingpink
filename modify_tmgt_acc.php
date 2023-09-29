<?php
// Include the database connection
include("conn.php");

if (isset($_GET['transport_manager_id'])) {
    $transport_manager_id = $_GET['transport_manager_id']; 
    $result = mysqli_query($con, "SELECT * FROM transport_management WHERE transport_manager_id = '$transport_manager_id'");

    while ($row = mysqli_fetch_array($result)) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Handle form submission and update database here
            $transport_manager_id = $row['transport_manager_id']; // Get the transport_manager_id from the row
            $username = $_POST['name'];
            $password = $_POST['password'];

            // Use prepared statements to prevent SQL injection
            $update_sql = "UPDATE transport_management SET
                username = ?,
                password = ?
                WHERE transport_manager_id = ?";

            $update_stmt = mysqli_prepare($con, $update_sql);
            mysqli_stmt_bind_param($update_stmt, "sss", $username, $password, $transport_manager_id);

            if (mysqli_stmt_execute($update_stmt)) {
                echo "<script>alert('This transport manager account has been modified!');</script>";
            } else {
                echo "Error updating transport manager account: " . mysqli_error($con);
            }
        }
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title>Modify Transport Manager Account</title>
        </head>
        <body>
            <h2>Transport Manager Account Modification</h2>
            <form method="post" action="modify_tmgt_acc.php?transport_manager_id=<?php echo $transport_manager_id; ?>">
                <label for="name">Username:</label>
                <input type="text" id="name" name="name" required="required" value="<?php echo $row['username']; ?>"><br>
        
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" maxlength="50" required value="<?php echo $row['password']; ?>"><br><br>
        
                <button type="submit">Edit Transport Manager Account</button>
            </form>
        <?php
        }
        mysqli_close($con);
    } else {
        echo "Transport Manager ID not provided.";
    }
?>
</body>
</html>
