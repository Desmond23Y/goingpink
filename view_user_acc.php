<?php include("conn.php");
$result=mysqli_query($con,"SELECT* FROM user");
?>
<table width="90%">
    <tr bgcolor="#FFB6C1">
        <td>User ID</td>
        <td>Username</td>
        <td>First Name</td>
        <td>Last Name</td>
        <td>Email</td>
        <td>Phone Number</td>
        <td>DOB</td>
        <td>Gender</td>
        <td>Modify</td>
        <td>Delete</td>
    </tr>

<?php
    while($row=mysqli_fetch_array($result))
    {
        echo'<tr>';
        echo'<td>'.$row["user_id"].'</td>';
        echo'<td>'.$row["username"].'</td>';
        echo'<td>'.$row["first_name"].'</td>';
        echo'<td>'.$row["last_name"].'</td>';
        echo'<td>'.$row["email"].'</td>';
        echo'<td>'.$row["phone_number"].'</td>';
        echo'<td>'.$row["date_of_birth"].'</td>';
        echo'<td>'.$row["gender"].'</td>';
        echo'<td><a href="modify_user_acc.php?user_id='.$row["user_id"].'">Edit</a></td>';
        echo'<td><a onclick="return confirm(\'Delete '.$row["username"].' details?\')" href="delete_user_acc.php?user_id='.$row["user_id"].'">Delete</a></td>';
        echo'</tr>';
    }
    mysqli_close($con);
?>
</table>
