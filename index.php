<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

$root_folder =  $_SERVER['DOCUMENT_ROOT'];
$listing = scandir($root_folder);

echo $root_folder  .'<br>';

var_dump($listing);


//print_r($_SESSION);

//create a key for hash_hmac function
if (empty($_SESSION['key'])) {

    $_SESSION['key'] = bin2hex(random_bytes(32));
}
    
//create CSRF token
$csrf = hash_hmac('sha256', 'this is some string: index.php', $_SESSION['key']);




require_once 'includes/baza.php'; 

$conn = database_connection('localhost', 'root', '', 'furniture');

//QUERY FOR GETTING ALL PRODUCTS
$products_query = "SELECT * FROM products";

$result = mysqli_query($conn,$products_query);

if (!$result) {
	die ('Greska u upitu.');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Furniture Store | Home</title>
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
	<!----slider use---->
	<script type="text/javascript" src="assets\vendor\slider-js\slideShow.js"></script>
	<script type="text/javascript" src="assets\vendor\slider-js\slideWiz.js"></script>
	<link rel="stylesheet" type="text/css" href="assets\vendor\slider-js\slideWiz.css">
	
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
				
				<div class="col-md-4 col-md-12">
					<ul class="top-header-social header_account">
						<?php

							//IF USER IS LOGGED IN,HIDE LOGIN AND REGISTER LINK
							if(!isset($_SESSION['logged_in'])) {

								echo '<li class="nav-item active">
										<a class="nav-link" href="login.php"><i class="fa fa-sign-in"></i>Login <span>/</span></a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="register.php"><i class="fa fa-pencil-square-o"></i>Register</a>
									</li>';

							}
                            //IF USER IS LOGGED IN ,SHOW WELCOME MEASSAGE AND LOGOUT LINK
							if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
				
						
								echo '<span style="color:white;">Welcome ' .$_SESSION['ime'].' ' .$_SESSION['prezime'] ;
							
							    echo '&nbsp; <a  style="color:white;" href="logout.php?csrf=' .$csrf. '"><i class="fa fa-sign-out"></i>Logout</a></span>';
							}
						?>	
					
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

									<li class="nav-item"><a href="products.php" class="nav-link">Products</a></li>

									
									
									<!-- <li class="nav-item"><a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="Megamenu">Shop<i class="fa fa-angle-down"></i></a>
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
                                            </div><!-- end col-3 
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
                                            </div><!-- end col-3 
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
                                            </div><!-- end col-3 
                                        </div><!-- end row 
                                    </li></li>

										</ul>-->
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
<!-- silder -->

<section>
	<div id="slideWiz" class="slideWiz" style="width: 100%; height: 500px;"></div>
</section>
<!-- silder End -->
<!-- about Us -->
	<div id="about_us" class="about_section">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-6">
					<div class="about_text wow slideInLeft">
						<img src="assets/image/two-img/banner-1.jpg">
						</div>
				</div>
				<div class="col-sm-6">
					<div class="about_images wow slideInRight">
						<img src="assets/image/two-img/banner-2.jpg">
					</div>
				</div>
			</div>
		</div>
	</div>

