<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Jobcore is the best place to connect to your community by pursuing or creating opportunities for everyone in your region.">
    <meta name="author" content="Francis Hasckenberger">

    <meta name="google-site-verification" content="FIxZoWeijGYzh06SGH_73nLsD0mabuUs2RMFrJhguaI" />


    <!-- Facebook cards -->
    <meta property="og:title" content="Jobcore">
    <meta property="og:url" content="http://www.jobcore.ca">
    <meta property="og:type" content="business.business">
    <meta property="og:image" content="http://www.jobcore.ca">
    <meta property="og:description" content="Jobcore is the best place to connect to your community
                                            by pursuing or creating opportunities for everyone in your region.">

    <!-- Twitter cards -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="Jobcore - Connect to your community">
    <meta name="twitter:description" content="Jobcore is the best place to connect to your community by pursuing or creating opportunities for everyone in your region.">
    <meta name="twitter:image" content="http://www.jobcore.ca">



    <link rel="shortcut icon" href="assets/ico/favicon.ico">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Jobcore') }}</title>

    <script src="http://code.jquery.com/jquery-2.0.0.js"></script>
    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/img/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{URL::asset('css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{URL::asset('css/jasny-bootstrap.min.css')}}" type="text/css">
    <!-- Material CSS -->
    <link rel="stylesheet" href="{{URL::asset('css/material-kit.css')}}" type="text/css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" type="text/css">
    <!-- Line Icons CSS -->
    <link rel="stylesheet" href="{{URL::asset('fonts/line-icons/line-icons.css')}}" type="text/css">
    <!-- Line Icons CSS -->
    <link rel="stylesheet" href="{{URL::asset('fonts/line-icons/line-icons.css')}}" type="text/css">
    <!-- Main Styles -->
    <link rel="stylesheet" href="{{URL::asset('css/main.css')}}" type="text/css">
    <link rel="stylesheet" href="{{URL::asset('css/dashboard.css')}}" type="text/css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{URL::asset('extras/animate.css')}}" type="text/css">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="{{URL::asset('extras/owl.carousel.css')}}" type="text/css">
    <link rel="stylesheet" href="{{URL::asset('extras/owl.theme.css')}}" type="text/css">
    <!-- Responsive CSS Styles -->
    <link rel="stylesheet" href="{{URL::asset('css/responsive.css')}}" type="text/css">
    <!-- Slicknav js -->
    <link rel="stylesheet" href="{{URL::asset('css/slicknav.css')}}" type="text/css">
    <!-- Bootstrap Select -->
    <link rel="stylesheet" href="{{URL::asset('css/bootstrap-select.min.css')}}">
    <!-- Jquery Date/Time pickers -->

    <!-- Auto complete -->
    <link rel="stylesheet" href="http://ajax.aspnetcdn.com/ajax/jquery.ui/1.10.3/themes/flick/jquery-ui.css" />



    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>

    <style>
      #view-source {
        position: fixed;
        display: block;
        right: 0;
        bottom: 0;
        margin-right: 40px;
        margin-bottom: 40px;
        z-index: 900;
      }
    </style>


</head>
<body>

<div id="loading-screen">
    <div class="sk-folding-cube">
      <div class="sk-cube1 sk-cube"></div>
      <div class="sk-cube2 sk-cube"></div>
      <div class="sk-cube4 sk-cube"></div>
      <div class="sk-cube3 sk-cube"></div>
    </div>
</div>



  <!-- Header Section Start -->
<div class="header">
  <nav class="navbar navbar-default main-navigation" role="navigation">
    <div class="container">
      <div class="navbar-header">
        <!-- Stat Toggle Nav Link For Mobiles -->
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <!-- End Toggle Nav Link For Mobiles -->
        <a class="navbar-brand logo" href="{{url('/')}}"><img src="{{URL::asset('img/logo.png')}}" alt=""></a>
      </div>
      <!-- brand and toggle menu for mobile End -->

      <!-- Navbar Start -->
      <div class="collapse navbar-collapse" id="navbar">
        <ul class="nav navbar-nav navbar-right">
          @if (Auth::guest())
            <li><a href="{{ url('/login') }}"><i class="lnr lnr-enter"></i> Login</a></li>
            <li><a href="{{ url('/register') }}"><i class="lnr lnr-user"></i> Signup</a></li>
          @else
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><h6><span><i class="lnr lnr-enter"></i></span> {{ Auth::user()->username }}</h6></a>
              <ul class="dropdown-menu">
                <li><a href="{{ url('/dashboard') }}"><i class="lnr lnr-user"></i> Dashboard</a></li>
                <li><a href="{{ url('/logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">Logout</a>
                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
                </form>
                </li>
              </ul>

           </li>
          @endif
          <li class="postadd">
            <a class="btn btn-danger btn-post" href="{{ url('/jobs/create') }}"><span class="fa fa-plus-circle"></span> Post a job</a>
          </li>
        </ul>
      </div>
      <!-- Navbar End -->
    </div>
  </nav>
</div>
<!-- Header Section End -->

  @yield('content')

<!-- *****************************************************************************************************************
FOOTER
***************************************************************************************************************** -->

<!-- Footer Section Start -->
<footer>
<!-- Footer Area Start -->
<section class="footer-Content">
	<div class="container">
		<div class="row">
			<div class="col-md-3 col-sm-6 col-xs-12 wow fadeIn" data-wow-delay="0">
       <div class="widget">
         <h3 class="block-title">About us</h3>
         <div class="textwidget">
           <p>Jobcore is the best place to connect to your community
              by pursuing or creating opportunities for everyone in your region.</p>
         </div>
       </div>
     </div>
			<div class="col-md-3 col-sm-6 col-xs-12 wow fadeIn" data-wow-delay="0.5">
				<div class="widget">
					<h3 class="block-title">Useful Links</h3>
					<ul class="menu">
           <li><a href="#">Home</a></li>
           <li><a href="#">Categories</a></li>
           <li><a href="#">FAQ</a></li>
           <li><a href="#">Left Sidebar</a></li>
           <li><a href="#">Pricing Plans</a></li>
           <li><a href="#">About</a></li>
           <li><a href="#">Contact</a></li>
           <li><a href="#">Full Width Page</a></li>
           <li><a href="#">Terms of Use</a></li>
           <li><a href="#">Privacy Policy</a></li>
         </ul>
				</div>
			</div>
			<div class="col-md-3 col-sm-6 col-xs-12 wow fadeIn" data-wow-delay="1s">
				<div class="widget">
         <h3 class="block-title">Disclaimer</h3>
          <p>We use your IP address to get a general idea of your location (city, region) so you don't have to enter it manually. </p>
       </div>
			</div>
			<div class="col-md-3 col-sm-6 col-xs-12 wow fadeIn" data-wow-delay="1.5s">
				<div class="widget">
					<h3 class="block-title">Contact</h3>
            <p>See something on this website that should be changed? Send me an email: <a class="email_link" href="">Admin@jobcore.ca</a> and I'll look into it!</p>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Footer area End -->

<!-- Copyright Start  -->
<div id="copyright">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
       <div class="site-info pull-left">
         <p>Jobcore 2017</p>
       </div>
       <div class="bottom-social-icons social-icon pull-right">
         <a class="facebook" target="_blank" href="https://www.linkedin.com/in/francis-hackenberger-13212b10a"><i class="fa fa-facebook"></i></a>
         <a class="twitter" target="_blank" href="https://www.linkedin.com/in/francis-hackenberger-13212b10a"><i class="fa fa-twitter"></i></a>
         <a class="dribble" target="_blank" href="https://www.linkedin.com/in/francis-hackenberger-13212b10a"><i class="fa fa-dribbble"></i></a>
         <a class="flickr" target="_blank" href="https://www.linkedin.com/in/francis-hackenberger-13212b10a"><i class="fa fa-flickr"></i></a>
         <a class="youtube" target="_blank" href="https://www.linkedin.com/in/francis-hackenberger-13212b10a"><i class="fa fa-youtube"></i></a>
         <a class="google-plus" target="_blank" href="https://www.linkedin.com/in/francis-hackenberger-13212b10a"><i class="fa fa-google-plus"></i></a>
         <a class="linkedin" target="_blank" href="https://www.linkedin.com/in/francis-hackenberger-13212b10a"><i class="fa fa-linkedin"></i></a>
       </div>
			</div>
		</div>
	</div>
</div>
<!-- Copyright End -->
<script>
$(window).load(function() {
  $("#loading-spinner").fadeOut();
  $('#loading-screen').delay(100).fadeOut('slow');
  $('body').delay(100).css({'overflow':'visible'});
});
</script>

</footer>
<!-- Footer Section End -->

<!-- Go To Top Link -->
<a href="#" class="back-to-top">
<i class="fa fa-angle-up"></i>
</a>

   <!-- Scripts -->
   <!-- Main JS  -->
   <script type="text/javascript" src="{{URL::asset('js/bootstrap.min.js')}}"></script>
   <script type="text/javascript" src="{{URL::asset('js/material.min.js')}}"></script>
   <script type="text/javascript" src="{{URL::asset('js/material-kit.js')}}"></script>
   <script type="text/javascript" src="{{URL::asset('js/jquery.parallax.js')}}"></script>
   <script type="text/javascript" src="{{URL::asset('js/owl.carousel.min.js')}}"></script>
   <script type="text/javascript" src="{{URL::asset('js/wow.js')}}"></script>
   <script type="text/javascript" src="{{URL::asset('js/main.js')}}"></script>
   <script type="text/javascript" src="{{URL::asset('js/jquery.counterup.min.js')}}"></script>
   <script type="text/javascript" src="{{URL::asset('js/waypoints.min.js')}}"></script>
   <script type="text/javascript" src="{{URL::asset('js/jasny-bootstrap.min.js')}}"></script>
   <script type="text/javascript" src="{{URL::asset('js/bootstrap-select.min.js')}}"></script>
   <script type="text/javascript" src="{{URL::asset('js/dashboard.js')}}"></script>
   <script type="text/javascript" src="{{URL::asset('js/geobytes.js')}}"></script>
   <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>


</body>
</html>
