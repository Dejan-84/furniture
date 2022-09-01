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
	<title>Furniture Store | Contact Us</title>
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
				<h2>Contact Us</h2>
				<ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="contact_us.php">Contact Us</a></li>
				</ul>
			</div>
		</div>
	</div>
</section>
<iframe src="https://maps.google.com/maps?q=borcanskih%20zrtava%201914%2026&t=&z=15&ie=UTF8&iwloc=&output=embed" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
<div id="content" class="contact_page">
<!-- Our Services -->
	<div id="contact">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-4">
					<div class="contact-box-wrap">
						<div class="contact-box">
						  <div class="contact-box-item">
							<p class="contact-box-title">Get social</p>
								<ul class="top-header-social">
									<li><a href="#"><i class="fa fa-facebook"></i></a></li>
									<li><a href="#"><i class="fa fa-twitter"></i></a></li>
									<li><a href="#"><i class="fa fa-instagram"></i></a></li>
									<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
									<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								</ul>
						  </div>
						  <div class="contact-box-item">
							<p class="contact-box-title">Phone</p>
							<div class="link-inline"><a href="#"><i class="fa fa-phone"></i> +381 69 606 557</a></div>
						  </div>
						  <div class="contact-box-item">
							<p class="contact-box-title">E-mail</p>
							<div class="link-inline"><a href="#"><i class="fa fa-envelope-o"></i> dekidjurdjev@gmail.com</a></div>
						  </div>
						  <div class="contact-box-item">
							<p class="contact-box-title">Address</p>
							<div class="link-inline link-inline-top"><a href="#"><i class="fa fa-map-marker"></i> Borcanskih Zrtava 1914, 26/11, 11211 Borca</a></div>
						  </div>
						</div>
					</div>
				</div>
				<div class="col-sm-8">
					<div class="block-sm login_box">
						<h3>Get in Touch</h3>
						<p>We are available 24/7 by fax, e-mail or by phone. You can also use our quick contact form to ask a question about our services and projects we’re working on.</p>
						<div class="comments-form-wrapper clearfix comment-respond">
							<form class="comment-form" method="post" id="postComment" action="javascript:void(0);" novalidate="novalidate">
								<div class="field">
									<label for="name">Name<em class="required">*</em></label>
									<input type="text" class="input-text" title="Name" value="" id="user" name="name">
								</div>
								<div class="field">
									<label for="email">Email<em class="required">*</em></label>
									<input type="email" class="input-text validate-email" title="Email" value="" id="email" name="email" >
								</div>
								<div class="clear"></div>
								<div class="field aw-blog-comment-area">
									<label for="comment">Your Message<em class="required">*</em></label>
									<textarea rows="5" cols="50" class="input-text" title="Comment" id="comment" name="message"></textarea>
								</div>
								<div class="text-danger">
								</div>

								<div style="width:96%" class="button-set">
									<input type="hidden" value="1" name="blog_id">
									<button type="submit" class="btn submit" name="submit"><span><span>Send message</span></span></button>
								</div>

							</form>
						</div>
					</div>
				</div>
				
				
				
				
				
			</div>
		</div>
	</div>
<!-- Our Services End-->

</div>

<!-- Footer Section -->
	<!-- Footer Section -->
	<footer id="footer" class="footer">
		<div class="container-fluid">
			<div class="row">
			<!-- Newslatter--
				<div class="footer_newslatter wow fadeInDown animated">
						<div class="box">
							<div class="row">
								<div class="col-sm-3">
									<strong class="wow fadeInDown animated">sign up for free</strong>
								</div>
								<div class="col-sm-4">
									<p class="wow fadeInDown animated">get your daily furniture, daily lovescope and daily tarot by email</p>
								</div>
								<div class="col-sm-5">
									<form id="newsletter" accept-charset="utf-8">
										<div class="success wow fadeInDown animated" style="display: none;">Your subscribe request has been sent!</div>
										<label class="email">
											<input type="email" placeholder="Enter your email here" class="wow fadeInDown animated">
										</label>
										<a href="#" data-type="submit" class="wow fadeInDown animated">subscribe</a>
									</form>
								</div>
							</div>
						</div>
				</div>
			-- Newslatter end-->
			<div class="footer_matter">
				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					<div class="footer_logo_wrapper">
						<!--<img src="assets/image/logo/footer_logo.png" alt="footer_logo" class="img-responsive wow fadeInDown animated">-->
						<h2 class="wow fadeInDown animated">Contact Detail</h2>
						   <ul>
								<li><i class="fa fa-map-marker"></i> Borcanskih Zrtava 1914, 26/11</li>
								<li><i class="fa fa-map-marker"></i> 11211 Borca, Belgrade, Serbia</li>
								<li><i class="fa fa-phone"></i> Phone. (+381)69 606-557</li>
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
<!-- script files -->
	<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/js/custom.js"></script>
	<script src="assets/js/message.js"></script>
<!-- script files -->
</body>
</html>
