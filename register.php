<?php
include('conn.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $date_of_birth = $_POST['date_of_birth'];
    $gender = $_POST['gender'];

    // Validate user inputs
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
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email address. Please try again.";
    } elseif (strlen($phone_number) < 9 || strlen($phone_number) > 12) {
        echo "Invalid phone number. Please try again.";
    } elseif (!isset($_POST['terms_and_conditions'])) {
        echo "You must accept the Terms and Conditions to proceed.";
    } else {
        // Prepare and execute the SQL query
        $new_user_query = "INSERT INTO user (username, password, first_name, last_name, email, phone_number, date_of_birth, gender) 
                            VALUES ('$username', '$password', '$first_name', '$last_name', '$email', '$phone_number', '$date_of_birth', '$gender')";
        if(mysqli_query($con, $new_user_query)) {
            echo "<script>alert('User registration successful!');</script>";
        } else {
            echo "Error: " . mysqli_error($con);
        }
        mysqli_close($con);
    }
}
?>
    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Service Management</title>
    <link rel="stylesheet" href="register.css">
</head>
<body>
    <?php
        include('navi_bar.php');
    ?>
    <header>
        <h1>Welcome to Going Pink!</h1>
        <h3>"The only Travel System Service you ever need!"</h3>
    </header>
    <div id="login-container">
        <h2>Sign Up</h2>
        <form id="signup-form" method="POST" action="">
            <p>Username:</p>
            <input type="text" id="username" name="username" maxlength="50" required placeholder="Username"><br><br>

            <p>Password:</p>
            <input type="password" id="password" name="password" maxlength="50" required placeholder="Password"><br><br>

            <p>First Name:</p>
            <input type="text" id="first_name" name="first_name" maxlength="50" required placeholder="First Name"><br><br>

            <p>Last Name:</p>
            <input type="text" id="last_name" name="last_name" maxlength="50" required placeholder="Last Name"><br><br>

            <p>Email:</p>
            <input type="text" id="email" name="email" maxlength="50" required placeholder="Email"><br><br>

            <p>Phone Number:</p>
            <input type="text" id="phone_number" name="phone_number" maxlength="50" required placeholder="Phone Number"><br><br>

            <p>Date of Birth:</p>
            <input type="date" id="date_of_birth" name="date_of_birth" required><br><br>

            <input type="checkbox" id="terms_and_conditions" name="terms_and_conditions" required>
            <label for="terms_and_conditions">I accept the <a href="./Users/policy.html" target="_blank">Terms and Conditions</a></label><br><br>

            <p>Gender:</p>
            <input type="radio" id="html" name="gender" value="male"><label for="male">Male</label><br>
            <input type="radio" id="css" name="gender" value="female"><label for="female">Female</label><br>
            <br>
            <button type="submit">Sign Up</button>
        </form>
        <p id="login-message"></p>
        <button id="logout-btn" style="display: none;">Logout</button>
    </div>
</body>
</html>
