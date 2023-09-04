<?php
include('conn.php');

// Assuming you have a way to retrieve the user's ID
$user_id = 123; // Replace with the actual user ID

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
    $check_username_query = "SELECT * FROM user WHERE username = '$username'";
    $result = mysqli_query($con, $check_username_query);

    // Perform user input validation
    if (strlen($username) < 5 || strlen($username) > 50) {
        echo "Length of username must be between 5 and 50.";
    } elseif (mysqli_num_rows($result) > 0) {
        echo "Username already exists. Please try again.";  
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email address. Please try again.";
    } elseif (!strpos($email, "@") || !strpos($email, ".com")) {
        echo "Email address must contain '@' and '.com'. Please try again.";
    } elseif (strlen($phone_number) > 9 || strlen($phone_number) < 12) {
        echo "Invalid phone number. Please try again.";
    } elseif (strlen($new_password) > 10 || strlen($new_password) < 50) {
        echo "Password length must be between 5 and 50 characters. Please try again.";
    } elseif (!preg_match('/[A-Z]/', $new_password)) {
        echo "Password must contain at least one UPPERCASE letter. Please try again.";
    } elseif (!preg_match('/[a-z]/', $new_password)) {
        echo "Password must contain at least one lowercase letter. Please try again.";
    } elseif (!preg_match('/[^a-zA-Z0-9]/', $new_password)) {
        echo "Password must contain at least one special character. Please try again.";
    } elseif ($new_password !== $confirm_password) {
        echo "Password confirmation does not match. Please try again.";
    } else {
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
   $errormessage = "Invalid request. ";
}
?>
<?php
include('navbar.php');
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
    <form action="update_profile.php" method="POST">
        <!-- Profile Image Upload -->
        <label for="profileImage">Profile Image:</label>
        <input type="file" id="profileImage" name="profileImage">
        <br><br>

        <!-- User Information -->
        <label for="username">Username:</label>
        <input type="text" id="username" name="username">
        <br><br>

        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name">
        <br><br>

        <label for="lastName">Last Name:</label>
        <input type="text" id="last_name" name="last_name">
        <br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email">
        <br><br>

        <label for="phone_number">Phone Number:</label>
        <input type="tel" id="phone_number" name="phonenumber">
        <br><br>

        <label for="date_of_birth">Date of Birth:</label>
        <input type="date" id="date_of_birth" name="date_of_birth">
        <br><br>

        <label>Gender:</label><br>
        <input type="radio" id="male" name="gender" value="male">
        <label for="male">Male</label><br>

        <input type="radio" id="female" name="gender" value="female">
        <label for="female">Female</label><br>

        <input type="radio" id="other" name="gender" value="other">
        <label for="other">Other</label>
        <br><br>

        <!-- Password Change -->
        <label for="currentPassword">Current Password:</label>
        <input type="password" id="currentPassword" name="currentPassword">
        <br><br>

        <label for="newPassword">New Password:</label>
        <input type="password" id="newPassword" name="newPassword">
        <br><br>

        <label for="confirmPassword">Confirm New Password:</label>
        <input type="password" id="confirmPassword" name="confirmPassword">
        <br><br>

        <!-- Submit Button -->
        <input type="submit" value="Save Changes">
    </form>
    </div>
</body>
</html>
<?php
include('footer.php');
?>
