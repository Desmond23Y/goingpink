<?php
session_start();
include("conn.php");
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}
if (isset($_GET['id'])) {
    $support_id = $_GET['id'];
    $result=mysqli_query($con,"SELECT* FROM report WHERE id=$support_id");
}
?>

<table width="90%">
    <tr bgcolor="#FFB6C1">
        <td>Report ID</td>
        <td>Support ID</td>
        <td>Report Title</td>
        <td>Priority</td>
        <td>Report Description</td>
        <td>Report Status</td>

    </tr>

<?php
    while($row=mysqli_fetch_array($result))
    {
        echo'<tr>';
        echo'<td>'.$row["report_id"].'</td>';
        echo'<td>'.$row["support_id"].'</td>';
        echo'<td>'.$row["report_title"].'</td>';
        echo'<td>'.$row["priority"].'</td>';
        echo'<td>'.$row["report_description"].'</td>';
        echo'<td>'.$row["report_status"].'</td>';
        echo'</tr>';
    }
    mysqli_close($con);
?>
</table>
