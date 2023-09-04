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
        <!-- Use the POST method for the form -->
        <form id="login-form" method="POST" action="">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required><br><br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br><br>
            <button type="submit">Login</button>
        </form>
        <p id="login-message">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Process form submission here
                $username = $_POST['username'];
                $password = $_POST['password'];

                // You can add your authentication logic here
                // Example: Check the username and password against a database
                // If the login is successful, redirect the user to a dashboard or homepage
                // If login fails, display an error message
                if ($username === 'username' && $password === 'password') {
                    // Replace 'your_username' and 'your_password' with actual credentials
                    // Successful login, redirect the user
                    exit();
                } else {
                    // Failed login, display an error message
                    echo "Login failed. Please try again.";
                }
            }
            ?>
        </p>
        <button id="logout-btn" style="display: none;">Logout</button>
    </div>
</body>
</html>
