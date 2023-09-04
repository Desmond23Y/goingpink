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