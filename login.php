<?php
include('navi_bar.php')
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
        <form id="login-form" method="POST" action="login.php">
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
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    $sql = "SELECT password FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($userId, $username, $hashedPassword);
    $stmt->fetch();
    $stmt->close();

    if (password_verify($password, $hashedPassword)) {
        session_start();
        $_SESSION["user_id"] = $userId;
        header("Location: index.php"); 
        exit();
    } else {
        $loginError = "Incorrect username or password. Please try again.";
    }
}

$conn->close();
?>
