<?php include("conn.php");
$result=mysqli_query($con,"SELECT* FROM hotel_management");
if (!$result) {
    die("Query failed: " . mysqli_error($con));
}
?>
<table width="90%">
    <tr bgcolor="#FFB6C1">
        <td>Hotel Manager ID</td>
        <td>Username</td>
    </tr>

<?php
    while($row=mysqli_fetch_array($result))
    {
        echo'<tr>';
        echo'<td>'.$row["hotel_manager_id"].'</td>';
        echo'<td>'.$row["username"].'</td>';
        echo'</tr>';
    }
    mysqli_close($con);
?>
</table>
