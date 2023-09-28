<!DOCTYPE html>
<head>
    <title>Update Customer Support Request</title>
</head>

<body>
    <h2>Ticket Update</h2>
    <?php
        include("conn.php");
	if (isset($_GET['ticket_id'])) {
		$ticket_id=intval($_GET['ticket_id']); 
		$result=mysqli_query($con,"SELECT* FROM ticket WHERE ticket_id=$ticket_id");
		while($row=mysqli_fetch_array($result))
		{
		$sql="UPDATE ticket SET
		ticket_status = '$_POST[status]',
		ticket_priority = '$_POST[priority]',
		ticket_solution = '$_POST[solution]'
	
		WHERE ticket_id = $_POST[ticket_id];";
	}

        if (mysqli_query($con,$sql)) {
            mysqli_close($con);
        }

    ?>
        <p>
        <label> Ticket ID: </label>
		<input name='ticket_id' readonly='readonly' value="<?php echo $row['ticket_id']?>">
		</p>
		
		<p>
        <label> Support ID: </label>
		<input name='sid' readonly='readonly' value="<?php echo $row['support_id']?>">
		</p>
		
		<p>
        <label> User ID: </label>
		<input name='uid' readonly='readonly' value="<?php echo $row['user_id']?>">
		</p>
		
		<p>
        <label> Contact Name: </label>
		<input name='name' readonly='readonly' value="<?php echo $row['contact_name']?>">
		</p>

        <p>
        <label> Support Type: </label>
		<input name='typt' readonly='readonly' value="<?php echo $row['support_type']?>">
		</p>

        <p>
        <label> Ticket Description: </label>
		<input name='desc' readonly='readonly' value="<?php echo $row['ticket_description']?>">
		</p>

        <p>
        <form method="post">
            <label for="status">Choose the Ticket Status:</label>
            <select name="status" id="status" required="required">
                <option value="">Please select the ticket status</option>
                <option value="Created">Created</option>
                <option value="Pending">Pending</option>
                <option value="Resolved">Resolved</option>
                <option value="Closed">Closed</option>
            </select><br>

            <label for="priority">Choose the Ticket Priority:</label>
            <select name="priority" id="priority" required="required">
                <option value="">Please select the level of the priority</option>
                <option value="High">High</option>
                <option value="Medium">Medium</option>
                <option value="Low">Low</option>
            </select><br>

            <label for="solution">Solution for this Problem:</label>
            <textarea id="text" name="solution" rows="5" cols="50" required="required"></textarea><br>

        <button type="submit" value="Submit">Update Ticket</button>
        
    </form><br>
    <?php
    }mysqli_close($con);
    ?>
</body>
</html>