<!-- Our products  -->
	<div id="products" class="products_section">
		<div class="container-fluid">
			<div class="heading_wrapper wow fadeInDown animated">
				<h2 class="wow fadeInDown animated">Our Products</h2>
				<p class="wow fadeInDown animated">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text </p>
			</div>
			<div class="row">
				<div id="product" class="owl-carousel owl-theme">
			<!--1 -->

			<?php
			
			if(mysqli_num_rows($result) > 0) {

				while($rows = mysqli_fetch_assoc($result)) {

					$id = $rows['product_id'];
					$name = $rows['name'];
					$old_price = $rows['old_price'];
					$new_price = $rows['new_price'];
					$picture_path = $rows['picture_path'];
			?>

				<div class="item">
					<div class="col-sm-12">
						<div class="product-thumb">
							<div class="image wow fadeInDown animated">
								<a href="single-products.html"><img class="wow fadeInDown animated" src="<?php echo $picture_path;?>" alt="Chairs" title="Chairs" width="100%"></a>
								
								<div class="sale"><span class="">Sale</span></div>
								<div class="button-group">
									<div class="inner">
										<button type="button" title="Quick View" class="button-quickview" data-id="<?php echo $id; ?>" onclick="window.location.href='product_detail.php?id=<?php echo $id;?>'"><span>Quick View</span></button>
										<button type="button" title="Add to Wish List" class="button-wishlist"><span>Add to Wish List</span></button>
										<button type="button" title="Compare this Product" class="button-compare"><span>Compare this Product</span></button>
									</div>
								</div>
							</div>
							<div class="caption">
								
								<div class="rate-and-title">
									<h4 class="wow fadeInDown animated"><a href="single-products.html"><?php echo $name;?></a></h4>
									<div class="rating wow fadeInDown animated">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star-o"></i>
										<i class="fa fa-star-o"></i>
										<i class="fa fa-star-o"></i>
										<div class="clear"></div>
									</div>
									<p class="price wow fadeInDown animated">
										<span class="price-old">$<?php echo $old_price;?></span> <span class="price-new">$<?php echo $new_price;?></span>  
									</p>
									<button type="button" class="btn wow fadeInDown animated" onclick="" title="Add to Cart"><span><i class="fa fa-shopping-cart"></i> Add to Cart</span></button>
								</div>
							</div>
						</div>
					</div>				
				</div>	
				<?php

					}
				}

				?>
				
				
<!-- Products End-->

