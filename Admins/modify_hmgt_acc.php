<?php
// Include the database connection
include("conn.php");

if (isset($_GET['hotel_manager_id'])) {
    $hotel_manager_id = $_GET['hotel_manager_id']; 
    $result = mysqli_query($con, "SELECT * FROM hotel_management WHERE hotel_manager_id = '$hotel_manager_id'");

    while ($row = mysqli_fetch_array($result)) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['name'];
            $password = $_POST['password'];

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
            } else {
                // Handle form submission and update database here
                $hotel_manager_id = $row['hotel_manager_id']; // Get the hotel_manager_id from the row

                // Use prepared statements to prevent SQL injection
                $update_sql = "UPDATE hotel_management SET
                    username = ?,
                    password = ?
                    WHERE hotel_manager_id = ?";

                $update_stmt = mysqli_prepare($con, $update_sql);
                mysqli_stmt_bind_param($update_stmt, "sss", $username, $password, $hotel_manager_id);

                if (mysqli_stmt_execute($update_stmt)) {
                    echo "<script>alert('This hotel manager account has been modified!');</script>";
                } else {
                    echo "Error updating hotel manager account: " . mysqli_error($con);
                }
            }
        }
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title>Modify Hotel Manager Account</title>
            <link rel="stylesheet" href="Modifyhmgtacc.css">
        </head>
        <body>
            <h2>Hotel Manager Account Modification</h2>
            <form method="post" action="modify_hmgt_acc.php?hotel_manager_id=<?php echo $hotel_manager_id; ?>">
                <label for="name">Username:</label>
                <input type="text" id="name" name="name" required="required" value="<?php echo $row['username']; ?>"><br>
        
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" maxlength="50" required value="<?php echo $row['password']; ?>"><br><br>
        
                <button type="submit">Edit Hotel Manager Account</button>
            </form>
        <?php
        }
        mysqli_close($con);
    } else {
        echo "Hotel Manager ID not provided.";
    }
?>
</body>
</html>
