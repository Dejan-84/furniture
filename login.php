<?php
session_start();

//unset($_SESSION['error']);

//print_r($_SESSION);

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
	<title>Furniture Store | login</title>
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
<header class="header-area">
	<!-- Top Header -->
	<div class="top-header">
		<div class="container-fluid">
			<div class="row align-items-center">
				<div class="col-lg-4 col-md-12">
					<ul class="top-header-contact-info">
							<li class="wow fadeInDown animated"><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li class="wow fadeInDown animated"><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li class="wow fadeInDown animated"><a href="#"><i class="fa fa-youtube-play"></i></a></li>
							<li class="wow fadeInDown animated"><a href="#"><i class="fa fa-linkedin"></i></a></li>
						</ul>
					</div>
						<div class="col-lg-4 col-md-12">
						<ul class="top-offer-content">
						    <li>Get Upto 50% Discount Everyday</li>
						</ul>
				   </div>
				
				<div class="col-lg-4 col-md-12">
					<ul class="top-header-social header_account">
						<li><a href="login.php"><i class="fa fa-sign-in"></i> Login <span>/</span></a> </li>
						<li><a href="register.php"><i class="fa fa-pencil-square-o"></i> Register</a></li>
					</ul>
				</div>

			</div>
		</div>
	</div>
	<!-- End Top Header -->

	<!-- Start Navbar Area -->
	<div class="navbar-area">
		<div class="furniture-responsive-nav">
			<div class="container-fluid">
				<div class="row">
					<div class="furniture-responsive-menu">
						<div class="logo">
							<a href="index.php">
								<img src="assets/image/logo/logo.png" alt="logo">
							</a>
						</div>
						
						
						<div class="others-option align-items-center">
									<div class="option-item">
										<div class="cart-btn">
											<a href="cart.html"><i class="fa fa-shopping-cart"></i><span>1</span></a>
										</div>
									</div>

									<div class="option-item">
										<div class="search-btn-box">
											<a href="#search"><i class="search-btn fa fa-search"></i></a>
										</div>
									</div>
                             </div>
					<!--mobile Menu  -->

					<div id="mySidenav" class="sidenav">
						<div class="menu_slid_bg">
							<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
							
								<div class="col-sm-12" style="padding: 0; width: 250px; right: 15px; ">
									<h3>Categories</h3>
									
									<ul class="accordion" id="accordion-category">
										<li class="panel mobile_menu_li">
											<a href="index.php" class="mar-mobile"></i> Home</a>
										</li>
										<li class="panel mobile_menu_li">
											<a href="about_us.html" class="mar-mobile"></i> about us</a>
										</li>
										  	 <li class="nav-item panel mobile_menu_li"><a href="#" class="dropdown-toggle mar-mobile" data-toggle="dropdown" data-hover="Megamenu">Catalog</a><span class="head"><a style="" class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion-category" href="#category84" aria-expanded="false">
												<span class="plus">+</span><span class="minus">-</span></a></span>
												<div id="category84" class="panel-collapse collapse" style="clear: both; height: 0px;" aria-expanded="false">
										<ul >
											<li><div class="row">
                                              <div class="col-menu col-md-3">
                                                <h6 class="title">Tables</h6>
                                                  <div class="content">
                                                    <ul class="menu-col">
                                                        <li><a href="products.html">Side Table</a></li>
                                                        <li><a href="products.html">Dressing Table</a></li>
                                                        <li><a href="products.html">Coffee Table</a></li>
                                                        <li><a href="products.html">Computer Table</a></li>
                                                        <li><a href="products.html">Office Table</a></li>
                                                    </ul>
                                                </div>
                                            </div><!-- end col-3 -->
                                            <div class="col-menu col-md-3">
                                                <h6 class="title">Chair</h6>
                                                <div class="content">
                                                    <ul class="menu-col">
                                                        <li><a href="products.html">Side Table</a></li>
                                                        <li><a href="products.html">Dressing Table</a></li>
                                                        <li><a href="products.html">Coffee Table</a></li>
                                                        <li><a href="products.html">Computer Table</a></li>
                                                        <li><a href="products.html">Office Table</a></li>
                                                    </ul>
                                                </div>
                                            </div><!-- end col-3 -->
                                            <div class="col-menu col-md-3">
                                                <h6 class="title">Wardrobe</h6>
                                                <div class="content">
                                                    <ul class="menu-col">
                                                        <li><a href="products.html">Side Table</a></li>
                                                        <li><a href="products.html">Dressing Table</a></li>
                                                        <li><a href="products.html">Coffee Table</a></li>
                                                        <li><a href="products.html">Computer Table</a></li>
                                                        <li><a href="products.html">Office Table</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-menu col-md-3">
                                                <h6 class="title">Best Selling</h6>
                                                <div class="content">
                                                    <ul class="menu-col">
                                                        <li><a href="products.html">Side Table</a></li>
                                                        <li><a href="products.html">Dressing Table</a></li>
                                                        <li><a href="products.html">Coffee Table</a></li>
                                                        <li><a href="products.html">Computer Table</a></li>
                                                        <li><a href="products.html">Office Table</a></li>
                                                    </ul>
                                                </div>
                                            </div><!-- end col-3 -->
                                        </div><!-- end row -->
                                    </li>
                                </li>
                              </ul>
                          </div>
									</li> 
										
										</li>
										<li class="panel mobile_menu_li">
											<a href="#" class="mar-mobile">Shop</a>
												<span class="head"><a style="" class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion-category" href="#category85" aria-expanded="false">
												<span class="plus">+</span><span class="minus">-</span></a></span>
												<div id="category85" class="panel-collapse collapse" style="clear: both; height: 0px;" aria-expanded="false">
													<ul>
														<li>
															 <a href="services.html">Products List</a>
														</li>
														<li>
															 <a href="cart.html">Cart</a>
														</li>
														<li>
															 <a href="checkout.html">Checkout</a>
														</li>
														<li>
															 <a href="single-products.html">Products Details</a>
														</li>
														<li>
															 <a href="404.html">404</a>
														</li>
													</ul>
												</div>
										</li>
										
										<li class="panel mobile_menu_li">
											<a href="#" class="mar-mobile">Blog</a>
												<span class="head"><a style="" class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion-category" href="#category86" aria-expanded="false">
												<span class="plus">+</span><span class="minus">-</span></a></span>
												<div id="category86" class="panel-collapse collapse" style="clear: both; height: 0px;" aria-expanded="false">
													<ul>
														<li>
															 <a href="blog.html">Blog Grid</a>
														</li>
														<li>
															 <a href="blog-left.html">Blog Grid View Left</a>
														</li>
														<li>
															 <a href="blog-right.html">Blog Grid View right</a>
														</li>
														<li>
															 <a href="blog-details.html">Blog Details</a>
														</li>
													</ul>
												</div>
										</li>
										
										<li class="panel mobile_menu_li">
											<a href="#" class="mar-mobile">my Account</a>
												<span class="head"><a style="" class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion-category" href="#category87" aria-expanded="false">
												<span class="plus">+</span><span class="minus">-</span></a></span>
												<div id="category87" class="panel-collapse collapse" style="clear: both; height: 0px;" aria-expanded="false">
													<ul>
														<li>
															 <a href="login.php"> Login </a>
														</li>
														<li>
															 <a href="register.php"> Register</a>
														</li>
													</ul>
												</div>
										</li>

										<li class="panel mobile_menu_li">
											<a href="contact_us.html" class="mar-mobile"> Contact Us</a>
										</li>
									</ul>
							<div class="clear"></div>
							</div>
							 
						</div>
					</div>

					<span class="menu_open" onclick="openNav()">&#9776; Menu</span>
					<!-- mobile Menu  end-->
					</div>
				</div>
			</div>
		</div>

		<div class="furniture-nav">
			<div class="container-fluid">
				<div class="row">
					<div class="header_menu_wrapper">
						<nav class="navbar navbar-expand-md navbar-light">
							<a class="navbar-brand" href="index.php">
								<img src="assets/image/logo/logo.png" alt="logo">
							</a>

							<div class="collapse navbar-collapse mean-menu" style="display: block;">
								<ul class="navbar-nav">
									<li class="nav-item"><a href="index.php" class="nav-link active">Home</a></li>
									
									<li class="nav-item"><a href="about_us.html" class="nav-link">About Us</a></li>

									
									
									<li class="nav-item"><a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="Megamenu">Shop<i class="fa fa-angle-down"></i></a>
										<ul class="dropdown-menu megamenu megamenu-pdd animated">
											<li><div class="row">
                                            <div class="col-menu col-md-3">
                                                <h6 class="title">Tables</h6>
                                                <div class="content">
                                                    <ul class="menu-col">
                                                        <li><a href="products.html">Side Table</a></li>
                                                        <li><a href="products.html">Dressing Table</a></li>
                                                        <li><a href="products.html">Coffee Table</a></li>
                                                        <li><a href="products.html">Computer Table</a></li>
                                                        <li><a href="products.html">Office Table</a></li>
                                                    </ul>
                                                </div>
                                            </div><!-- end col-3 -->
                                            <div class="col-menu col-md-3">
                                                <h6 class="title">Chair</h6>
                                                <div class="content">
                                                    <ul class="menu-col">
                                                        <li><a href="products.html">Side Table</a></li>
                                                        <li><a href="products.html">Dressing Table</a></li>
                                                        <li><a href="products.html">Coffee Table</a></li>
                                                        <li><a href="products.html">Computer Table</a></li>
                                                        <li><a href="products.html">Office Table</a></li>
                                                    </ul>
                                                </div>
                                            </div><!-- end col-3 -->
                                            <div class="col-menu col-md-3">
                                                <h6 class="title">Wardrobe</h6>
                                                <div class="content">
                                                    <ul class="menu-col">
                                                        <li><a href="products.html">Side Table</a></li>
                                                        <li><a href="products.html">Dressing Table</a></li>
                                                        <li><a href="products.html">Coffee Table</a></li>
                                                        <li><a href="products.html">Computer Table</a></li>
                                                        <li><a href="products.html">Office Table</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-menu col-md-3">
                                                <h6 class="title">Best Selling</h6>
                                                <div class="content">
                                                    <ul class="menu-col">
                                                        <li><a href="products.html">Side Table</a></li>
                                                        <li><a href="products.html">Dressing Table</a></li>
                                                        <li><a href="products.html">Coffee Table</a></li>
                                                        <li><a href="products.html">Computer Table</a></li>
                                                        <li><a href="products.html">Office Table</a></li>
                                                    </ul>
                                                </div>
                                            </div><!-- end col-3 -->
                                        </div><!-- end row -->
                                    </li></li>

										</ul>
									</li> 
									<li class="nav-item"><a href="#" class="nav-link">Pages <i class="fa fa-angle-down"></i></a>
										<ul class="dropdown-menu">

											<li class="nav-item"><a href="#" class="nav-link">Shop <i class="fa fa-angle-right"></i></a>
												<ul class="dropdown-menu">
													<li class="nav-item"><a href="products.php" class="nav-link">Products List</a></li>

													<li class="nav-item"><a href="cart.html" class="nav-link">Cart</a></li>

													<li class="nav-item"><a href="checkout.html" class="nav-link">Checkout</a></li>

													<li class="nav-item"><a href="single-products.html" class="nav-link">Products Details</a></li>
												</ul>
											</li>

											<li class="nav-item"><a href="404.html" class="nav-link">404</a></li>
										</ul>
									</li>

									<li class="nav-item"><a href="#" class="nav-link">Blog <i class="fa fa-angle-down"></i></a>
										<ul class="dropdown-menu">
											<li class="nav-item"><a href="blog.html" class="nav-link">Blog Grid</a></li>
											
											<li class="nav-item"><a href="blog-left.html" class="nav-link">Blog Grid View Left</a></li>
											
											<li class="nav-item"><a href="blog-right.html" class="nav-link">Blog Grid View right</a></li>

											<li class="nav-item"><a href="blog-details.html" class="nav-link">Blog Details</a></li>
										</ul>
									</li>


									<li class="nav-item"><a href="contact_us.html" class="nav-link">Contact</a></li>
								</ul>

								<div class="others-option align-items-center">
									<div class="option-item">
										<div class="cart-btn">
											<a href="cart.html"><i class="fa fa-shopping-cart"></i><span>1</span></a>
										</div>
									</div>

									<div class="option-item">
										<div class="search-btn-box">
											<a href="#search"><i class="search-btn fa fa-search"></i></a>
										</div>
									</div>

									<!--<div class="option-item">
										<a href="contact_us.html" class="btn"> Appointment</a>
									</div>-->
								</div>
							</div>
						</nav>
						<div class="clear"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Navbar Area --> 
