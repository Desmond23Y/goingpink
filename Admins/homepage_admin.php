<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>GoingPink | Better Travel Site</title>
        <link rel="stylesheet" href="homepage_admin.css">
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
                <h1>Admin Dashboard</h1>
                <p>What do you want to do today?</p>
            </header>
            <section class="section manage-account">
                <div class="function" id="manage-account">
                    <div class="content-container">
                        <div class="function-text">
                            <h2>Manage Account</h2>
                            <p class="manage-account">Manage all of your stakeholder's account in one place.</p>
                            
                            <div class="button-container">
                                <a href="view_user_acc.php"><button class="button">User</button></a>
                                <a href="view_hmgt_acc.php"><button class="button">Hotel</button></a>
                                <a href="view_tmgt_acc.php"><button class="button">Transport</button></a>
                                <a href="view_support_acc.php"><button class="button">Support</button></a>
                                <a href="view_admin_acc.php"><button class="button">Admin</button></a>
                            </div>
                        </div>
                        <div class="image-container">
                            <img src="/picture/report.jpg" alt="Image 1">
                        </div>
                    </div>
                </div>
            </section>

            <section class="section generate-report">
                <div class="function" id="generate-report">
                    <div class="content-container">
                        <div class="function-text">
                            <h2>Generate Report</h2>
                            <p class="generate-report">Generate Sales, Inventory, Profit Reports here in one place.</p>
                            <a href="generatereport.php"><button class="button" id="generate-report-button">Click Me</button></a>
                        </div>
                        <div class="image-container">
                            <img src="/picture/generate-report.jpg" alt="Image 2">
                        </div>
                       
                    </div>
                </div>
            </section>

           <section class="section manage-booking">
                <div class="function" id="manage-booking">
                    <div class="content-container">
                        <div class="function-text">
                            <h2>Manage Booking</h2>
                            <p class="manage-booking">Manage all of the users' transport and hotel booking here.</p>
                            <a href="view_hotel_booking.php"><button class="button">Hotel</button></a>
                            <a href="view_transport_booking.php"><button class="button">Transport</button></a>
                        </div>
                        <div class="image-container">
                            <img src="/picture/manage-booking.jpg" alt="Image 3">
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </body>
</html>
