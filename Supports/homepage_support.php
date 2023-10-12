<?php
session_start();
include("Navi_bar_support");
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
      <div class="backgroun-image">
            <header>
                <h1>Support Dashboard</h1>
        
                <p>What do you want to do today?</p>
            </header>
            <section class="section manage-ticket">
                <div class="function" id="manage-ticket">
                  
                    <div class="function-text">
                      
                        <h2 class="manage-account">Manage Tickets</h2>
                        <p class="manage-account">Manage all of the tickets in one place.</p>
                        
                              <a href="support_report.php" ><button class="button">Manage </button></a>    
               
                    </div>
                </div>
            </section>
            <section class="section manage-report">
                <div class="function" id="manage-report">
                  
                    <div class="function-text">
                        <h2>View Sent Report</h2>
                        <p class="generate-report">View all of your sent reports here in one place.</p>
                            <a href="view_own_support_report.php" ><button class="button" id="generate-report-button">Click Me</button></a>
                    </div>
                </div>
            </section>
            <section class="section contact-admin">
                <div class="function" id="contact-admin">
                  
                
                        <div class="function-text">
                            <h2>View Ticket</h2>
                        
                            <p class="manage-booking">View all the details here in one place.</p> 
                               <a href="view_ticket.php" ><button class="button" id="generate-report-button">Click Me</button></a>
                    
                    </div>

                    </h6>
                   
                </div>
            </section>
            
        
        </div>

</body>
</html>
