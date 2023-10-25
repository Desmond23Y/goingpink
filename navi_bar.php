<style>
     @import url('https://fonts.cdnfonts.com/css/butler');
     @import url('https://fonts.cdnfonts.com/css/futura-pt');

     body {
        margin: 0;
        padding: 0;
          }
          
    .navibar {
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
        background-color: #F9B9C3;
        font-family: Butler;
        }

    .navibar a {
        float: left;
        font-size: 16px;
        color: #333;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        }

    .navibar a.right {
        float: right;   
        }

    .navibar a:hover {
        background-color: #C7949C;
        color: white;
        }

    .dropdown {
        float: left;
        overflow: hidden;
        position: static;
        }

    .dropdown .dropbtn {
        font-size: 16px;
        border: none;
        outline: none;
        color: #333;
        padding: 14px 16px;
        background-color: #F9B9C3;
        font-family: Butler;
        }
        
        .dropdown a:hover {
        background-color: #C7949C;
        color: white;
        }
    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #F9B9C3;
        min-width: 160px;
        z-index: 1;
        }    

    .dropdown-content a {
        float: none;
        color: #333;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
        text-align: center;
        }

    .dropdown:hover .dropdown-content {
        display: block;
        }


</style>

<div class="navibar">
    <a href="/index.php">HOME</a>
    <a href="../Users/view_profile.php">PROFILE</a>
    <a href="../Users/faq.php">FAQ</a>
        <div class="dropdown" >
            <button class="dropbtn">FUNCTIONS
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="../Users/viewhotel.php">VIEW AND BOOK HOTEL</a>
                <a href="../Users/api_exRates.php">CURRENCY EXCHANGE RATES</a>
                <a href="../Users/viewtransport.php">VIEW AND BOOK TRANSPORT</a>
                <a href="../Users/invoice.php">CHECK BOOKING HISTORY</a>
                <a href="../Users/request_form.php">GO TO SUPPORT</a>
                <a href="../Users/user_view_ticket.php">VIEW CREATED TICKETS</a>
                <a href="../Users/rating.php">WRITE REVIEW</a>
                <a href="../Users/view_rating.php">VIEW REVIEW</a>
            </div>
        </div>              
    <a href="../logout.php" class="right">LOGOUT</a>
    <a href="../register.php" class="right">REGISTER</a>
    <a href="../login.php" class="right">LOGIN</a>
</div>

