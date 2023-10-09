<!DOCTYPE html>
<head>
    <title>Update Support Report</title>
	<link rel="stylesheet" href="updatereport.css">
</head>

<body>
    <h2>Report Update</h2>
    <?php
	include("Navi_update_report.php");
	include("conn.php");
        if (isset($_GET['report_id'])) {
            $report_id = $_GET['report_id']; 
            $result = mysqli_query($con, "SELECT * FROM report WHERE report_id = $report_id");
            
            while ($row = mysqli_fetch_array($result)) {
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    // Handle form submission and update database here
                    $report_id = $row['report_id']; // Get the report_id from the row
                    $status = $_POST['status'];
                    $comment = $_POST['comment'];
                    // Use prepared statements to prevent SQL injection
                    $update_sql = "UPDATE report SET
                        report_status = ?,
			report_comment = ?
                        WHERE report_id = ?";
                    
                    $update_stmt = mysqli_prepare($con, $update_sql);
                    mysqli_stmt_bind_param($update_stmt, "ssi", $status, $comment, $report_id);
                    
                    if (mysqli_stmt_execute($update_stmt)) {
                        echo "<script>alert('Report information has been updated!');</script>";
                    } else {
                        echo "Error updating report information: " . mysqli_error($con);
                    }
                }
                
                // Display report information and form
    ?>
	
                <p>
                    <label> Report ID: </label>
                    <input name='report_id' readonly='readonly' value="<?php echo $row['report_id']?>">
                </p>
                
                <p>
                    <label> Support ID: </label>
                    <input name='sid' readonly='readonly' value="<?php echo $row['support_id']?>">
                </p>
                
                <p>
                    <label> Report Title: </label>
                    <input name='title' readonly='readonly' value="<?php echo $row['report_title']?>">
                </p>
                
                <p>
                    <label> Report Priority: </label>
                    <input name='priority' readonly='readonly' value="<?php echo $row['priority']?>">
                </p>

                <p>
                    <label> Report Description: </label>
                    <input name='description' readonly='readonly' value="<?php echo $row['report_description']?>">
                </p>

                <p>
	        <form method="post">
	            <label for="status">Choose the Report Status:</label>
	            <select name="status" id="status" required="required">
	                <option value="">Please select the report status</option>
			<option value="Created" <?php if ($row['report_status'] == 'Created') echo 'selected'; ?>>Created</option>
                        <option value="Pending" <?php if ($row['report_status'] == 'Pending') echo 'selected'; ?>>Pending</option>
                        <option value="Resolved" <?php if ($row['report_status'] == 'Resolved') echo 'selected'; ?>>Resolved</option>
                        <option value="Closed" <?php if ($row['report_status'] == 'Closed') echo 'selected'; ?>>Closed</option>
	            </select><br>

		    <label for="comment">Report Comment:</label>
        	    <textarea id="text" name="comment" rows="5" cols="50" required="required"><?php echo $row['report_comment']?></textarea><br>
	
	            <button type="submit" value="Submit">Update Report</button>
                </form><br>
    <?php
            }
            mysqli_close($con);
        } else {
            echo "Report ID not provided.";
        }
    ?>
</body>
</html>
