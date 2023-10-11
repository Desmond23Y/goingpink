<?php
session_start();
include("conn.php");

if (!isset($_SESSION['user_id'])) {
    header('Location: ../login.php');
    exit();
}

$result = mysqli_query($con, "SELECT * FROM user");

include("Navi_bar_admin.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>View User Accounts</title>
    <link rel="stylesheet" href="viewhmgtacc.css">
</head>
<body>
    <div class="button">
        <a href="create_user_acc.php">Add New User Account</a></td>
    </div>
    
    <table width="90%">
        <tr bgcolor="#FFB6C1">
            <th>User ID</th>
            <th>Username</th>
            <th>First Name</th>
            <th>Last Name</t>
            <th>Email</th>
            <th>Phone Number</th>
            <th>DOB</th>
            <th>Gender</th>
            <th>Modify</th>
            <th>Delete</th>
        </tr>
<?php
while ($row = mysqli_fetch_array($result)) {
    echo '<tr>';
    echo '<td>' . $row["user_id"] . '</td>';
    echo '<td>' . $row["username"] . '</td>';
    echo '<td>' . $row["first_name"] . '</td>';
    echo '<td>' . $row["last_name"] . '</td>';
    echo '<td>' . $row["email"] . '</td>';
    echo '<td>' . $row["phone_number"] . '</td>';
    echo '<td>' . $row["date_of_birth"] . '</td>';
    echo '<td>' . $row["gender"] . '</td>';
    echo '<td><a href="modify_user_acc.php?user_id=' . $row["user_id"] . '">Edit</a></td>';
    echo '<td><a onclick="return confirm(\'Delete ' . $row["username"] . ' details?\')" href="delete_user_acc.php?user_id=' . $row["user_id"] . '">Delete</a></td>';
    echo '</tr>';
}
mysqli_close($con);
?>
</table>
</body>
</html>
