<html>
   
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>GoingPink | Better Travel Site</title>
        <link rel="stylesheet" href="generatereport.css">
        <!-- Include Bootstrap-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
        <!--Import Butler & Futura Font-->
        <style>
        @import url('https://fonts.cdnfonts.com/css/butler');
        @import url('https://fonts.cdnfonts.com/css/futura-pt');
        </style>
    
       <!--Javascript-->
       <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    
    </head>

    <body>
        <?php
            include("Navi_bar_admin.php");
        ?>
        <div class="background-image">
            <header>
                <h1>Generate Report Page</h1>
        
                <p>What report do you want to generate today?</p>
            </header>
            <div class="button-container">
                  <a href="report_user_type.php"><button class="button">User Group</button></a>
                  <a href="report_user_gender.php" ><button class="button">User Gender </button></a>
                  <a href="report_num_of_booking.php" ><button class="button">Hotel & Transport</button></a>
                  <a href="report_ticket_type.php" ><button class="button">Ticket Type</button></a>
                  <a href="report_star_rating.php" ><button class="button">Rating</button></a>
                  <a href="report_price_range.php" ><button class="button">Hotel Price Range</button></a>
                  <a href="report_user_expenses_range.php" ><button class="button">User Expenses Range</button></a>
                  <a href="view_support_report.php" ><button class="button">View Support Report</button></a>
                  <a href="../Supports/view_ticket.php" ><button class="button">View Ticket</button></a>
                  <a href="view_invoice.php" ><button class="button">View Invoice</button></a>
            </div>
            

</html>
