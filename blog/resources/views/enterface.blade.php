<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="..//img/apple-icon.png">
  <link rel="icon" type="image/png" href="..//img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Now UI Kit by Creative Tim
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="/css/bootstrap.min.css" rel="stylesheet" />
  <link href="/css/now-ui-kit.css?v=1.3.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="/css/demo.css" rel="stylesheet" />
  <link rel="stylesheet" href="/css/bootstrap.min.css">
        <link rel="stylesheet" href="/css/owl.carousel.min.css">
        <link rel="stylesheet" href="/css/pe-icon-7-stroke.css">
        <link rel="stylesheet" href="/css/font-awesome.min.css">
        <link rel="stylesheet" href="/css/meanmenu.css">
        <link rel="stylesheet" href="/css/shortcode.css">
        <link rel="stylesheet" href="/css/style.css">
        <link rel="stylesheet" href="/css/responsive.css">
        <link rel="stylesheet" href="/css/uikit.min.css">
        <link rel="stylesheet" href="/css/uikit.css">
        <link rel="stylesheet" href="/css/bootstrap.min.css">
	<link rel="stylesheet" href="/css/plugins.css">
  <link rel="stylesheet" href="/css/style.css">
 

	<!-- Cusom css -->
   <link rel="stylesheet" href="/css/custom.css">

	<!-- Modernizer js -->
	<script src="/js/modernizr-3.5.0.min.js"></script>

        <script src="/js/modernizr-2.8.3.min.js"></script>
</head>

<body class="landing-page sidebar-collapse">

    
<nav class="navbar navbar-expand-lg bg-primary fixed-top navbar-transparent " color-on-scroll="400">
    <div class="container">
    @foreach($categories as $category)
    <a class="uk-button uk-button-default" href="{{route('shop',['name'=>$category->name])}}">{{$category->name}}</a>
  
  </button>
  

   

@endforeach

    <div class="shopping-cart ml-30">
                                        <a class="top-cart" href="cart.html"><i class="pe-7s-cart"></i></a>
                                        <ul>
                                            <li>
                                                <div class="cart-img">
                                                    <a href="#"><img src="assets/img/cart/1.jpg" alt="" /></a>
                                                </div>
                                                <div class="cart-content">
                                                    <h3><a href="#"> 1 X Faded...</a> </h3>
                                                    <span><b>S, Orange</b></span>
                                                    <span class="cart-price">£ 16.84</span>
                                                </div>
                                                <div class="cart-del">
                                                    <i class="pe-7s-close-circle"></i>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="cart-img">
                                                    <a href="#"><img src="assets/img/cart/2.jpg" alt="" /></a>
                                                </div>
                                                <div class="cart-content">
                                                    <h3><a href="#"> 1 X Faded...</a> </h3>
                                                    <span><b>S, Orange</b></span>
                                                    <span class="cart-price">£ 16.84</span>
                                                </div>
                                                <div class="cart-del">
                                                    <i class="pe-7s-close-circle"></i>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="shipping"> 
                                                    <span class="f-left">Shipping </span>
                                                    <span class="f-right cart-price"> $7.00</span>  
                                                </div>
                                                <hr class="shipping-border" />
                                                <div class="shipping">
                                                    <span class="f-left"> Total </span>
                                                    <span class="f-right cart-price">$692.00</span> 
                                                </div>
                                            </li>
                                            <li class="checkout m-0"><a href="#">checkout <i class="pe-7s-angle-right"></i></a></li>
                                        </ul>							
                                    </div>
      
      <div class="collapse navbar-collapse justify-content-end" id="navigation" data-nav-image="">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="../index.html">H&H</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="https://github.com/creativetimofficial/now-ui-kit/issues">Have an issue?</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" rel="tooltip" title="Follow us on Twitter" data-placement="bottom" href="https://twitter.com/CreativeTim" target="_blank">
              <i class="fab fa-twitter"></i>
              <p class="d-lg-none d-xl-none">Twitter</p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" rel="tooltip" title="Like us on Facebook" data-placement="bottom" href="https://www.facebook.com/CreativeTim" target="_blank">
              <i class="fab fa-facebook-square"></i>
              <p class="d-lg-none d-xl-none">Facebook</p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" rel="tooltip" title="Follow us on Instagram" data-placement="bottom" href="https://www.instagram.com/CreativeTimOfficial" target="_blank">
              <i class="fab fa-instagram"></i>
              <p class="d-lg-none d-xl-none">Instagram</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->
  <div class="wrapper">
  <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
  
    <div class="carousel-item active">
      <img src="https://www.hm.com/nt-north/uploads/2019/06/3209B-CPD-1-Resort-Shirts-1280x825.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">


          <h1>RESORT SHIRTS</h1>
 
 <button class="uk-button uk-button-danger">Shop The Collection</button>


          <p>A good looking, comfortable traditional collection</p>
        </div>
    </div>
    <div class="carousel-item">
      <img src="https://www.hm.com/nt-north/uploads/2019/06/3209B-CPD-3-Resort-Shirts-1280x825.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">


