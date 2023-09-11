<?php
// Start or resume the session
session_start();

include('conn.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate user inputs
    if (empty($username) || empty($password)) {
        echo "Username and password are required.";
    } else {
        // Prepare and execute the UNION query to check if the user exists in any table
        $union_query = "
            (SELECT 'admin' AS user_type, admin_id AS user_id FROM admin WHERE username = '$username' AND password = '$password')
            UNION
            (SELECT 'support' AS user_type, support_id AS user_id FROM support WHERE username = '$username' AND password = '$password')
            UNION
            (SELECT 'hotel_management' AS user_type, hotel_manager_id AS user_id FROM hotel_management WHERE username = '$username' AND password = '$password')
            UNION
            (SELECT 'transport_management' AS user_type, transport_manager_id AS user_id FROM transport_management WHERE username = '$username' AND password = '$password')
            UNION
            (SELECT 'user' AS user_type, user_id AS user_id FROM user WHERE username = '$username' AND password = '$password')
        ";

        $result = mysqli_query($con, $union_query);

        if (mysqli_num_rows($result) > 0) {
            // Login successful
            $row = mysqli_fetch_assoc($result);
            $user_type = $row['user_type'];
            $user_id = $row['user_id'];

            // Store user data in the session
            $_SESSION['user_type'] = $user_type;
            $_SESSION['user_id'] = $user_id;
     

            // Check if the "Remember Me" checkbox is checked
            if (isset($_POST['remember_me'])) {
                // Create a JSON string with the username and password and set it as a cookie
                $cookie_data = json_encode(['username' => $username, 'password' => $password]);
                setcookie('remember_me', $cookie_data, time() + (60 * 60 * 24 * 30)); // Cookie will expire in 30 days
            }
            // Redirect to index.php
            include('Location: index.php');
            
           
            exit();
        } else {
            // Login failed
            echo "Invalid username or password. Please try again.";
        }
    }
}

mysqli_close($con);
?>

<?php
include_once('navi_bar.php');
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
        <form id="login-form" method="POST" action="logout.php">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" maxlength="50" required><br><br>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" maxlength="50" required><br><br>

            <input type="checkbox" id="remember_me" name="remember_me">
            <label for="remember_me">Remember Me</label><br><br>

            <button type="submit">Login</button>
        </form>
        <p id="login-message"></p>
        <button id="logout-btn" style="display: none;">Logout</button>
    </div>
</body>
</html>
