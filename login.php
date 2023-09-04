<?php
include('navi_bar.php')
?>

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
        <h1>Welcome Back, Traveller!</h1>
        <h3>"Embrace the Journey, Go Pink with Excellence!"</h3>
    </header>
    <div id="login-container">
        <h2>Login</h2>
        <form id="login-form" method="POST" action="login.php">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required><br><br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br><br>
            <button type="submit">Login</button>
        </form>
        <p id="login-message"></p>
        <button id="logout-btn" style="display: none;">Logout</button>
    </div>

    
</body>
</html>

<?php
include('conn.php');
if (isset($_POST['username']) && isset($_POST['password'])) {

    function validate($data){
       $data = trim($data);
       $data = stripslashes($data);
       $data = htmlspecialchars($data);
       return $data;
    }

    $username = validate($_POST['username']);
    $password = validate($_POST['password']);

    if (empty($username)) {
        header("Location: login.php");
        echo "Error: Username is required";
        exit();

    }else if(empty($password)){
        header("Location: login.php");
        echo "Error: Password is required";
        exit();
        
    }else{
        $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
        $result = mysqli_query($con, $sql);
        if (mysqli_num_rows($result) === 1) {

            $row = mysqli_fetch_assoc($result);
            if ($row['username'] === $username && $row['password'] === $pass) {
                echo "Logged in!";

                $_SESSION['username'] = $row['username'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['id'] = $row['id'];
                header("Location: index.php");
                exit();

            }else{
                header("Location: login.php");
                echo "Error: Incorrect Username or Password";
                exit();
            }else{
            header("Location: index.php");
            exit();
        }
