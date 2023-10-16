<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include("../conn.php");
    if (strlen($_POST['name']) < 5 || strlen($_POST['name']) > 50) {
        echo "Length of username must be between 5 and 50 characters.";
    } elseif (strlen($_POST['password']) < 5 || strlen($_POST['password']) > 50) {
        echo "Password length must be between 5 and 50 characters. Please try again.";
    } else {
        $sql = "INSERT INTO admin (username, password) VALUES ('$_POST[name]', '$_POST[password]')";
        
        if(!mysqli_query($con, $sql)) {
            die('Error: ' . mysqli_error($con));
        } else {
            echo "<script>alert('This admin account has been created!');</script>";
        }
    }

    mysqli_close($con);
}
?>

<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="Createhmgtacc.css">
</head>

<body>
    <form id="request-form" method="post">
        <label for="name">Username:</label>
        <input type="text" id="name" name="name" required="required"><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" maxlength="50" required><br><br>

        <button type="submit">Register as Admin</button>
    </form>
</body>
</html>