<!-- Our Astrologers Work for You 
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
<!-- Our products  
	<div id="products" class="products_section">
		<div class="container-fluid">
			<div class="heading_wrapper wow fadeInDown animated">
				<h2 class="wow fadeInDown animated">New Category</h2>
				<p class="wow fadeInDown animated">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text </p>
			</div>
			<div class="row">
				<div id="new_category" class="owl-carousel owl-theme">
			<!--1 
				<div class="item">
					<div class="col-sm-12">
						<div class="product-thumb">
							<div class="image wow fadeInDown animated">
								<a href="single-products.html"><img class="wow fadeInDown animated" src="assets/image/category/product-5.jpg" alt="Chairs" title="Chairs" width="100%"></a>
								
								<div class="sale"><span class="">Sale</span></div>
								<div class="button-group">
									<div class="inner">
										<button type="button" title="Quick View" class="button-quickview"><span>Quick View</span></button>
										<button type="button" title="Add to Wish List" class="button-wishlist"><span>Add to Wish List</span></button>
										<button type="button" title="Compare this Product" class="button-compare"><span>Compare this Product</span></button>
									</div>
								</div>
							</div>
							<div class="caption">
								
								<div class="rate-and-title">
									<h4 class="wow fadeInDown animated"><a href="single-products.html">Ladder Roswell Wood  Table</a></h4>
									<div class="rating wow fadeInDown animated">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star-o"></i>
										<i class="fa fa-star-o"></i>
										<i class="fa fa-star-o"></i>
										<div class="clear"></div>
									</div>
									<p class="price wow fadeInDown animated">
										<span class="price-old">$123.20</span> <span class="price-new">$110.00</span>  
									</p>
									<button type="button" class="btn wow fadeInDown animated" onclick="" title="Add to Cart"><span><i class="fa fa-shopping-cart"></i> Add to Cart</span></button>
								</div>
							</div>
						</div>
					</div>				
				</div>				
				<!-- 2-
				<div class="item">
					<div class="col-sm-12">
						<div class="product-thumb">
							<div class="image wow fadeInDown animated">
								<a href="single-products.html"><img class="wow fadeInDown animated" src="assets/image/category/product-6.jpg" alt="Chairs" title="Chairs" width="100%"></a>
								
								<div class="sale"><span class="">Sale</span></div>
								<div class="button-group">
									<div class="inner">
										<button type="button" title="Quick View" class="button-quickview"><span>Quick View</span></button>
										<button type="button" title="Add to Wish List" class="button-wishlist"><span>Add to Wish List</span></button>
										<button type="button" title="Compare this Product" class="button-compare"><span>Compare this Product</span></button>
									</div>
								</div>
							</div>
							<div class="caption">
								
								<div class="rate-and-title">
									<h4 class="wow fadeInDown animated"><a href="single-products.html">Wood solid Bed</a></h4>
									<div class="rating wow fadeInDown animated">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star-o"></i>
										<i class="fa fa-star-o"></i>
										<i class="fa fa-star-o"></i>
										<div class="clear"></div>
									</div>
									<p class="price wow fadeInDown animated">
										<span class="price-old">$123.20</span> <span class="price-new">$110.00</span>  
									</p>
									<button type="button" class="btn wow fadeInDown animated" onclick="" title="Add to Cart"><span><i class="fa fa-shopping-cart"></i> Add to Cart</span></button>
								</div>
							</div>
						</div>
					</div>				
				</div>				
				<!-- 3
				<div class="item">
					<div class="col-sm-12">
						<div class="product-thumb">
							<div class="image wow fadeInDown animated">
								<a href="single-products.html"><img class="wow fadeInDown animated" src="assets/image/category/product-8.jpg" alt="Chairs" title="Chairs" width="100%"></a>
								<div class="button-group">
									<div class="inner">
										<button type="button" title="Quick View" class="button-quickview"><span>Quick View</span></button>
										<button type="button" title="Add to Wish List" class="button-wishlist"><span>Add to Wish List</span></button>
										<button type="button" title="Compare this Product" class="button-compare"><span>Compare this Product</span></button>
									</div>
								</div>
							</div>
							<div class="caption">
								
								<div class="rate-and-title">
									<h4 class="wow fadeInDown animated"><a href="single-products.html">Hetal Enterprises Chair</a></h4>
									<div class="rating wow fadeInDown animated">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star-o"></i>
										<i class="fa fa-star-o"></i>
										<i class="fa fa-star-o"></i>
										<div class="clear"></div>
									</div>
									<p class="price wow fadeInDown animated">
										<span class="price-new">$50.00</span>  
									</p>
									<button type="button" class="btn wow fadeInDown animated" onclick="" title="Add to Cart"><span><i class="fa fa-shopping-cart"></i> Add to Cart</span></button>
								</div>
							</div>
						</div>
					</div>				
				</div>				
				<!--4 
				<div class="item">
					<div class="col-sm-12">
						<div class="product-thumb">
							<div class="image wow fadeInDown animated">
								<a href="single-products.html"><img class="wow fadeInDown animated" src="assets/image/category/product-11.jpg" alt="Chairs" title="Chairs" width="100%"></a>
								<div class="button-group">
									<div class="inner">
										<button type="button" title="Quick View" class="button-quickview"><span>Quick View</span></button>
										<button type="button" title="Add to Wish List" class="button-wishlist"><span>Add to Wish List</span></button>
										<button type="button" title="Compare this Product" class="button-compare"><span>Compare this Product</span></button>
									</div>
								</div>
							</div>
							<div class="caption">
								
								<div class="rate-and-title">
									<h4 class="wow fadeInDown animated"><a href="single-products.html">Enterprises Chair</a></h4>
									<div class="rating wow fadeInDown animated">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star-o"></i>
										<i class="fa fa-star-o"></i>
										<i class="fa fa-star-o"></i>
										<div class="clear"></div>
									</div>
									<p class="price wow fadeInDown animated">
										<span class="price-old">$123.20</span> <span class="price-new">$110.00</span>  
									</p>
									<button type="button" class="btn wow fadeInDown animated" onclick="" title="Add to Cart"><span><i class="fa fa-shopping-cart"></i> Add to Cart</span></button>
								</div>
							</div>
						</div>
					</div>	
				</div>	
				<!--5 
					<div class="item">
						<div class="col-sm-12">
							<div class="product-thumb">
								<div class="image wow fadeInDown animated">
									<a href="single-products.html"><img class="wow fadeInDown animated" src="assets/image/category/product-10.jpg" alt="Chairs" title="Chairs" width="100%"></a>
									
									<div class="sale"><span class="">Sale</span></div>
									<div class="button-group">
										<div class="inner">
											<button type="button" title="Quick View" class="button-quickview"><span>Quick View</span></button>
											<button type="button" title="Add to Wish List" class="button-wishlist"><span>Add to Wish List</span></button>
											<button type="button" title="Compare this Product" class="button-compare"><span>Compare this Product</span></button>
										</div>
									</div>
								</div>
								<div class="caption">
									
									<div class="rate-and-title">
										<h4 class="wow fadeInDown animated"><a href="single-products.html">Enterprises Wood Chair</a></h4>
										<div class="rating wow fadeInDown animated">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star-o"></i>
											<i class="fa fa-star-o"></i>
											<i class="fa fa-star-o"></i>
											<div class="clear"></div>
										</div>
										<p class="price wow fadeInDown animated">
											<span class="price-old">$123.20</span> <span class="price-new">$110.00</span>  
										</p>
										<button type="button" class="btn wow fadeInDown animated" onclick="" title="Add to Cart"><span><i class="fa fa-shopping-cart"></i> Add to Cart</span></button>
									</div>
								</div>
							</div>
						</div>				
					</div>
			     	-->			
				<!-- products end -->
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Products End-->
<!-- Our Services -
	<div id="services" class="services_section">
		<div class="container-fluid">
			<div class="heading_wrapper wow fadeInDown animated">
				<h2 class="wow fadeInDown animated">Our Services</h2>
				<p class="wow fadeInDown animated">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text </p>
			</div>
			<div class="row">
				<div class="col-sm-4">
					<div class="services_matter">
						<img class="wow fadeInDown animated" src="assets/image/services/services3.jpg" alt="Chairs" title="Chairs" width="100%">
						<h4 class="wow fadeInDown animated"><a href="full_services_page.html">Chairs</a></h4>
						<p class="wow fadeInDown animated">Contrary to popular belief, Lorem Ipsum is not simply random text</p>
						<a href="full_services_page.html" class="btn wow fadeInDown animated">Read More</a>
					</div>
				</div>
				
				<div class="col-sm-4">
					<div class="services_matter">
						<img class="wow fadeInDown animated" src="assets/image/services/services2.jpg" alt="Chairs" title="Chairs" width="100%">
						<h4 class="wow fadeInDown animated" ><a href="full_services_page.html">Personal Consultation</a></h4>
						<p class="wow fadeInDown animated" >Contrary to popular belief, Lorem Ipsum is not simply random text</p>
						<a href="full_services_page.html" class="btn wow fadeInDown animated">Read More</a>
					</div>
				</div>
				
				<div class="col-sm-4">
					<div class="services_matter">
						<img class="wow fadeInDown animated" src="assets/image/services/services1.jpg" alt="Chairs" title="Chairs" width="100%">
						<h4 class="wow fadeInDown animated"><a href="full_services_page.html">Face Reading</a></h4>
						<p class="wow fadeInDown animated">Contrary to popular belief, Lorem Ipsum is not simply random text</p>
						<a href="full_services_page.html" class="btn wow fadeInDown animated">Read More</a>
					</div>
				</div>
				
				<div class="col-sm-4">
					<div class="services_matter">
						<img class="wow fadeInDown animated" src="assets/image/services/services1.jpg" alt="Chairs" title="Chairs" width="100%">
						<h4 class="wow fadeInDown animated"><a href="full_services_page.html">Face Reading</a></h4>
						<p class="wow fadeInDown animated" >Contrary to popular belief, Lorem Ipsum is not simply random text</p>
						<a href="full_services_page.html" class="btn wow fadeInDown animated">Read More</a>
					</div>
				</div>
				
				<div class="col-sm-4">
					<div class="services_matter">
						<img class="wow fadeInDown animated" src="assets/image/services/services3.jpg" alt="Chairs" title="Chairs" width="100%">
						<h4 class="wow fadeInDown animated"><a href="full_services_page.html">Chairs</a></h4>
						<p class="wow fadeInDown animated">Contrary to popular belief, Lorem Ipsum is not simply random text</p>
						<a href="full_services_page.html" class="btn wow fadeInDown animated">Read More</a>
					</div>
				</div>
				
				<div class="col-sm-4">
					<div class="services_matter">
						<img class="wow fadeInDown animated" src="assets/image/services/services2.jpg" alt="Chairs" title="Chairs" width="100%">
						<h4 class="wow fadeInDown animated" ><a href="full_services_page.html">Personal Consultation</a></h4>
						<p class="wow fadeInDown animated">Contrary to popular belief, Lorem Ipsum is not simply random text</p>
						<a href="full_services_page.html" class="btn wow fadeInDown animated">Read More</a>
					</div>
				</div>
				
			</div>
		</div>
	</div>
