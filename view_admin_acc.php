<?php include("conn.php");
$result=mysqli_query($con,"SELECT* FROM admin");
?>
<table width="90%">
    <tr bgcolor="#FFB6C1">
        <td>Admin ID</td>
        <td>Username</td>
    </tr>

<?php
    while($row=mysqli_fetch_array($result))
    {
        echo'<tr>';
        echo'<td>'.$row["admin_id"].'</td>';
        echo'<td>'.$row["username"].'</td>';
        echo'</tr>';
    }
    mysqli_close($con);
?>
</table>