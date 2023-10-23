<!DOCTYPE html>
<html>
<head>
    <title>Enter Your Gmail</title>
    <link rel="stylesheet" href="../Admins/Modifyhmgtacc.css">
</head>
<body>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Check if the form was submitted
        if (isset($_POST['email']) && !empty($_POST['email'])) {
            // Display a confirmation message
            echo "Gmail submitted. You will be redirected to the index page in a moment...";
            
            // Redirect to index.php after a delay
            header('Refresh: 5; URL=index.php'); // Redirect after 5 seconds
            exit();
        } else {
            // Handle any validation errors or other logic here
            echo "Please enter a valid Gmail address.";
        }
    }
    ?>
    <h2>Enter Your Gmail Address</h2>
    <form method="post" action="">
        <label for="email">Gmail Address:</label>
        <input type="email" name="email" id="email" required>
        <br>
        <button type="submit">Submit</button>
    </form>
</body>
</html>

