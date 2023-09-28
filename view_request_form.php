<?php include("conn.php");
$result=mysqli_query($con,"SELECT* FROM ticket");
?>
<table width="90%">
    <tr bgcolor="#FFB6C1">
        <td>Ticket ID</td>
        <td>Support ID</td>
        <td>User ID</td>
        <td>Contact Name</td>
        <td>Support Type</td>
        <td>Ticket Description</td>
        <td>Ticket Status</td>
        <td>Ticket Priority</td>
        <td>Ticket Solution</td>
        <td>Edit</td>
    </tr>

<?php
    while($row=mysqli_fetch_array($result))
    {
        echo'<tr>';
        echo'<td>'.$row["ticket_id"].'</td>';
        echo'<td>'.$row["support_id"].'</td>';
        echo'<td>'.$row["user_id"].'</td>';
        echo'<td>'.$row["contact_name"].'</td>';
        echo'<td>'.$row["support_type"].'</td>';
        echo'<td>'.$row["ticket_description"].'</td>';
        echo'<td>'.$row["ticket_status"].'</td>';
        echo'<td>'.$row["ticket_priority"].'</td>';
        echo'<td>'.$row["ticket_solution"].'</td>';
        echo'<td><a href="update_ticket.php?id='.$row["ticket_id"].'">Edit</a></td>';
        echo'</tr>';
    }
    mysqli_close($con);
?>
</table>
