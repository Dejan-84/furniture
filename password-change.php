<?php
session_start();

if (isset($_GET['email'])) {

    $email = htmlspecialchars($_GET['email']);
    $code = htmlspecialchars($_GET['code']);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Furniture Store | Password Reset</title>
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
	//require 'includes/navbar.php';
?>

<!-- breadcrumb -->
<section class="main_breadcrumb">
	<div class="container-fluid">
		<div class="row">
			<div class="breadcrumb-content">
				<h2>Password Change</h2>
			</div>
		</div>
	</div>
</section>
<div id="content" class="cart_page checkout_page register_page login_page">
<!-- cart -->
	<div id="register" class="cart_section checkout_section register_section">
		<div class="row">
			<div class="col-md-6 col-md-offset-3" id="checkout">
					
				<div class="row billing_and_payment_option wow fadeInDown   animated">

					<!-- Billing Address -->
					<div class="login_box">
						<h3>Reset Your Password</h3>
							<form id='submit-form' method="post" action="javascript:void(0);" novalidate="novalidate">
								<div class="form-group">
									<label for="email">Email:</label>
									<input class="form-input form-control" type="email" name="email" value="<?php echo $email; ?>" readonly="true">
								</div>
                                <div class="form-group">
									<label for="email">Password:</label>
                                    <input class="form-input form-control" type="password" name="password">
								</div>
                                <input type="hidden" name="code" value="<?php echo $code; ?>">

								<div class="text-danger">
								</div>

								<button type="submit" name="submit" class="btn btn-primary">Submit</button>
							
							</form>
						<div class="clear"></div>
					</div>
					<!-- Delivery Address  -->
				</div>
				<!-- your shopping cart -->
			</div>	
		</div>	
	</div>
<!-- cart end-->	
</div>

<!-- The Modal -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog modal-sm">
    <div class="modal-content">
    
        <!-- Modal Header -->
        <div class="modal-header">
        <h4 class="modal-title">Status Message</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body text-danger text-strong">
        
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
<!-- script files -->
	<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/js/custom.js"></script>
	<script src="assets/js/password-change.js"></script>
<!-- script files -->
</body>
</html>