- Our Services End-->

<!-- testimonial -->
	<div id="testimonials" class="testimonial_section">
		<div class="container-fluid">
			<div class="heading_wrapper wow fadeInDown animated">
				<h2 class="wow fadeInDown animated">What My Client Says</h2>
				<p class="wow fadeInDown animated">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text </p>
			</div>
				<div class="row">
					<div id="testimonial" class="owl-carousel owl-theme">
						<div class="item">
							<div class="col-sm-12">
								<div class="testimonial_inner_matter">
									<img src="assets/image/testimonial/1.jpg" class="wow fadeInDown animated">
									<p class="wow fadeInDown animated">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
									<h5 class="wow fadeInDown animated">Shoko Mugikura</h5>
									<h6 class="wow fadeInDown animated">Design Manager</h6>
								</div>
							</div>
						</div>
						
						<div class="item">
							<div class="col-sm-12">
								<div class="testimonial_inner_matter">
									<img src="assets/image/testimonial/2.jpg" class="wow fadeInDown animated">
									<p class="wow fadeInDown animated">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
									<h5 class="wow fadeInDown animated">Shoko Mugikura</h5>
									<h6 class="wow fadeInDown animated">Design Manager</h6>
								</div>
							</div>
						</div>
						
						<div class="item">
							<div class="col-sm-12">
								<div class="testimonial_inner_matter">
									<img src="assets/image/testimonial/3.jpg" class="wow fadeInDown animated">
									<p class="wow fadeInDown animated">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
									<h5 class="wow fadeInDown animated">Shoko Mugikura</h5>
									<h6 class="wow fadeInDown animated">Design Manager</h6>
								</div>
							</div>
						</div>
						
						<div class="item">
							<div class="col-sm-12">
								<div class="testimonial_inner_matter">
									<img src="assets/image/testimonial/4.jpg" class="wow fadeInDown animated">
									<p class="wow fadeInDown animated">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
									<h5 class="wow fadeInDown animated">Shoko Mugikura</h5>
									<h6 class="wow fadeInDown animated">Design Manager</h6>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
	</div>
