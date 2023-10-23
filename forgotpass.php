<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['email']) && !empty($_POST['email'])) {
            echo "Gmail submitted. You will be redirected to the index page in a moment...";   
            header('Location: index.php'); 
            exit();
        } else {

            echo "Please enter a valid Gmail address.";
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Enter Your Gmail</title>
    <link rel="stylesheet" href="../Admins/Modifyhmgtacc.css">
</head>
<body>
    <h2>Enter Your Gmail Address</h2>
    <form method="post" action="">
        <label for="email">Gmail Address:</label>
        <input type="email" name="email" id="email" required>
        <br>
        <button type="submit">Submit</button>
    </form>
</body>
</html>

