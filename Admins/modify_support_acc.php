<?php
// Include the database connection
include("../conn.php");

if (isset($_GET['support_id'])) {
    $support_id = $_GET['support_id']; 
    $result = mysqli_query($con, "SELECT * FROM support WHERE support_id = '$support_id'");

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
                $support_id = $row['support_id']; // Get the support_id from the row

                // Use prepared statements to prevent SQL injection
                $update_sql = "UPDATE support SET
                    username = ?,
                    password = ?
                    WHERE support_id = ?";

                $update_stmt = mysqli_prepare($con, $update_sql);
                mysqli_stmt_bind_param($update_stmt, "sss", $username, $password, $support_id);

                if (mysqli_stmt_execute($update_stmt)) {
                    echo "<script>alert('This support account has been modified!');</script>";
                } else {
                    echo "Error updating support account: " . mysqli_error($con);
                }
            }
        }
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title>Modify Support Account</title>
            <link rel="stylesheet" href="Modifyhmgtacc.css">
        </head>
        <body>
            <?php
                include("Navi_modify_support.php");
            ?>
            <h2>Support Account Modification</h2>
            <form method="post" action="modify_support_acc.php?support_id=<?php echo $support_id; ?>">
                <label for="name">Username:</label>
                <input type="text" id="name" name="name" required="required" value="<?php echo $row['username']; ?>"><br>
        
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" maxlength="50" required value="<?php echo $row['password']; ?>"><br><br>
        
                <button type="submit">Edit Support Account</button>
            </form>
        <?php
        }
        mysqli_close($con);
    } else {
        echo "Support ID not provided.";
    }
?>
</body>
</html>
