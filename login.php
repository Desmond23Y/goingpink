<?php
include('navbar.php')
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
        <h1>Welcome Back, Traveller!</h1>
        <h3>"Embrace the Journey, Go Pink with Excellence!"</h3>
    </header>
    <div id="login-container">
        <h2>Login</h2>
        <form id="login-form">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required><br><br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br><br>
            <button type="submit">Login</button>
        </form>
        <p id="login-message"></p>
        <button id="logout-btn" style="display: none;">Logout</button>
    </div>

    
</body>
</html>

<?php
include('conn.php'); 

function login($username, $password) {
    global $conn;

    
    $username = ($conn, $username);
    $password = ($conn, $password);

    // Query all relevant tables using a UNION query
    $query = "SELECT 'user' AS user_type, user_id FROM user WHERE username = '$username' AND password = '$password'
              UNION
              SELECT 'admin' AS user_type, admin_id FROM admin WHERE username = '$username' AND password = '$password'
              UNION
              SELECT 'support' AS user_type, support_id FROM support WHERE username = '$username' AND password = '$password'
              UNION
              SELECT 'transport_management' AS user_type, transport_manager_id FROM transport_management WHERE username = '$username' AND password = '$password'
              UNION
              SELECT 'hotel_management' AS user_type, hotel_manager_id FROM hotel_management WHERE username = '$username' AND password = '$password'";

    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) === 1) {
        // Fetch the user type and user_id
        $row = mysqli_fetch_assoc($result);
        $user_type = $row['user_type'];
        $user_id = $row['user_id'];

        // Redirect based on user type
        switch ($user_type) {
            case 'user':
                header("Location: homepage.php?user_id=$user_id");
                break;
            case 'admin':
                header("Location: homepage.php?admin_id=$user_id");
                break;
            case 'support':
                header("Location: homepage.php?support_id=$user_id");
                break;
            case 'transport_management':
                header("Location: homepage.php?transport_manager_id=$user_id");
                break;
            case 'hotel_management':
                header("Location: homepage.php?hotel_manager_id=$user_id");
                break;
            default:
                echo "Login failed. Please try again.";
        }

        exit();
    } else {
        echo "Login failed. Please try again.";
    }
}

// Verify login form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username']; 
    $password = $_POST['password']; 

    login($username, $password);
}
?>

