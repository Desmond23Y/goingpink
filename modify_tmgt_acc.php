<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include("conn.php");
    if (strlen($_POST['name']) > 5 && strlen($_POST['name']) < 50) {
        echo "Length of username must be between 5 and 50 characters.";
    } elseif (strlen($_POST['password']) > 5 && strlen($_POST['password']) < 50) {
        echo "Password length must be between 5 and 50 characters. Please try again.";
    } else
        $transport_management_id=intval($_GET['transport_management_id']); 
        $result=mysqli_query($con,"SELECT* FROM transport_management WHERE id=$transport_management_id");
        while($row=mysqli_fetch_array($result))
        {
        $sql="UPDATE transport_management SET
        username = '$_POST[name]',
        password = '$_POST[password]',

        WHERE transport_management_id = $transport_management_id;";

    if(!mysqli_query($con,$sql)) {
        die('Error:' . mysqli_error($con));
    }
    else {
        echo "<script>alert('This transport management account has been modified!');</script>";
    }

    mysqli_close($con);
}
}
?>

<!DOCTYPE html>
<body>
    <form method="post">
        <label for="name">Username:</label>
        <input type="text" id="name" name="name" required="required" value="<?php echo $row['username']?>"><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" maxlength="50" required value="<?php echo $row['password']?>"><br><br>

        <button type="submit">Edit Management Account</button>
    </form>
</body>
</html>

