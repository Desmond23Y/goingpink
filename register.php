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
