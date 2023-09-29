<!DOCTYPE html>
<head>
    <title>Update Support Report</title>
</head>

<body>
    <h2>Report Update</h2>
    <?php
	include("conn.php");
        if (isset($_GET['report_id'])) {
            $report_id = intval($_GET['report_id']); 
            $result = mysqli_query($con, "SELECT * FROM report WHERE report_id = $report_id");
            
            while ($row = mysqli_fetch_array($result)) {
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    // Handle form submission and update database here
                    $report_id = $row['report_id']; // Get the report_id from the row
                    $status = $_POST['status'];
                    
                    // Use prepared statements to prevent SQL injection
                    $update_sql = "UPDATE ticket SET
                        report_status = ?
                        WHERE report_id = ?";
                    
                    $update_stmt = mysqli_prepare($con, $update_sql);
                    mysqli_stmt_bind_param($update_stmt, "si", $status, $report_id);
                    
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
	                <option value="Created">Created</option>
	                <option value="Payment and Billing Support">Pending</option>
	                <option value="Feedback and Complaint Resolution">Resolved</option>
	                <option value="Closed">Closed</option>
	            </select><br>
	
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