<!-- testimonial end -->

<!-- Blog -->
	<div id="blogs" class="blog_section">
		<div class="container-fluid">
			<div class="heading_wrapper wow fadeInDown animated">
				<h2 class="wow fadeInDown animated">latest furniture</h2>
				<p class="wow fadeInDown animated">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text </p>
			</div>
				<div class="row">
					<div id="blog" class="owl-carousel owl-theme">
					
						<div class="item">
							<div class="col-sm-12">
								<div class="blog_inner_matter">
									<div class="image">
										<a href=""><img src="assets/image/blog/1.jpg" class="wow fadeInDown animated"></a>
										<div class="blog_date  wow fadeInDown animated">
											<span>01-04-2020<span>
										</div>
									</div>
									<div class="admin_and_comments wow fadeInDown animated">
										<span class="blog_admin"><span><i class="fa fa-user-o"></i> Post By</span> <span><a href="">Admin</a></span></span>
										<span class="comments_date"><span><i class="fa fa-comments-o"></i> 10 comments</span></span>
									</div>
									<h3 class="wow fadeInDown animated"><a href="">Make a Cozy and Romatic Space</a></h3>
									<p class="wow fadeInDown animated">There are many variations of passages of Lorem Ipsum , but the majority have suffered alteration.</p>
									<a href="" class="btn wow fadeInDown animated" >Read More</a>
								</div>
							</div>
						</div>
						
						<div class="item">
							<div class="col-sm-12">
								<div class="blog_inner_matter">
									<div class="image">
										<a href=""><img src="assets/image/blog/3.jpg" class="wow fadeInDown animated"></a>
										<div class="blog_date  wow fadeInDown animated">
											<span>01-04-2020<span>
										</div>
									</div>
									<div class="admin_and_comments wow fadeInDown animated">
										<span class="blog_admin"><span><i class="fa fa-user-o"></i> Post By</span> <span><a href="">Admin</a></span></span>
										<span class="comments_date"><span><i class="fa fa-comments-o"></i> 10 comments</span></span>
									</div>
									<h3 class="wow fadeInDown animated"><a href="">1000+ ideas about Vintage Cafe</a></h3>
									<p class="wow fadeInDown animated">There are many variations of passages of Lorem Ipsum , but the majority have suffered alteration.</p>
									<a href="" class="btn wow fadeInDown animated" >Read More</a>
								</div>
							</div>
						</div>
						
						<div class="item">
							<div class="col-sm-12">
								<div class="blog_inner_matter">
									<div class="image">
										<a href=""><img src="assets/image/blog/2.jpg" class="wow fadeInDown animated"></a>
										<div class="blog_date  wow fadeInDown animated">
											<span>01-04-2020<span>
										</div>
									</div>
									<div class="admin_and_comments wow fadeInDown animated">
										<span class="blog_admin"><span><i class="fa fa-user-o"></i> Post By</span> <span><a href="">Admin</a></span></span>
										<span class="comments_date"><span><i class="fa fa-comments-o"></i> 10 comments</span></span>
									</div>
									<h3 class="wow fadeInDown animated"><a href="">Want to cozy up your home for fall?</a></h3>
									<p class="wow fadeInDown animated">There are many variations of passages of Lorem Ipsum , but the majority have suffered alteration.</p>
									<a href="" class="btn wow fadeInDown animated" >Read More</a>
								</div>
							</div>
						</div>
						
						<div class="item">
							<div class="col-sm-12">
								<div class="blog_inner_matter">
									<div class="image">
										<a href=""><img src="assets/image/blog/1.jpg" class="wow fadeInDown animated"></a>
										<div class="blog_date  wow fadeInDown animated">
											<span>01-04-2020<span>
										</div>
									</div>
									<div class="admin_and_comments wow fadeInDown animated">
										<span class="blog_admin"><span><i class="fa fa-user-o"></i> Post By</span> <span><a href="">Admin</a></span></span>
										<span class="comments_date"><span><i class="fa fa-comments-o"></i> 10 comments</span></span>
									</div>
									<h3 class="wow fadeInDown animated"><a href="">Proin gravida nibh vel velit .</a></h3>
									<p class="wow fadeInDown animated">There are many variations of passages of Lorem Ipsum , but the majority have suffered alteration.</p>
									<a href="" class="btn wow fadeInDown animated" >Read More</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
	</div>

