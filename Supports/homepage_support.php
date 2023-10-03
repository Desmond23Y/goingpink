<?php
session_start();
?>
<!DOCTYPE html>
<html>
     <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>GoingPink | Support</title>
        <link rel="stylesheet" href="homepage_support.css">
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
    <nav>
        <ul class="navibar">
            <li><a href="support_report.php">REPORT</a></li>
            <li><a href="view_own_support_report.php?user_id=<?php echo $_SESSION['user_id']; ?>">VIEW OWN REPORT</a></li>
            <li><a href="view_ticket.php">VIEW TICKET</a></li>
            <li><a href="logout.php" class="right">LOGOUT</a></li>
            <li><a href="login.php" class="right">LOGIN</a></li>
        </ul>
    </nav>
      <div class="backgroun-image">
            <header>
                <h1>Support Dashboard</h1>
        
                <p>What do you want to do today?</p>
            </header>
            <section class="section manage-ticket">
                <div class="function" id="manage-ticket">
                    <img src="/picture/manage-account.png" class="manage-ticket">
                    <div class="function-text">
                        <h2 class="manage-account">Manage Tickets</h2>
                        <p class="manage-account">Manage all of the tickets in one place.</p>
                        <div class="button-container">
                            <button class="button">Manage </button>     
                        </div>
                    </div>
                </div>
            </section>
            <section class="section manage-report">
                <div class="function" id="manage-report">
                    <img src="/picture/generate-report.png" style="float: right;" class="manage">
                    <div class="function-text">
                        <h2>View Sent Report</h2>
                        <p class="generate-report">View all of your sent reports here in one place.</p>
                        <button class="button" id="generate-report-button">Click Me</button>
                    </div>
                </div>
            </section>
            <section class="section contact-admin">
                <div class="function" id="contact-admin">
                  
                    <img src="/picture/contact-admin.jpeg" alt="call people" class="contact-admin">
                        <div class="function-text">
                            <h2>Contact Admin</h2>
                        
                            <p class="manage-booking">Are there any enquiries you want to make to the admin? Here are the details!</p>                  
                    <h6>Company Number: +6012345678</h6>
                    <h6>Email Address</h6>
                    </div>

                    </h6>
                   
                </div>
            </section>
            
        
        </div>

</body>
</html>