<h1>RESORT SHIRTS</h1>

<button class="uk-button uk-button-danger">Shop The Collection</button>


<p>A good looking, comfortable traditional collection</p>
</div>
    </div>
    <div class="carousel-item">
      <img src="https://www.hm.com/nt-north/uploads/2019/06/5010F-CPD-2-a-sunny-getaway-1280x966.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item" >
    
      <img src="https://www.hm.com/nt-north/uploads/2019/06/5010F-CPD-3-a-sunny-getaway-1280x875.jpg" class="d-block w-100" alt="..." >
      <div class="carousel-caption d-none d-md-block">


<h1>sunny-getaway</h1>

<button class="uk-button uk-button-danger">Shop The Collection</button>


<p>A good looking, comfortable traditional collection</p>
</div>
      
    </div>

    <div class="carousel-item" >
    
    <img src="https://www.hm.com/nt-north/uploads/2019/06/5010F-CPD-3-a-sunny-getaway-1280x875.jpg" class="d-block w-100" alt="..." >
    
    
  </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>
</div>
</div>

  </div>

      <div class="content-center">
        <div class="container">
          <h1 class="title">This is our great company.</h1>
          <div class="text-center">
           




          </div>
        </div>
      </div>
    </div>
    <div class="section section-about-us">
      <div class="container">
        <div class="row">
          <div class="col-md-8 ml-auto mr-auto text-center">
            <h2 class="title">Who we are?</h2>
          


  
   
  </div>
</div>


            <h5 class="description">According to the National Oceanic and Atmospheric Administration, Ted, Scambos, NSIDClead scentist, puts the potentially record low maximum sea ice extent tihs year down to low ice extent in the Pacific and a late drop in ice extent in the Barents Sea.</h5>
          </div>
        </div>
      

   
  <!--   Core JS Files   -->
  <script src="/js/jquery.min.js" type="text/javascript"></script>
  <script src="/js/popper.min.js" type="text/javascript"></script>
  <script src="/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="/js/bootstrap-switch.js"></script>
  <script src="/js/vendor/jquery-1.12.0.min.js"></script>
        <script src="/js/bootstrap.min.js"></script>
        <script src="/js/jquery.meanmenu.js"></script>
        <script src="/js/isotope.pkgd.min.js"></script>
        <script src="/js/imagesloaded.pkgd.min.js"></script>
        <script src="/js/owl.carousel.min.js"></script>
        <script src="/js/jquery.counterup.min.js"></script>
        <script src="/js/waypoints.min.js"></script>
        <script src="/js/ajax-mail.js"></script>
        <script src="/js/plugins.js"></script>
        <script src="/js/main.js"></script>
        <script src="/js/uikit.main.js"></script>
        <script src="/js/uikit.js"></script>
        <script src="/js/jquery-3.2.1.min.js"></script>
        <script src="/js/popper.min.js"></script>
	<script src="/js/bootstrap.min.js"></script>
	<script src="/js/plugins.js"></script>
	<script src="/js/active.js"></script>
  <script src="/js/nouislider.min.js" type="text/javascript"></script>

  <script src="/js/bootstrap-datepicker.js" type="text/javascript"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

  <script src="/js/now-ui-kit.js?v=1.3.0" type="text/javascript"></script>
</body>

</html>