<!-- Blog End -->

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
<!-- home silder -->
<script>
$(document).ready(function(){
	$('#home-silder').owlCarousel({	
		items: 1,
		itemsDesktop:[1199,1],
		itemsDesktopSmall:[992,1],
		itemsTablet:[768,1],
		itemsMobile:[450,1],
		autoPlay: 10000,
		pagination: true,
		navigation: true,
		navigationText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>']
	});
});

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

$(document).ready(function(){
	$('#blog').owlCarousel({	
		items: 3,
		itemsDesktop:[1199,3],
		itemsDesktopSmall:[992,3],
		itemsTablet:[768,2],
		itemsMobile:[450,1],
		autoPlay: 10000,
		pagination: false,
		navigation: true,
		navigationText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>']
	});
});

$(document).ready(function(){
	$('#product').owlCarousel({	
		items: 4,
		itemsDesktop:[1199,3],
		itemsDesktopSmall:[992,3],
		itemsTablet:[768,2],
		itemsMobile:[450,1],
		autoPlay: 10000,
		pagination: false,
		navigation: true,
		navigationText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>']
	});
});

$(document).ready(function(){
	$('#new_category').owlCarousel({	
		items: 4,
		itemsDesktop:[1199,3],
		itemsDesktopSmall:[992,3],
		itemsTablet:[768,2],
		itemsMobile:[450,1],
		autoPlay: 10000,
		pagination: false,
		navigation: true,
		navigationText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>']
	});
});
</script>

	
	<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/js/custom.js"></script>
	<script src="assets/js/products.js"></script>
	
<!-- script files -->
</body>
</html>
