<?php
include('navi_bar.php');
include('conn.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate user inputs
    if (empty($username) || empty($password)) {
        echo "Username and password are required.";
    } else {
        // Prepare and execute the SQL query to check if the user exists
        $check_user_query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($con, $check_user_query);

        if (mysqli_num_rows($result) > 0) {
            // Login successful
            echo "<script>alert('Login successful!');</script>";
            exit();
        } else {
            // Login failed
            echo "Invalid username or password. Please try again.";
        }
    }
}

mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Service Management</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Welcome to Going Pink!</h1>
        <h3>"The only Travel System Service you ever need!"</h3>
    </header>
    <div id="login-container">
        <h2>Login</h2>
        <form id="login-form" method="POST" action="">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" maxlength="50" required><br><br>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" maxlength="50" required><br><br>

            <button type="submit">Login</button>
        </form>
        <p id="login-message"></p>
        <button id="logout-btn" style="display: none;">Logout</button>
    </div>
</body>
</html>
