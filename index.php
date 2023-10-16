

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GoingPink</title>
    <link rel="stylesheet" href="index_styles.css">
    <!-- Include Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!--Import Butler & Futura Font-->
    <style>
     @import url('https://fonts.cdnfonts.com/css/butler');
     @import url('https://fonts.cdnfonts.com/css/futura-pt');
    </style>

    <!--Javascript-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        const myCarouselElement = document.querySelector('#myCarousel')

        const carousel = new bootstrap.Carousel(myCarouselElement, {
        interval: 2000,
        touch: false
        });
    </script>

</head>



<!--navbar-->
<body>
  
  <div class="navibar">
      <a href="index.php">HOME</a>
      <a href="../Users/view_profile.php">PROFILE</a>
      <a href="../Users/faq.php">FAQ</a>
          <div class="dropdown" style="font-family: Butler;">
              <button class="dropbtn" style="font-family: Butler;">FUNCTIONS
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

    <!--Carousel-->
<div id="carouselExampleIndicators" class="carousel slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>

  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="/picture/city.png" width="1440px" height="597px" class="d-block w-100" alt="purple city">

      <div class="carousel-title-caption">
        <p>Creating Memories,<br> One <span style="color:#F1ACA4">Pink</span> Trip at a Time.</p>
      </div>
      <div class="carousel-caption">
        <p>“The only Travel System Service Management <br> you ever need.”</p>
      </div>
   </div>

    <div class="carousel-item">
      <img src="/picture/download (1).png" width="1440px" height="597px" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="/picture/download.png" width="1440px" height="597px" class="d-block w-100" alt="...">
    </div>
  </div>

  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>


    <!--Reasons to Use-->

    <section class="reason">
        <div class="reason-container">
          <div class="reason-content">
            <div class="reason-text">
              <h3 class="reason-container-text">Planning Trips Made Easy</h3>
              <p class="reason-container-text-p">Discover the benefits of goingPink:</p>
            </div>
            <ul class="reason-list">
              <li>Easy-to-use interface</li>
              <li>Dedicated customer support</li>
              <li>All-in-one platform</li>
              <li>User data protection</li>
            </ul>
          </div>
          <div class="right-image">
            <img src="/picture/barbie.png" alt="Image Description">
          </div>
        </div>
      </section>
      

    <!--Main Features-->
 
      
<section class="main-features" >
    <div class="features-container" >
      <div class="album py-5 " >
        <div class="container" >
            
             <h2 id="features-container-text-title">Our Main Features</h2>
            
    
          <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3" >
            
    
            <div class="hotel-feature">
              <div class="card shadow-sm">
                <img src ="/picture/hotel.png" alt="hotel" class="hotel-placeholder-img card-img-top" width="100%" height="225" role="img" >
                <div class="card-body" style="background-color: #FBE5E3;">
                  <h5 class="card-body-title">View and Book Hotel</h5>
                   <p class="card-text">Explore our exquisite selection of hotels and start your journey to exceptional hospitality today.</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                       <a href="../Users/viewhotel.php"><button type="button" class="btn btn-sm custom-button">Click Me!</button></a>
                      
                    </div>
                    
                  </div>
                </div>
              </div>
            </div>
            <div class="exchange-rate-feature">
              <div class="card shadow-sm">
                <img src ="picture/Rates.png" alt="exchange-rates" class="exchange-rate-placeholder-img card-img-top" width="100%" height="225" role="img" >
                <div class="card-body" style="background-color: #FBE5E3;">
                  <h5 class="card-body-title">Currency Exchange Rates</h5>
                   <p class="card-text">Click here to check how much it costs based on your currency no matter where you're from!</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group" >
                      <a href="../Users/api_exRates.php"><button type="button" class="btn btn-sm custom-button">Click Me!</button></a>                      
                    </div>                 
                  </div>
                </div>
              </div>
            </div>
            <div class="transport-feature">
                <div class="card shadow-sm">
                  <img src ="picture/Transport.png" alt="transport" class="transport-feature card-img-top" width="100%" height="225" role="img" >
                  <div class="card-body"  style="background-color: #FBE5E3;">
                    <h5 class="card-body-title">View and Book Transport</h5>
                     <p class="card-text">Discover our wide range of transportation options and take the first step towards seamless travel.</p>
                    <div class="d-flex justify-content-between align-items-center">
                      <div class="btn-group">
                         <a href="../Users/viewtransport.php"><button type="button" class="btn btn-sm custom-button">Click Me!</button>  </a>                    
                      </div>                 
                    </div>
                  </div>
                </div>
            </div>       
          </div>
        </div>
      </div>

    </div>
    
</section>
    
<!--Support-->
<section class="support">
  <div class="support-container">
    <div class="support">
      <div class="support-text">
        <h3 class="support-container-text">Facing a Problem? Need Help?</h3>
        <p class="support-container-text-p" style="font-size: 24px;;">Contact Our Support By Clicking the Buttons Below!</p>
        <a href="../Users/request_form.php" class="btn btn-lg btn-light fw-bold bg-white">Go To Support</a>
        <a href="../Users/user_view_ticket.php" class="btn btn-lg btn-light fw-bold bg-white" >View Tickets</a>
      </div>
     
    </div>
    <div class="right-image">
      <img src="/picture/problem.png" alt="pink screen" style="width: 1000px;"; height="300px">
    </div>
  </div>
</section>
    
<!-- Write Review-->
<div class="background-image">
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
        <header class="mb-auto">
        <div>
            <!--just to allocate some space here-->        
        </div>
        </header>
    
        <main class="px-3">
        <h1 style="font-weight:900 ;color:#E9204F; font-family: Butler;">Write a review, make someone's trip!</h1>
        <p class="lead" style="color: #E9204F; font-family: Futura;">Stories like yours are what helps travellers have better trips. <br>Share your experience and help out a fellow traveller!</p>
        <p class="lead">
            <a href="../Users/rating.php" class="btn btn-lg btn-light fw-bold bg-white">Write Review</a>
            <a href="../Users/view_rating.php" class="btn btn-lg btn-light fw-bold bg-white" >See Reviews</a>
        </p>
        </main>
    
        <footer class="mt-auto text-white-50">
       
        </footer>
    </div>
</div>

<!--Footer-->
      <div class="container">
        <footer class="py-3 my-4">
          <ul class="nav justify-content-center border-bottom pb-3 mb-3">
            <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Home</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Features</a></li>    
            <li class="../Users/faq.php"><a href="#" class="nav-link px-2 text-body-secondary">FAQs</a></li>
          </ul>
          <p class="text-center text-body-secondary">© 2023 GoingPink ©</p>
        </footer>
      </div>

</body>
</html>

