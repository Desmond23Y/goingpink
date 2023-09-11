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

    $update_profile_query = "UPDATE `user` SET 
        username = '$username',
        first_name = '$first_name',
        last_name = '$last_name',
        email = '$email',
        phone_number = '$phone_number',
        date_of_birth = '$date_of_birth',
        gender = '$gender'
        WHERE user_id = '$user_id'";

    if (mysqli_query($con, $update_profile_query)) {
        echo "<script>alert('Profile updated successfully!');</script>";
    } else {
        echo "Error updating profile: " . mysqli_error($con);
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

<br><br>

<input type="submit" value="Save Changes">
</form>
</div>
</body>
</html>
