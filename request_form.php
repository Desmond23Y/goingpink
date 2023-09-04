<!DOCTYPE html>
<head>
    <title>Customer Support Request Form</title>
    <link rel="stylesheet" href="style_request_form.css">
</head>

<body>
    <header>
        <h1>Submit request form for customer support</h1>
    </header>

    <section class="request-form">
        <h2>Help Request Form</h2>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            include("conn.php");

            $sql = "INSERT INTO ticket (contact_name, support_type, ticket_description) VALUES ('$_POST[name]', '$_POST[support]', '$_POST[description]')";

            if(!mysqli_query($con,$sql)) {
                die('Error:' . mysqli_error($con));
            }
            else {
                echo "<script>alert('This form has been submitted!');</script>";
            }

            mysqli_close($con);
        }
        ?>
        <form id="request-form" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required="required"><br>

            <label for="support type">Choose a support type:</label>
            <select name="support" id="support" required="required">
                <option value="">Please select a support type</option>
                <option value="Technical">Technical</option>
                <option value="Payment and Billing Support">Payment and Billing Support</option>
                <option value="Feedback and Complaint Resolution">Feedback and Complaint</option>
                <option value="Others">Others</option>
            </select><br>

            <label for="description">Description:</label>
            <textarea id="text" name="description" rows="5" cols="50" required="required"></textarea><br>

            <button type="submit" value="Submit">Submit Form</button>
            
        </form><br>

    </section>
</body>
</html>
