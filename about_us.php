<?php
session_start();

//require_once 'includes/baza.php'; 
//require_once 'config/db_config.php';

$csrf = hash_hmac('sha256', 'this is some string: index.php', $_SESSION['key']);

//$conn = database_connection(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Furniture Store | About us</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/responsive.css">
	<link rel="stylesheet" href="assets/vendor/owl.carousel/assets/owl.carousel.css"> 
	<link rel="stylesheet" href="assets/vendor/wow/animate.css"> 

	<link href="https://fonts.googleapis.com/css2?family=Karla:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<script src="assets/vendor/jquery/jquery.min.js"></script>
	<script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
	<script src="assets/vendor/wow/wow.min.js"></script>
	<script>
	new WOW().init();
	  wow = new WOW(
		{
		  boxClass:     'wow',      // default
		  animateClass: 'animated', // default
		  offset:       0,          // default
		  mobile:       true,       // default
		  live:         true        // default
		}
		)
		wow.init();
	</script>
	
</head>
<body>
    <?php
	   require 'includes/navbar.php';
	?>

<!-- breadcrumb -->
<section class="main_breadcrumb">
	<div class="container-fluid">
		<div class="row">
			<div class="breadcrumb-content">
				<h2>About Us</h2>
				<ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="">About Us</a></li>
				</ul>
			</div>
		</div>
	</div>
</section>
<div id="content" class="about_page">
<!-- about Us -->
	<div id="about_us" class="about_section">
		<div class="container-fluid">
			<div class="col-sm-12">
			<div class="row">
				<div class="col-sm-6 pd-0">
					<div class="about_text wow slideInLeft">
						<h1>What We Offer</h1>
						<p>We're thrilled to have won three awards at the Family Business of the Year Awards 2022.

							It's a real privilege to be recognised alongside some of Serbian's best family businesses. Despite our size, we remain a family business at heart, which
							means whenever you shop in one of our 3 stores, you'll always be invited to make yourself at home.</p>
						<ul class="list-marked">
              <li>Standing out from competitors (both online and in store)</li>
              <li>The customers' need to physically see the product</li>
              <li>20 year structural guarantee</li>

            </ul>
					<a class="btn button button-sm button-primary button-zakaria" href="#">shop now</a>
						</div>
				</div>
				<div class="col-sm-6">
					<div class="about_images wow slideInRight">
						<img src="assets/image/about/about-img.png">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- about Us end-->
<!-- Our Astrologers Work for You -->
<div id="website_visitors" class="astrologers-work">
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12 text-center condition-set">
				<div class="astrologers_title">
					<h2 class="wow fadeInDown animated">Our furniture Shop Work for You</h2>
					<p class="wow fadeInDown animated">Our furniture Shop delivers daily and monthly Shop for all readers of our website visitors.
					Recognized as the best esoteric and furniture online in the USA. Every day we publish fresh products, shop by and for professional products, personalized predictions, shop readings, shose and Chinese furniture Brands and much more.</p>
					<a href="#"class="btn">Shop Now</a>
				</div>
			</div>
			
		</div>
	</div>
</div>



</div>
<!-- Footer Section -->
	<!-- Footer Section -->
	<footer id="footer" class="footer">
		<div class="container-fluid">
			<div class="row">

			<div class="footer_matter">
				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					<div class="footer_logo_wrapper">
						<!--<img src="assets/image/logo/footer_logo.png" alt="footer_logo" class="img-responsive wow fadeInDown animated">-->
						<h2 class="wow fadeInDown animated">Contact Detail</h2>
						   <ul>
						        <li><i class="fa fa-map-marker"></i> Borcanskih Zrtava 1914</li>
								<li><i class="fa fa-map-marker"></i> 11211 Borca,Belgrade,Serbia</li>
								<li><i class="fa fa-phone"></i> Phone. (069) 606-557</li>
								<li><i class="fa fa-fax"></i> Fax. (123) 456-7890</li>
								<li><i class="fa fa-envelope"></i> Email: dekidjurdjev@gmail.com</li>
								
							</ul>
							
						
						<ul>
							<li class="wow fadeInDown animated"><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li class="wow fadeInDown animated"><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li class="wow fadeInDown animated"><a href="#"><i class="fa fa-youtube-play"></i></a></li>
							<li class="wow fadeInDown animated"><a href="#"><i class="fa fa-linkedin"></i></a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					<div class="footer_list_wrapper">
						<h2 class="wow fadeInDown animated">Extra Detail</h2>
						   <ul class="extra-list list-unstyled">
                        <li><a href="#">Brands</a></li>
                        <li><a href="#">Gift Vouchers</a></li>
                        <li><a href="#">Affilates</a></li>
                        <li><a href="#">Specials</a></li>
                    </ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					<div class="footer_list_wrapper">
						<h2 class="wow fadeInDown animated">Quick Menu</h2>
						   <ul>
								<li><a href="index.php">Home</a></li>
								<li><a href="index.php">About Us</a></li>
								<li><a href="index.php">Shop</a></li>
								<li><a href="index.php">Blog</a></li>
								<li><a href="index.php">Contact</a></li>
								
							</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					<div class="download_wrapper">
						<h2 class="wow fadeInDown animated">Download App</h2>
						<p class="wow fadeInDown animated">Download Our Mobile App</p>
						<div class="download_btn_wrapper">
						  <a href="#">
							<img src="assets/image/App-Store.png" class="img-responsive wow fadeInDown animated" alt="App_Store_img">
						  </a>
						  <a href="#">
							<img src="assets/image/Google-Play.png" class="img-responsive wow fadeInDown animated" alt="Google_Play_img">
						  </a>
						</div>
					</div>
				</div>
				
				
			</div>
		</div>
	</div>
</footer>
	
	<div class="footer_copyright">
		<div class="container-fluid">
		<p class="wow fadeInDown animated">© Copyright 2022 by Furniture Store. All right Reserved - Design By <a href="https://www.facebook.com/dejan.djurdjev.1/" target="_blank">Dejan Đurđev</a></p>
		</div>
	</div>
<!-- Footer Section End -->
<!-- back-to-top scrtion -->
<div class="top_button">
  <a class="back-to-top" style="cursor:pointer;" id="top-scrolltop"><i class="fa fa-angle-up"></i></a>
</div>
<!-- back-to-top scrtion End-->
<script>

$(document).ready(function(){
	$('#testimonial').owlCarousel({	
		items: 3,
		itemsDesktop:[1199,3],
		itemsDesktopSmall:[992,3],
		itemsTablet:[768,2],
		itemsMobile:[450,1],
		autoPlay: 10000,
		pagination: true,
		navigation: true,
		navigationText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>']
	});
});
</script>
<!-- script files -->
	<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/js/custom.js"></script>
<!-- script files -->
</body>
</html>
