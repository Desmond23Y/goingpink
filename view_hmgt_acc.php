<a href="create_hmgt_acc.php">Add New Hotel Manager Account</a><br>

<?php 
session_start();
include("conn.php");

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$result=mysqli_query($con,"SELECT* FROM hotel_management");
if (!$result) {
    die("Query failed: " . mysqli_error($con));
}
?>
<table width="90%">
    <tr bgcolor="#FFB6C1">
        <td>Hotel Manager ID</td>
        <td>Username</td>
        <td>Edit</td>
        <td>Delete</td>
    </tr>

<?php
    while($row=mysqli_fetch_array($result))
    {
        echo'<tr>';
        echo'<td>'.$row["hotel_manager_id"].'</td>';
        echo'<td>'.$row["username"].'</td>';
        echo'<td><a href="modify_hmgt_acc.php?hotel_manager_id='.$row["hotel_manager_id"].'">Edit</a></td>';
        echo'<td><a onclick="return confirm(\'Delete '.$row["username"].' details?\')" href="delete_hmgt_acc.php?hotel_manager_id='.$row["hotel_manager_id"].'">Delete</a></td>';
        echo'</tr>';
    }
    mysqli_close($con);
?>
</table>
