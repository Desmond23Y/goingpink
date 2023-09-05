<?php
// Include the necessary files and establish a database connection
include('conn.php');

// Function to fetch and return user data based on user ID
function fetchUserData($con, $user_id) {
    $user_data = array(); // Initialize an array to store user data

    // Query to retrieve user data based on the user ID
    $fetch_user_query = "SELECT * FROM user WHERE id = $user_id";

    // Execute the query
    $result = mysqli_query($con, $fetch_user_query);

    if ($result && mysqli_num_rows($result) > 0) {
        // Fetch user data into an associative array
        $user_data = mysqli_fetch_assoc($result);
    }

    return $user_data; // Return the user data as an associative array
}

// Assuming you have a way to retrieve the user's ID
$user_id = 123; // Replace with the actual user ID

// Fetch user data using the function
$user_data = fetchUserData($con, $user_id);

// Close the database connection
mysqli_close($con);
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
        <!-- User Information -->
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" value="<?php echo $user_data['username']; ?>">
        <br><br>

        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name" value="<?php echo $user_data['first_name']; ?>">
        <br><br>

        <label for="last_name">Last Name:</label>
        <input type="text" id="last_name" name="last_name" value="<?php echo $user_data['last_name']; ?>">
        <br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $user_data['email']; ?>">
        <br><br>

        <label for="phone_number">Phone Number:</label>
        <input type="tel" id="phone_number" name="phone_number" value="<?php echo $user_data['phone_number']; ?>">
        <br><br>

        <label for="date_of_birth">Date of Birth:</label>
        <input type="date" id="date_of_birth" name="date_of_birth" value="<?php echo $user_data['date_of_birth']; ?>">
        <br><br>

        <label>Gender:</label><br>
        <input type="radio" id="male" name="gender" value="male" <?php if ($user_data['gender'] === 'male') echo 'checked'; ?>>
        <label for="male">Male</label><br>

        <input type="radio" id="female" name="gender" value="female" <?php if ($user_data['gender'] === 'female') echo 'checked'; ?>>
        <label for="female">Female</label><br>

        <input type="radio" id="other" name="gender" value="other" <?php if ($user_data['gender'] === 'other') echo 'checked'; ?>>
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
