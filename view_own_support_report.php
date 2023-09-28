<?php
// Check if support_id is provided in the URL
if (isset($_GET['support_id'])) {
    $support_id = intval($_GET['support_id']);
    $result = mysqli_query($con, "SELECT * FROM report WHERE support_id=$support_id");

    if ($result) {
        // Rest of your code to display the results
        // ...
    } else {
        // Handle the case where the query fails
        echo "Error in the database query: " . mysqli_error($con);
    }
} else {
    // Handle the case where support_id is not provided in the URL
    echo "Support ID is missing in the URL.";
}

// Close the database connection
mysqli_close($con);
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
