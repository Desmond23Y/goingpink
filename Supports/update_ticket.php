<!DOCTYPE html>
<head>
     <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="stylesheet" href="updateticket.css">
        <!-- Include Bootstrap-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <title>Update Customer Support Request</title>
        <!--Import Butler & Futura Font-->
        <style>
        @import url('https://fonts.cdnfonts.com/css/butler');
        @import url('https://fonts.cdnfonts.com/css/futura-pt');
        </style>
    <title>Report to Admin</title>
</head>

<body>
    
     <nav>
        <ul class="navibar">
            <li><a href="homepage_support.php">HOME</a></li>
            <li><a href="support_report.php">REPORT</a></li>
            <li><a href="view_own_support_report.php">VIEW OWN REPORT</a></li>
            <li><a href="view_ticket.php">VIEW TICKET</a></li>
            <li><a href="../logout.php" class="right">LOGOUT</a></li>
        </ul>
    </nav>


<body>
    <h2>Ticket Update</h2>
    <?php
        include("conn.php");
        if (isset($_GET['ticket_id'])) {
            $ticket_id = intval($_GET['ticket_id']); 
            $result = mysqli_query($con, "SELECT * FROM ticket WHERE ticket_id = $ticket_id");
            
            while ($row = mysqli_fetch_array($result)) {
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    // Handle form submission and update database here
                    $ticket_id = $row['ticket_id']; // Get the ticket_id from the row
                    $status = $_POST['status'];
                    $priority = $_POST['priority'];
                    $solution = $_POST['solution'];
                    
                    // Use prepared statements to prevent SQL injection
                    $update_sql = "UPDATE ticket SET
                        ticket_status = ?,
                        ticket_priority = ?,
                        ticket_solution = ?
                        WHERE ticket_id = ?";
                    
                    $update_stmt = mysqli_prepare($con, $update_sql);
                    mysqli_stmt_bind_param($update_stmt, "sssi", $status, $priority, $solution, $ticket_id);
                    
                    if (mysqli_stmt_execute($update_stmt)) {
                        echo "<script>alert('Ticket information has been updated!');</script>";
                    } else {
                        echo "Error updating ticket information: " . mysqli_error($con);
                    }
                }
                
                // Display ticket information and form
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
                    <input name='type' readonly='readonly' value="<?php echo $row['support_type']?>">
                </p>

                <p>
                    <label> Ticket Description: </label>
                    <input name='desc' readonly='readonly' value="<?php echo $row['ticket_description']?>">
                </p>

                <form method="post">
                    <label for="status">Choose the Ticket Status:</label>
                    <select name="status" id="status" required="required">
                        <option value="">Please select the ticket status</option>
                        <option value="Created" <?php if ($row['ticket_status'] == 'Created') echo 'selected'; ?>>Created</option>
                        <option value="Pending" <?php if ($row['ticket_status'] == 'Pending') echo 'selected'; ?>>Pending</option>
                        <option value="Resolved" <?php if ($row['ticket_status'] == 'Resolved') echo 'selected'; ?>>Resolved</option>
                        <option value="Closed" <?php if ($row['ticket_status'] == 'Closed') echo 'selected'; ?>>Closed</option>
                    </select><br>

                    <label for="priority">Choose the Ticket Priority:</label>
                    <select name="priority" id="priority" required="required">
                        <option value="">Please select the level of the priority</option>
                        <option value="High" <?php if ($row['ticket_priority'] == 'High') echo 'selected'; ?>>High</option>
                        <option value="Medium" <?php if ($row['ticket_priority'] == 'Medium') echo 'selected'; ?>>Medium</option>
                        <option value="Low" <?php if ($row['ticket_priority'] == 'Low') echo 'selected'; ?>>Low</option>
                    </select><br>

                    <label for="solution">Solution for this Problem:</label>
                    <textarea id="text" name="solution" rows="5" cols="50"><?php echo $row['ticket_solution']?></textarea><br>

                    <button type="submit" value="Submit">Update Ticket</button>
                </form><br>
    <?php
            }
            mysqli_close($con);
        } else {
            echo "Ticket ID not provided.";
        }
    ?>
</body>
</html>

