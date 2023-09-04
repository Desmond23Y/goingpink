<?php
include('db.php'); // Include the database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Process the form data
    $username = $_POST['username'];
    $password = $_POST['password'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $date_of_birth = $_POST['date_of_birth'];
    $gender = $_POST['gender'];

    // Check if the username is already taken
    $check_username_query = "SELECT * FROM user WHERE username = '$username'";
    $result = mysqli_query($conn, $check_username_query);

    if (strlen($username) > 5 || strlen($username) <50) {
        echo "length of username must stay in between 5 and 50 characters"
    } elseif (mysqli_num_rows($result) > 0) {
        echo "Username already exist. Please try again";  
    } elseif (strlen($password) > 10) || strlen($password) <50  {
        echo "Password length must must stay in between 5 and 50 characters. Please try again.";
    } elseif (!preg_match('/[A-Z]/', $password)) {
        echo "Password must contain at least one UPPERCASE letter. Please try again.";
    } elseif (!preg_match('/[a-z]/', $password)) {
        echo "Password must contain at least one lowercase letter. Please try again.";
    } elseif (!preg_match('/[^a-zA-Z0-9]/', $password)) {
        echo "Password must contain at least one special character. Please try again.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email address. Please try again.";
    } elseif (!strpos($email, "@") || !strpos($email, ".com")) {
        echo "Email address must contain '@' and '.com'. Please try again.";
    } elseif (strlen($phone_number) > 10 || strlen($phone_number) < 11) {
        echo "Invalid phone number. Please try again.";
    } else {
        // Insert user information into database
        $new_user_query = "INSERT INTO user (username, password, first_name, last_name, email, phone_number, date_of_birth, gender)
                         VALUES ('$username', '$password', '$first_name', '$last_name', '$email', '$phone_number', '$date_of_birth', '$gender')";

        if (mysqli_query($conn, $new_user_query)) {
            echo "Registered Successfully. You can now login.";
            // Redirect to login page
            header('login.php');
        } else {
            echo "Register failed" . mysqli_error($conn);
        }
    }
}
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
        <h2>Sign Up</h2>
        <form id="signup-form">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" maxlength="50" required><br><br>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" maxlength="50" required><br><br>

            <label for="first_name">First Name:</label>
            <input type="text" id="first_name" name="first_name" maxlength="50" required><br><br>

            <label for="last_name">Last Name:</label>
            <input type="text" id="last_name" name="last_name" maxlength="50" required><br><br>

            <label for="email">Email:</label>
            <input type="text" id="email" name="email" maxlength="50" required><br><br>

            <label for="phone_number">Phone Number:</label>
            <input type="int" id="phone_number" name="phone_number" maxlength="50" required><br><br>

            <label for="date_of_birth">Date of Birth:</label>
            <input type="date" id="date_of_birth" name="date_of_birth" required><br><br>

            <label>Gender:</label>
            <input type="radio" id="html" name="gender" value="male" label for="male">Male</label><br>
            <input type="radio" id="css" name="gender" value="female" label for="female">Female</label><br>
            <br>
            <button type="submit">Sign Up</button>
        </form>
        <p id="login-message"></p>
        <button id="logout-btn" style="display: none;">Logout</button>
    </div>

</body>
</html>
