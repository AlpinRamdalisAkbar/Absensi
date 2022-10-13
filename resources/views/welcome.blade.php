<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">

	<title>Selamat Datang</title>
<!--
Comila Template
http://www.templatemo.com/tm-490-comila
-->
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="">
	<meta name="description" content="">

	<!-- stylesheets css -->
	<link rel="stylesheet" href="../../assets/dashboard/css/bootstrap.min.css">
	<link rel="stylesheet" href="../../assets/dashboard/css/animate.min.css">

  	<link rel="stylesheet" href="../../assets/dashboard/css/et-line-font.css">
	<link rel="stylesheet" href="../../assets/dashboard/css/font-awesome.min.css">

  	<link rel="stylesheet" href="../../assets/dashboard/css/vegas.min.css">
	<link rel="stylesheet" href="../../assets/dashboard/css/style.css">

	<link href='https://fonts.googleapis.com/css?family=Rajdhani:400,500,700' rel='stylesheet' type='text/css'>

</head>
<body>

<!-- preloader section -->
<section class="preloader">
	<div class="sk-circle">
       <div class="sk-circle1 sk-child"></div>
       <div class="sk-circle2 sk-child"></div>
       <div class="sk-circle3 sk-child"></div>
       <div class="sk-circle4 sk-child"></div>
       <div class="sk-circle5 sk-child"></div>
       <div class="sk-circle6 sk-child"></div>
      <div class="sk-circle7 sk-child"></div>
       <div class="sk-circle8 sk-child"></div>
       <div class="sk-circle9 sk-child"></div>
       <div class="sk-circle10 sk-child"></div>
       <div class="sk-circle11 sk-child"></div>
       <div class="sk-circle12 sk-child"></div>
     </div>
</section>

<!-- home section -->
<section id="home">
	<div class="container">
		<div class="row">

			<div class="col-md-offset-2 col-md-8 col-sm-12">

				<div class="home-thumb">
					<h1 class="wow fadeInUp" data-wow-delay="0.4s">Halo, Selamat Datang</h1>
                    @if (Route::has('login'))
                    @auth
                    <h3 class="wow fadeInUp" data-wow-delay="0.6s">Silahkan <strong>Login</strong>!</h3>
                    <a href="{{ url('/home') }}" class="btn btn-lg btn-default smoothScroll wow fadeInUp hidden-xs" data-wow-delay="0.8s">Home</a>
                    @else
                    <h3 class="wow fadeInUp" data-wow-delay="0.6s">Silahkan <strong>Login</strong> atau <strong>Registrasi</strong>!</h3>
                    <a href="{{ route('login') }}" class="btn btn-lg btn-default smoothScroll wow fadeInUp hidden-xs" data-wow-delay="0.8s">Login</a>
                        @if (Route::has('register'))
        			    <a href="{{ route('register') }}" class="btn btn-lg btn-success smoothScroll wow fadeInUp" data-wow-delay="1.0s">Register</a>
                    @endif
                    @endauth

                    @endif
				</div>
			</div>

		</div>
	</div>
</section>

<!-- modal -->
<div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content modal-popup">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h2 class="modal-title">Our Newsletter</h2>
        </div>
        <form action="#" method="post">
          <input name="fullname" type="text" class="form-control" id="fullname" placeholder="Full Name">
          <input name="email" type="text" class="form-control" id="email" placeholder="Email Address">
          <input name="submit" type="submit" class="form-control" id="submit" value="Subscribe Now">
        </form>
        <p>Thank you for your visiting!</p>
      </div>
  </div>
</div>


<!-- Back top -->
<a href="#back-top" class="go-top"><i class="fa fa-angle-up"></i></a>

<!-- javscript js -->
<script src="assets/dashboard/js/jquery.js"></script>
<script src="assets/dashboard/js/bootstrap.min.js"></script>

<script src="assets/dashboard/js/vegas.min.js"></script>

<script src="assets/dashboard/js/wow.min.js"></script>
<script src="assets/dashboard/js/smoothscroll.js"></script>
<script src="assets/dashboard/js/custom.js"></script>

</body>
</html>
