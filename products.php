<?php


require_once 'includes/baza.php'; 
require_once 'config/db_config.php';

$conn = database_connection(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);

//$conn = database_connection('localhost', 'root', '', 'furniture');

//QUERY FOR GETTING COLORS

$query1 = "SELECT DISTINCT color FROM products";

$result1 = mysqli_query($conn, $query1);

if (!$result1) {
	echo 'Greska u upitu.';
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Furniture Store | product</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/responsive.css">
	<link rel="stylesheet" href="assets/vendor/owl.carousel/assets/owl.carousel.css"> 
	<link rel="stylesheet" href="assets/vendor/wow/animate.css">
	<link rel="stylesheet" href="assets/js/products.js">
	<link rel="stylesheet" href="assets/vendor/jquery/jquery-ui.css">
	

	<link href="https://fonts.googleapis.com/css2?family=Karla:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<script src="assets/vendor/jquery/jquery.min.js"></script>
	<script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
	<script src="assets/vendor/wow/wow.min.js"></script>
	<script src="assets/vendor/jquery/jquery-ui.js"></script>
	
	
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
											<a href="cart.php"><i class="fa fa-shopping-cart"></i><span>1</span></a>
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
											<a href="about_us.php" class="mar-mobile"></i> about us</a>
										</li>
										  <!--	 <li class="nav-item panel mobile_menu_li"><a href="#" class="dropdown-toggle mar-mobile" data-toggle="dropdown" data-hover="Megamenu">Catalog</a><span class="head"><a style="" class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion-category" href="#category84" aria-expanded="false">
												<span class="plus">+</span><span class="minus">-</span></a></span>
												<div id="category84" class="panel-collapse collapse" style="clear: both; height: 0px;" aria-expanded="false">
										<ul >
											<li><div class="row">
                                              <div class="col-menu col-md-3">
                                                <h6 class="title">Tables</h6>
                                                  <div class="content">
                                                    <ul class="menu-col">
                                                        <li><a href="products.php">Side Table</a></li>
                                                        <li><a href="products.php">Dressing Table</a></li>
                                                        <li><a href="products.php">Coffee Table</a></li>
                                                        <li><a href="products.php">Computer Table</a></li>
                                                        <li><a href="products.php">Office Table</a></li>
                                                    </ul>
                                                </div>
                                            </div><!-- end col-3 
                                            <div class="col-menu col-md-3">
                                                <h6 class="title">Chair</h6>
                                                <div class="content">
                                                    <ul class="menu-col">
                                                        <li><a href="products.php">Side Table</a></li>
                                                        <li><a href="products.php">Dressing Table</a></li>
                                                        <li><a href="products.php">Coffee Table</a></li>
                                                        <li><a href="products.php">Computer Table</a></li>
                                                        <li><a href="products.php">Office Table</a></li>
                                                    </ul>
                                                </div>
                                            </div><!-- end col-3 
                                            <div class="col-menu col-md-3">
                                                <h6 class="title">Wardrobe</h6>
                                                <div class="content">
                                                    <ul class="menu-col">
                                                        <li><a href="products.php">Side Table</a></li>
                                                        <li><a href="products.php">Dressing Table</a></li>
                                                        <li><a href="products.php">Coffee Table</a></li>
                                                        <li><a href="products.php">Computer Table</a></li>
                                                        <li><a href="products.php">Office Table</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-menu col-md-3">
                                                <h6 class="title">Best Selling</h6>
                                                <div class="content">
                                                    <ul class="menu-col">
                                                        <li><a href="products.php">Side Table</a></li>
                                                        <li><a href="products.php">Dressing Table</a></li>
                                                        <li><a href="products.phpl">Coffee Table</a></li>
                                                        <li><a href="products.php">Computer Table</a></li>
                                                        <li><a href="products.php">Office Table</a></li>
                                                    </ul>
                                                </div>
                                            </div><!-- end col-3 
                                        </div><!-- end row 
                                    </li>--> 
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
															 <a href="services.php">Products List</a>
														</li>
														<li>
															 <a href="cart.php">Cart</a>
														</li>
														<li>
															 <a href="checkout.php">Checkout</a>
														</li>
														<li>
															 <a href="single-products.php">Products Details</a>
														</li>
														<li>
															 <a href="404.php">404</a>
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
															 <a href="blog.php">Blog Grid</a>
														</li>
														<li>
															 <a href="blog-left.php">Blog Grid View Left</a>
														</li>
														<li>
															 <a href="blog-right.php">Blog Grid View right</a>
														</li>
														<li>
															 <a href="blog-details.php">Blog Details</a>
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
											<a href="contact_us.php" class="mar-mobile"> Contact Us</a>
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
									
									<li class="nav-item"><a href="about_us.php" class="nav-link">About Us</a></li>

									 
									<li class="nav-item"><a href="#" class="nav-link">Pages <i class="fa fa-angle-down"></i></a>
										<ul class="dropdown-menu">

											<li class="nav-item"><a href="#" class="nav-link">Shop <i class="fa fa-angle-right"></i></a>
												<ul class="dropdown-menu">
													<li class="nav-item"><a href="products.php" class="nav-link">Products List</a></li>

													<li class="nav-item"><a href="cart.php" class="nav-link">Cart</a></li>

													<li class="nav-item"><a href="checkout.php" class="nav-link">Checkout</a></li>

													<li class="nav-item"><a href="single-products.php" class="nav-link">Products Details</a></li>
												</ul>
											</li>

											<li class="nav-item"><a href="404.php" class="nav-link">404</a></li>
										</ul>
									</li>

									<li class="nav-item"><a href="#" class="nav-link">Blog <i class="fa fa-angle-down"></i></a>
										<ul class="dropdown-menu">
											<li class="nav-item"><a href="blog.php" class="nav-link">Blog Grid</a></li>
											
											<li class="nav-item"><a href="blog-left.php" class="nav-link">Blog Grid View Left</a></li>
											
											<li class="nav-item"><a href="blog-right.php" class="nav-link">Blog Grid View right</a></li>

											<li class="nav-item"><a href="blog-details.php" class="nav-link">Blog Details</a></li>
										</ul>
									</li>


									<li class="nav-item"><a href="contact_us.php" class="nav-link">Contact</a></li>
								</ul>

								<div class="others-option align-items-center">
									<div class="option-item">
										<div class="cart-btn">
											<a href="cart.php"><i class="fa fa-shopping-cart"></i><span>1</span></a>
										</div>
									</div>

									<div class="option-item">
										<div class="search-btn-box">
											<a href="#search"><i class="search-btn fa fa-search"></i></a>
										</div>
									</div>

									<!--<div class="option-item">
										<a href="contact_us.php" class="btn"> Appointment</a>
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
				<h2>products</h2>
				<ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="">products</a></li>
				</ul>
			</div>
		</div>
	</div>
</section>
<div id="content" class="products_page">
<!-- products -->
	<div id="products" class="products_section">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-3">
					<div>
						<div>
							<h3>Price Range:<h5 id="amount"></h5></h3>
						</div>

						

						<div id="slider-range"></div>

						<div>
							<form method="post" action="">
								<input type="hidden" id="min_price">
								<input type="hidden" id="max_price"></br>
								<!--<input class="btn" type="submit" name="submit_range" value="Submit Price"> -->
							</form>
						</div>
						
						

						

					</div>
					<div class="eb_right">
						<!-- category -->
						<div id="category" class="category">
							<h3 class="wow fadeInDown animated">category</h3>

							<div class="form-check">
								<input class="form-check-input" type="radio" name="category" id="flexRadioDefault4" checked value="all">
								<label class="form-check-label" for="flexRadioDefault4">
									All products
								</label>
							</div>
							 
							<div class="form-check">
								<input class="form-check-input" type="radio" name="category" id="flexRadioDefault1" value="chairs">
								<label class="form-check-label" for="flexRadioDefault1">
									Chairs
								</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="radio" name="category" id="flexRadioDefault2" value="tables">
								<label class="form-check-label" for="flexRadioDefault2">
									Tables
								</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="radio" name="category" id="flexRadioDefault3" value="beds">
								<label class="form-check-label" for="flexRadioDefault3">
									Beds
								</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="radio" name="category" id="flexRadioDefault4" value="sofas">
								<label class="form-check-label" for="flexRadioDefault4">
									Sofas
								</label>
							</div>

						</div>
						<!-- category end-->
						
						<!-- category product -->
						<div id="category_product" class="category_product">
							<h3 class="wow fadeInDown animated">All Color </h3>

							<select id="selectColor" name="selectColor" class="form-select col-sm-12" aria-label="Default select example" onchange="this.value">
								<option value='select' selected>Select color...</option>
								<?php
									if(mysqli_num_rows($result1) > 0) {

										while($rows = mysqli_fetch_assoc($result1)) {
							
											$id = $rows['product_id'];
									
											$color = $rows['color'];

							
											echo '<option value='.$color.'>'.$color.'</option>';
											
										}
									}
										
								?>
							</select>

							
		
						</div>
						<!-- products category end-->
						
					</div>
				</div>
				
				<div class="col-sm-9">
					<div class="eb_left">
					<!-- product-list-top -->
						<div class="product-list-top">
							<div class="sort-by-wrapper">
								  <div class="col-md-6 col-xs-6 sort">
										<div class="form-group input-group input-group-sm wow fadeInDown pull-left">
											<label class="input-group-addon" for="input-sort">Sort By:</label>
											<div class="select-wrapper">
												<select id="input-sort" class="form-control">
													<option value="" selected="selected">Default</option>
													<option value="">Name (A - Z)</option>	
													<option value="">Name (Z - A)</option>
													<option value="">Price (Low &gt; High)</option>
													<option value="">Price (High &gt; Low)</option>
													<option value="">Rating (Highest)</option>
													<option value="">Rating (Lowest)</option>
													<option value="">Model (A - Z)</option>
													<option value="">Model (Z - A)</option>
												</select>
											</div>
										</div>
								  </div>
							</div>

							<div class="show-wrapper">
								<div class="col-md-6 col-xs-6">
									<div class="form-group input-group input-group-sm wow fadeInDown pull-right">
										<label class="input-group-addon" for="input-limit">Show:</label>
										<div class="select-wrapper">
											<select id="input-limit" class="form-control">
												<option value="6" selected="selected">6</option>
												<option value="9">9</option>
												<option value="12">12</option>
												<option value="15">15</option>
												<option value="18">18</option>					  
											</select>
										</div>
									</div>
								</div>
							</div>
							<div class="clear"></div>
						</div>
						<!-- product-list-top -->
				
						<div class="pomocni-div"></div>

						<div class="poruka"></div>

						<div class="pagination"></div>


									
			
		
						<!-- Pagination End-->
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
<!-- script files -->
	<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/js/custom.js"></script>
<!-- script files -->

<script>
	$(document).ready(function() {

		var stranica = 1;
		var broj_proizvoda = 6;
        
        //INICIJALIZOVANJE OBJEKTA SA FILTERIMA
        var objekat_filteri = {};

		function ucitaj_filtrirane_podatke(stranica, broj_proizvoda, filteri)  
        {  

            //SLANJE AJAX POZIVA U FAJL ZA GENERISANJE FILTRIRANIH PODATAKA SA PAGINACIJOM
            $.ajax({  

                url:"ajax/refresh_products.php",  
                method:"POST",
                dataType: 'json',  
                data:{stranica,broj_proizvoda,filteri},  

                success:function(data){  
                    console.log(data);


					//UPIS PODATAKA U GLAVNI DIV STRANICE
					$('.pagination').html(data.html); 


					$('html, body').animate({

						scrollTop: $(".pomocni-div").offset().top
					}, 2000);

					/*
                    //AKO NEMA REZULTATA PRETRAGE,OBAVESTI KORISNIKA I REFRESH-UJ STRANICU
                    if (data.greska) {

                        alert(data.greska);
                        location.reload(); 
                    }
                    //AKO IMA REZULTATA ZA ZADATU PRETRAGU
                    else {

                        //UPIS PODATAKA U GLAVNI DIV STRANICE
                        $('.podaci').html(data.html); 
                    }
					*/
                }  
            });  
        }

		ucitaj_filtrirane_podatke(stranica, broj_proizvoda, objekat_filteri);


		//FUNKCIJA NA KLIK LINKA ZA PAGINACIJU
		$(document).on('click', '.pagination_link',  function(){ 
			
			//UZIMANJE BROJA STRANICE
			stranica = $(this).attr('id'); 
		
			//POZIVANJE FUNKCIJE ZA UCITAVANJE PODATAKA,SETOVANJE STRANICE NA BROJ KLIKNUTOG LINKA I PROSLEDJIVANJE VRSTE I VREDNOSTI FILTERA
			ucitaj_filtrirane_podatke(stranica, broj_proizvoda, objekat_filteri);  
		});

		$('#input-limit').on('change', function() {

			broj_proizvoda = this.value;
			stranica = 1;

			ucitaj_filtrirane_podatke(stranica, broj_proizvoda, objekat_filteri);
		});

		

		$("input[name='category']").change(function() {

			stranica = 1;
			
			var category_filter = $("input[name='category']:checked").val();

			if (category_filter == 'all') {

				delete objekat_filteri['category'];

			}else{

				objekat_filteri['category'] = category_filter;
			}

			console.log(objekat_filteri);

			ucitaj_filtrirane_podatke(stranica, broj_proizvoda, objekat_filteri);
		})

		$("#selectColor").on('change', function(){

			stranica = 1;

			var color_filter = $(this).children("option:selected").val();

			if(color_filter == 'select') {

				delete objekat_filteri['color'];

			}else {

			    objekat_filteri['color'] = color_filter;
			}

			console.log(objekat_filteri);

			ucitaj_filtrirane_podatke(stranica, broj_proizvoda, objekat_filteri);
		});

		
  
		$(function() {

			$( "#slider-range" ).slider({
			range: true,
			min: 0,
			max: 1000,
			values: [ 0, 1000 ],

			slide: function( event, ui ) {
				$( "#amount" ).html( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
				$( "#min_price" ).val(ui.values[ 0 ]);
				$( "#max_price" ).val(ui.values[ 1 ]);
				
			}
			});
			$( "#amount" ).html( "$" + $( "#slider-range" ).slider( "values", 0 ) +
			" - $" + $( "#slider-range" ).slider( "values", 1 ) );

			console.log(objekat_filteri);
			
		});

		$("#slider-range").on("slidestop", function(){

			stranica = 1;

			var min_price = $( "#min_price" ).val();
			var max_price = $( "#max_price" ).val();

			objekat_filteri['new_price'] = {};

			objekat_filteri['new_price']['min_price'] = min_price;
			objekat_filteri['new_price']['max_price'] = max_price;

			//objekat_filteri['new_price'] = min_price+" "+max_price;
			//objekat_filteri['new_price'] = max_price;

			console.log(objekat_filteri);

			ucitaj_filtrirane_podatke(stranica, broj_proizvoda, objekat_filteri);

		});
  

		


	})
</script>
</body>
</html>
