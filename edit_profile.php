<?php
session_start();
include('conn.php');

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$user_id = $_SESSION['user_id'];
$gender = '';

$fetch_user_query = "SELECT * FROM user WHERE user_id = '$user_id'";
$result = mysqli_query($con, $fetch_user_query);

if (!$result) {
    echo "Error fetching user data: " . mysqli_error($con);
    exit();
}

if (mysqli_num_rows($result) > 0) {
    $user_data = mysqli_fetch_assoc($result);

    $username = $user_data['username'];
    $first_name = $user_data['first_name'];
    $last_name = $user_data['last_name'];
    $email = $user_data['email'];
    $phone_number = $user_data['phone_number'];
    $date_of_birth = $user_data['date_of_birth'];
    $gender = $user_data['gender'];    
}

include('navi_bar.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $date_of_birth = $_POST['date_of_birth'];
    $gender = $_POST['gender'];
    $new_password = $_POST['newPassword'];
    $confirm_password = $_POST['confirmPassword'];

    if (strlen($username) < 5 || strlen($username) > 50) {
        echo "Length of username must be between 5 and 50.";
    }
    elseif ($username !== $user_data['username']) {
        $check_username_query = "SELECT * FROM user WHERE username = '$username'";
        $check_username_result = mysqli_query($con, $check_username_query);
        if (mysqli_num_rows($check_username_result) > 0) {
            echo "Username already exists. Please try again.";
        }
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL) || !strpos($email, "@") || !strpos($email, ".com")) {
            echo "Invalid email address. Please try again.";
    } elseif (strlen($phone_number) < 10 || strlen($phone_number) > 11) {
            echo "Invalid phone number. Please try again.";
    } elseif (strlen($new_password) < 5 || strlen($new_password) > 50 ||
        !preg_match('/[A-Z]/', $new_password) ||
        !preg_match('/[a-z]/', $new_password) ||
        !preg_match('/[^a-zA-Z0-9]/', $new_password)) {
            echo "Invalid password. Please ensure it meets the requirements.";
    } elseif ($new_password !== $confirm_password) {
            echo "Password confirmation does not match. Please try again.";
    } else {

            $update_profile_query = "UPDATE `user` SET 
            username = '$username',
            password = '$new_password',
            first_name = '$first_name',
            last_name = '$last_name',
            email = '$email',
            phone_number = '$phone_number',
            date_of_birth = '$date_of_birth',
            gender = '$gender'
            WHERE user_id = '$user_id'";

       $stmt = mysqli_prepare($con, $update_profile_query);

    if ($stmt) {
        // Bind parameters and execute the statement
        mysqli_stmt_bind_param($stmt, "ssssssssi", $username, $new_password, $first_name, $last_name, $email, $phone_number, $date_of_birth, $gender, $user_id);
        
        if (mysqli_stmt_execute($stmt)) {
            echo "Profile updated successfully!";
            header('Location: edit_profile.php');
            exit();
        } else {
            echo "Error updating profile: " . mysqli_error($con);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Error preparing statement: " . mysqli_error($con);
    }
}
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
    <form action="edit_profile.php" method="POST">
        
<label for="username">Username:</label>
<input type="text" id="username" name="username" value="<?php echo $username; ?>">
<br><br>

<label for="first_name">First Name:</label>
<input type="text" id="first_name" name="first_name" value="<?php echo $first_name; ?>">
<br><br>

<label for="last_name">Last Name:</label>
<input type="text" id="last_name" name="last_name" value="<?php echo $last_name; ?>">
<br><br>

<label for="email">Email:</label>
<input type="email" id="email" name="email" value="<?php echo $email; ?>">
<br><br>

<label for="phone_number">Phone Number:</label>
<input type="tel" id="phone_number" name="phone_number" value="<?php echo $phone_number; ?>">
<br><br>

<label for="date_of_birth">Date of Birth:</label>
<input type="date" id="date_of_birth" name="date_of_birth" value="<?php echo $date_of_birth; ?>">
<br><br>

<label>Gender:</label><br>
<input type="radio" id="male" name="gender" value="male" <?php if ($gender === "male") echo "checked"; ?>>
<label for="male">Male</label><br>

<input type="radio" id="female" name="gender" value="female" <?php if ($gender === "female") echo "checked"; ?>>
<label for="female">Female</label><br>

<label for="newPassword">New Password:</label>
<input type="password" id="newPassword" name="newPassword">
<br><br>

<label for="confirmPassword">Confirm New Password:</label>
<input type="password" id="confirmPassword" name="confirmPassword">
<br><br>

<input type="submit" value="Save Changes">
</form>
</div>
</body>
</html>
