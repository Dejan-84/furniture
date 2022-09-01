<header class="header-area">
	<!-- Top Header -->
	<div class="top-header">
		<div class="container-fluid">
			<div class="row align-items-center">
				<div class="col-md-4 col-lg-4 col-md-12"></div>
		
				<div class="col-md-4 col-lg-4 col-md-12">
					<ul class="top-offer-content">
						<li>Get Upto 50% Discount Everyday</li>
					</ul>
				</div>
				
				<div class="col-md-4 col-lg-4 col-md-12">
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

										<li class="panel mobile_menu_li">
											<a href="products.php" class="mar-mobile"></i>Products</a>
										</li>
										
										  	 
												
												<div id="category84" class="panel-collapse collapse" style="clear: both; height: 0px;" aria-expanded="false">
										<ul>
									
									
								</div>
								
										
										
										
										
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

									<li class="nav-item"><a href="products.php" class="nav-link">Products</a></li>

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
