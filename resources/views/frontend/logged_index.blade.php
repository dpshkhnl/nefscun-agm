<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Alegreya&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" type="image/png" href="images/logo-favicon.jpg"/>
    <title>NEFSCUN</title>
  </head>
  <body>
  

  

    <header class="site-header pt-2 pb-2">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-12 col-sm-12 col-md-6 col-lg-6">
              <div class="mobile-top-contact float-right">
              <a class="btn btn-sm btn-outline-primary top-address-btn" target=_blank href="#" role="button"><i class="fas fa-map-marked-alt mr-2"></i>Login</a>
            </div>
            <div class="logo">
              <img src="images/banner_logo.png" class="img-fluid" alt="Nefscun Logo">
            </div>
          </div>
          <div class="col-12 col-sm-12 col-md-6 col-lg-6">
            <div class="top-details d-flex flex-column align-items-end">
              <div class="top-contact pb-2">
                <span class="top-phone mr-2"><i class="fas fa-phone-volume mr-1"></i>Call Us +977-1-4781963, 4780201</span>

             
              
                   
                    <a class="btn btn-sm btn-outline-primary top-address-btn" target=_blank  role="button"></i>Welcome, {{$coop->org_name}}</a>

                    <a class="btn btn-sm btn-outline-primary top-address-btn" href="{{url('printForm/'.$coop->id)}}" role="button"><i class="fas fa-unlock mr-2"></i>Profile</a>

                        <a class="btn btn-sm btn-outline-primary top-address-btn" href="{{ route('frontend.auth.logout') }}" role="button"><i class="fas fa-unlock mr-2"></i>Logout</a>

                  
              </div>
             
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>

    
    <nav class="navbar navbar-expand-lg navbar-light site-navigation">
      <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#topNavbarSupportedContent" aria-controls="topNavbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

       
      </div>
    </nav>
    <div class="menu-overlay"></div>

    <section class="home-carousel">
      <div class="container">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="images/s1.jpg" class="d-block w-100" alt="...">
            </div>
           
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </section>

    <section class="icon-box">
      <div class="container align-center">
        <div class="icon-box-inner">
          <div class="icon-list text-center">
            <a target=_blank href="showReports/1">
              <div class="icon-wrap">
                <i class="fas fa-users"></i>
              </div>
              <strong class="icon-title">अध्यक्षको मन्तब्य </strong>
            </a>
          </div>
          <div class="icon-list text-center">
            <a target=_blank href="showReports/2">
              <div class="icon-wrap">
                <i class="fas fa-book-reader"></i>
              </div>
              <strong class="icon-title">महासचिवको प्रतिवेदन </strong>
            </a>
          </div>
          <div class="icon-list text-center">
            <a target=_blank href="showReports/3">
              <div class="icon-wrap">
              <i class="fas fa-file-alt"></i>
            </div>
            <strong class="icon-title">कोषाध्यक्षको प्रतिवेदन</strong>
            </a>
          </div>
         
          <div class="icon-list text-center">
            <a target=_blank href="showReports/4">
              <div class="icon-wrap">
              <i class="fas fa-file-alt"></i>
            </div>
            <strong class="icon-title">लेखा परीक्षण प्रतिवेदन</strong>
            </a>
          </div>

          <div class="icon-list text-center">
            <a target=_blank href="showReports/5">
              <div class="icon-wrap">
              <i class="fas fa-file-alt"></i>
            </div>
            <strong class="icon-title">लेखा सुपरीवेक्षण समितिको प्रतिवेदन</strong>
            </a>
          </div>
         

        
      </div>
    </section>

   
    <footer class="site-footer">
      <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-4 col-lg-4">
              <ul class="footer-social">
                <li>
                  <a target=_blank href="#"><i class="fab fa-facebook-f"></i></a>
                </li>
                <li>
                  <a target=_blank href="#"><i class="fab fa-youtube"></i></a>
                </li>
              </ul>
            </div>
            <div class="col-12 col-sm-12 col-md-8 col-lg-8">
              <ul class="footer-links">
                <li>
                  <a target=_blank href="#">Home</a>
                </li>
                <li>
                  <a target=_blank href="#">Useful Links</a>
                </li>
               
                <li>
                  <a target=_blank href="#">Contact Us</a>
                </li>
                <li class="copyright">
                  &copy Copyright 2020 NEFSCUN
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/popper-2.4.4.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>