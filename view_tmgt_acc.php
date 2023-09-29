<a href="create_tmgt_acc.php">Add New Transport Manager Account</a><br>

<?php include("conn.php");
$result=mysqli_query($con,"SELECT* FROM transport_management");
if (!$result) {
    die("Query failed: " . mysqli_error($con));
}
?>
<table width="90%">
    <tr bgcolor="#FFB6C1">
        <td>Transport Manager ID</td>
        <td>Username</td>
        <td>Edit</td>
        <td>Delete</td>
    </tr>

<?php
    while($row=mysqli_fetch_array($result))
    {
        echo'<tr>';
        echo'<td>'.$row["transport_manager_id"].'</td>';
        echo'<td>'.$row["username"].'</td>';
        echo'<td><a href="modify_tmgt_acc.php?transport_manager_id='.$row["transport_manager_id"].'">Edit</a></td>';
        echo'<td><a onclick="return confirm(\'Delete '.$row["username"].' details?\')" href="delete_tmgt_acc.php?transport_manager_id='.$row["transport_manager_id"].'">Delete</a></td>';
        echo'</tr>';
    }
    mysqli_close($con);
?>
</table>
