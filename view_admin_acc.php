<a href="create_admin_acc.php">Add New Admin Account</a><br>

<?php include("conn.php");
$result=mysqli_query($con,"SELECT* FROM admin");
?>
<table width="90%">
    <tr bgcolor="#FFB6C1">
        <td>Admin ID</td>
        <td>Username</td>
        <td>Edit</td>
        <td>Delete</td>
    </tr>

<?php
    while($row=mysqli_fetch_array($result))
    {
        echo'<tr>';
        echo'<td>'.$row["admin_id"].'</td>';
        echo'<td>'.$row["username"].'</td>';
        echo'<td><a href="modify_admin_acc.php?admin_id='.$row["admin_id"].'">Edit</a></td>';
        <a onclick="return confirm('Delete <?php echo $row["username"]; ?> details?')" href="delete_admin_acc.php?admin_id=<?php echo $row["admin_id"]; ?>">Delete</a>;
        echo'</tr>';
    }
    mysqli_close($con);
?>
</table>
