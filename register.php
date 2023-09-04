<?php
// Include the database connection
include("conn.php");

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
