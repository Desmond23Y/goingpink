<?php
// Start or resume the session
session_start();

include('navi_bar.php');
include('conn.php');

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php'); // Redirect to the login page if not logged in
    exit();
}

// Get the user ID from the session
$user_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Process the form data
    $username = $_POST['username'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $date_of_birth = $_POST['date_of_birth'];
    $gender = $_POST['gender'];
    $new_password = $_POST['newPassword'];
    $confirm_password = $_POST['confirmPassword'];

    // Check if the username is already taken
    $check_username_query = "SELECT * FROM user WHERE username = '$username' AND id != $user_id";
    $result = mysqli_query($con, $check_username_query);

    // Perform user input validation
    // (rest of the validation code)

    if (/* All validation checks pass */) {
        // Update the user information in the database
        $update_profile_query = "UPDATE user SET 
            username = '$username',
            first_name = '$first_name', 
            last_name = '$last_name', 
            email = '$email', 
            phone_number = '$phone_number', 
            date_of_birth = '$date_of_birth', 
            gender = '$gender', 
            password = '$new_password'
            WHERE id = $user_id";
        if (mysqli_query($con, $update_profile_query)) {
            echo "Profile updated successfully!";
            // Redirect to the profile page or wherever you want
            header('Location: editprofile.php');
            exit();
        } else {
            // Handle database error
            echo "Error updating profile: " . mysqli_error($con);
        }
    }
} else {
   $errormessage = "Invalid request.";
}

// Fetch the existing user data
$fetch_user_query = "SELECT * FROM user WHERE id = $user_id";
$result = mysqli_query($con, $fetch_user_query);

if ($result && mysqli_num_rows($result) > 0) {
    $user_data = mysqli_fetch_assoc($result);

    // Populate form fields with existing data
    $username = $user_data['username'];
    $first_name = $user_data['first_name'];
    $last_name = $user_data['last_name'];
    $email = $user_data['email'];
    $phone_number = $user_data['phone_number'];
    $date_of_birth = $user_data['date_of_birth'];
    $gender = $user_data['gender'];

    // Display the form with existing data
} else {
    echo "Error fetching user data: " . mysqli_error($con);
}

include('navi_bar.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Edit Profile</h1>
    <div class="container">
    <form action="profile_edit.php" method="POST">
        <!-- User Information -->
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" value="<?php echo $username; ?>">
        <br><br>

        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name" value="<?php echo $first_name; ?>">
        <br><br>

        <!-- Rest of the form fields -->

        <!-- Submit Button -->
        <input type="submit" value="Save Changes">
    </form>
    </div>
</body>
</html>