<div id="search" class="input-group header">
	<span class="close">x</span>
		<form>
			<input value="" name="search" type="search" placeholder="Search">
			 <span class="input-group-btn">
				<button type="button" class="btn"><i class="fa fa-search"></i></button>
			</span>
			<div class="clear"></div>
		</form>
</div>	
</header>
<!-- Header End -->
<!-- breadcrumb -->
<section class="main_breadcrumb">
	<div class="container-fluid">
		<div class="row">
			<div class="breadcrumb-content">
				<h2>login</h2>
				<ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="login.php">login</a></li>
				</ul>
			</div>
		</div>
	</div>
</section>
<div id="content" class="cart_page checkout_page register_page login_page">
<!-- cart -->
	<div id="register" class="cart_section checkout_section register_section">
		<div class="container-fluid" id="checkout">
				
			<div class="row billing_and_payment_option wow fadeInDown   animated">
				<div class="heading_wrapper wow fadeInDown animated">
					<h2 class="wow fadeInDown animated">Login your Account</h2>
					<p class="wow fadeInDown animated">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text </p>
				</div>
				<!-- Billing Address -->
				<div class="login_box">
					<h3>Login to Your Account</h3>
						<form id='submit-form' method="post" action="javascript:void(0);" novalidate="novalidate">
							<div class="form-group">
							    <label for="email">Email:</label>
								<input class="form-input form-control" type="email" name="email" placeholder="E-Mail">
							</div>
							<div class="form-group">
							    <label for="lozinku">Password:</label>
								<input class="form-input form-control" type="password" name="lozinku" placeholder="Password:">
							</div>

							<div class="text-danger">
							</div>

							<button type="submit" name="submit" class="btn btn-primary">Submit</button>
							
							<p class="signInclass"> Dont Have an Account?  &nbsp;<a href="login.php">Sign In</a> </p>
						
					    </form>
					<div class="clear"></div>
				</div>
				<!-- Delivery Address  -->
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
								<li><i class="fa fa-map-marker"></i> No.1023 Pellentesque nec erat.</li>
								<li><i class="fa fa-map-marker"></i> Neque non north India.</li>
								<li><i class="fa fa-phone"></i> Phone. (123) 456-7890</li>
								<li><i class="fa fa-fax"></i> Fax. (123) 456-7890</li>
								<li><i class="fa fa-envelope"></i> Email: company@Example.com</li>
								
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
			<p class="wow fadeInDown animated">© Copyright 2020 by Furniture Store. All right Reserved - Design By <a href="https://www.templatebazaar.in/" target="_blank">Template bazaar</a></p>
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
	<script src="assets/js/login.js"></script>
<!-- script files -->
</body>
</html>
