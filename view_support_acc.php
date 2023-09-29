<?php include("conn.php");
$result=mysqli_query($con,"SELECT* FROM support");
?>
<table width="90%">
    <tr bgcolor="#FFB6C1">
        <td>Support ID</td>
        <td>Username</td>
        <td>Edit</td>
        <td>Delete</td>
    </tr>

<?php
    while($row=mysqli_fetch_array($result))
    {
        echo'<tr>';
        echo'<td>'.$row["support_id"].'</td>';
        echo'<td>'.$row["username"].'</td>';
        echo'<td><a href="modify_support_acc.php?support_id='.$row["support_id"].'">Edit</a></td>';
        echo'<td><a onclick="return confirm(\'Delete '.$row["username"].' details?\')" href="delete_support_acc.php?support_id='.$row["support_id"].'">Delete</a></td>';
        echo'</tr>';
    }
    mysqli_close($con);
?>
</table>
