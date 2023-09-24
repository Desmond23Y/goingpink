<?php include("conn.php");
$result=mysqli_query($con,"SELECT* FROM support");
?>
<table width="90%">
    <tr bgcolor="#FFB6C1">
        <td>Support ID</td>
        <td>Username</td>
    </tr>

<?php
    while($row=mysqli_fetch_array($result))
    {
        echo'<tr>';
        echo'<td>'.$row["support_id"].'</td>';
        echo'<td>'.$row["username"].'</td>';
        echo'</tr>';
    }
    mysqli_close($con);
?>
</table>