<?php
include('navi_bar.php');
include('conn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT password_hash FROM users WHERE username = ?";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $hashed_password);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);

    if (password_verify($password, $hashed_password)) {
        // Password is correct, redirect the user to the dashboard or homepage
        header("Location: dashboard.php"); // Replace with your actual destination
        exit();
    } else {
        // Failed login, display an error message
        echo "Login failed. Please try again.";
    }

    mysqli_close($conn);
}
?>
