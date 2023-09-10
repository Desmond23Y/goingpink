<?php include("conn.php");
$result=mysqli_query($con,"SELECT* FROM policy");
?>
<table width="90%">
    <tr bgcolor="#FFB6C1">
        <td>Policy ID</td>
        <td>Admin ID</td>
        <td>Policy Name</td>
        <td>Description</td>

    </tr>

<?php
    while($row=mysqli_fetch_array($result))
    {
        echo'<tr>';
        echo'<td>'.$row["policy_id"].'</td>';
        echo'<td>'.$row["admin_id"].'</td>';
        echo'<td>'.$row["policy_name"].'</td>';
        echo'<td>'.$row["description"].'</td>';
        echo'</tr>';
    }
    mysqli_close($con);
?>
</table>