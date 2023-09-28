<?php
session_start();
include("conn.php");

// Check if support_id is provided in the URL
if (isset($_SESSION['user_id'])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $support_id = $_SESSION['user_id'];
        $result = mysqli_query($con, "SELECT * FROM report WHERE support_id=$support_id");

    if (!$result) {
        die('Error: ' . mysqli_error($con));
    }
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
    // Check if $result is valid before fetching data
    if ($result) {
        while ($row = mysqli_fetch_array($result)) {
            echo '<tr>';
            echo '<td>' . $row["report_id"] . '</td>';
            echo '<td>' . $row["support_id"] . '</td>';
            echo '<td>' . $row["report_title"] . '</td>';
            echo '<td>' . $row["priority"] . '</td>';
            echo '<td>' . $row["report_description"] . '</td>';
            echo '<td>' . $row["report_status"] . '</td>';
            echo '</tr>';
        }
        mysqli_free_result($result); // Free the result set
    }
    mysqli_close($con);
?>

</table>
