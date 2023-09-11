<?php
// Start or resume the session
session_start();

include('conn.php'); // Moved the inclusion of 'conn.php' here

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['logout'])) {
    // Unset session variables
    unset($_SESSION['user_type']);
    unset($_SESSION['user_id']);

    echo "<script>alert('Logged out successfully!');</script>";
}

// Check if the user is already logged in
if (isset($_SESSION['user_type']) && isset($_SESSION['user_id'])) {
    // Redirect to the dashboard or some other page as needed
    header('Location: login.php'); // Change to your desired destination
    exit();
}

include('navi_bar.php'); // Moved the inclusion of 'navi_bar.php' after the potential error messages

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

            <input type="checkbox" id="remember_me" name="remember_me">
            <label for="remember_me">Remember Me</label><br><br>

            <button type="submit">Login</button>
        </form>
        <form method="POST" action="">
            <button type="submit" name="logout">Logout</button>
        </form>
        <p id="login-message"></p>
        <button id="logout-btn" style="display: none;">Logout</button>
    </div>
</body>
</html>
