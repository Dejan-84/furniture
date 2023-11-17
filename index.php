<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting();

session_start();

//create a key for hash_hmac function
if (empty($_SESSION['key'])) {

    $_SESSION['key'] = bin2hex(random_bytes(32));
}
    
//create CSRF token
$csrf = hash_hmac('sha256', 'this is some string: index.php', $_SESSION['key']);


require_once 'includes/baza.php'; 
require_once 'config/db_config.php'; 

//$conn = database_connection('localhost', 'root', '', 'furniture');

$conn = database_connection(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);

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


    <?php
	   require 'includes/navbar.php';
	?>

	

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
				<p class="wow fadeInDown animated">Create inspiring, beautifully appointed rooms. Review our wide selection of stylish furniture for bedroom, dining and living — and get enlightened about modern design.</p>
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
								<a href="single-products.php"><img class="wow fadeInDown animated" src="<?php echo $picture_path;?>" alt="Chairs" title="Chairs" width="100%"></a>
								
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
									<h4 class="wow fadeInDown animated"><a href="single-products.php"><?php echo $name;?></a></h4>
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
				
				


			</div>
			</div>
		</div>
	</div>
</div>
<!-- Products End-->


<!-- testimonial -->
	<div id="testimonials" class="testimonial_section">
		<div class="container-fluid">
			<div class="heading_wrapper wow fadeInDown animated">
				<h2 class="wow fadeInDown animated">What My Client Says</h2>
				<p class="wow fadeInDown animated">See the results of our latest Customer Satisfaction and key customer testimonials on how we build strong working relationships with an understanding of individual need and market knowledge.</p>
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
				<p class="wow fadeInDown animated">Raw materials, weaves and curvaceous design is set to take center stage this season...</p>
			</div>
				<div class="row">
					<div id="blog" class="owl-carousel owl-theme">
					
						<div class="item">
							<div class="col-sm-12">
								<div class="blog_inner_matter">
									<div class="image">
										<a href=""><img src="assets/image/blog/1.jpg" class="wow fadeInDown animated"></a>
										<div class="blog_date  wow fadeInDown animated">
											<span>01-04-2022<span>
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
											<span>01-04-2022<span>
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
											<span>01-04-2022<span>
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
											<span>01-04-2022<span>
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
