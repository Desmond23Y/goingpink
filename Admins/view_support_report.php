<?php
session_start();
include("conn.php");

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$result=mysqli_query($con,"SELECT* FROM report");

include("Navi_bar_admin.php");
?>

<head>
    <link rel="stylesheet" href="Viewsupportreport.css">
</head>

<table width="90%">
    <tr bgcolor="#FFB6C1">
        <td>Report ID</td>
        <td>Support ID</td>
        <td>Report Title</td>
        <td>Priority</td>
        <td>Report Description</td>
        <td>Report Status</td>
        <td>Report Comment</td>
        <td>Edit</td>

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
        echo'<td>'.$row["report_comment"].'</td>';
        echo'<td><a href="update_report.php?report_id='.$row["report_id"].'">Edit</a></td>';
        echo'</tr>';
    }
    mysqli_close($con);
?>
</table>
