<?php
session_start();

if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {

    header('Location: index.php');
}

//create a key for hash_hmac function
if (empty($_SESSION['key'])) {

    $_SESSION['key'] = bin2hex(random_bytes(32));
}
    
//create CSRF token
$csrf = hash_hmac('sha256', 'this is some string: index.php', $_SESSION['key']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Furniture Store | Register</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf" content="<?php echo $csrf;?>">
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
				<h2>register</h2>
				<ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="">register</a></li>
				</ul>
			</div>
		</div>
	</div>
</section>
<div id="content" class="cart_page checkout_page register_page">
<!-- cart -->
	<div id="register" class="cart_section checkout_section register_section">
		<div class="container-fluid" id="checkout">
				
			<div class="row billing_and_payment_option wow fadeInDown   animated">
				<div class="heading_wrapper wow fadeInDown animated">
					<h2 class="wow fadeInDown animated">Registration</h2>
					<p class="wow fadeInDown animated">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text </p>
				</div>
				<!-- Billing Address -->
				<div class="col-sm-6 col-lg-6">
					<div class="login_box">
					<h3>Create Your Account</h3>
						<form id="register-form" method="POST" action="javascript:void(0);" class="eb-form eb-mailform form-checkout" novalidate="novalidate">
							<div class="form-wrap has-error">
								<input class="form-input form-control" id="checkout-first-name-1" type="text" name="ime" data-constraints="@Required" placeholder="First Name">
							</div>
							<div class="form-wrap has-error">
								<input class="form-input form-control" id="checkout-last-name-1" type="text" name="prezime" data-constraints="@Required" placeholder="Last Name">
							</div>
							<div class="form-wrap">
								<input class="form-input form-control" id="checkout-email-1" type="email" name="email" data-constraints="@Email @Required" placeholder="E-Mail">
							</div>
							<div class="form-wrap">
								<input class="form-input form-control" id="checkout-city-1" type="password" name="lozinku" data-constraints="@Required" placeholder="Password:">                         
							</div>
							<div class="form-wrap">
								<input class="form-input form-control" id="checkout-phone-1" type="password" name="potvrda_lozinke" data-constraints="@Numeric" placeholder="Confirm Password:">
							</div>

							<div class="text-danger">
							</div>

							<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" id="defaultUnchecked">
								<label class="custom-control-label register-remember" for="defaultUnchecked">Remember me on this device</label>
                            </div>
							<button type="submit" name="submit" class="btn ">Register</button>
							
							<p class="signInclass"> Already have an account? &nbsp;<a href="login.php">Sign In</a> </p>
						
					</form>
					</div>
				</div>
				<!-- Delivery Address  -->
				<div class="col-sm-6 col-lg-6  wow fadeInDown   animated registration">
					<h3>Benefit of Registration</h3>
					 <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum</p>
					 
					 <ul>
						<li><i class="fa fa-check"></i> If you are going to use a passage of Lorem Ipsum</li>
						<li><i class="fa fa-check"></i> All the Lorem Ipsum generators on the Internet tend</li>
						<li><i class="fa fa-check"></i> The standard chunk of Lorem Ipsum used since the 1500s</li>
						<li><i class="fa fa-check"></i> a Latin professor at Hampden-Sydney College in Virginia</li>
						<li><i class="fa fa-check"></i> It is a long established fact that a reader </li>
					 </ul>
				</div>
			</div>
			<!-- your shopping cart -->
		</div>	
	</div>	
<!-- cart end-->	
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
						<h2 class="wow fadeInDown animated">Quic Menu</h2>
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
	<script src="assets/js/register.js"></script>
<!-- script files -->
</body>
</html>
