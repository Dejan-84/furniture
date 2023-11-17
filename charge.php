<?php
error_reporting(0);
session_start();
//session_destroy();

if (isset($_SESSION["shopping_cart"])) {

	$num_of_items = count($_SESSION["shopping_cart"]);
}

if(!empty($_SESSION["shopping_cart"])){

	$zbir = 0;
	foreach($_SESSION["shopping_cart"] as $keys => $values)
	{
		$zbir += $values['item_quantity'] * $values['item_price'];
	}	

}	

if (isset($_POST['total'])) {
	$total_price = $_POST['total'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Furniture Store | Payment details</title>
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


<!-- breadcrumb -->
<section class="main_breadcrumb" style="height:15px;padding-top:15px;">
	<div class="container-fluid" >
		<div class="row" >
			<div class="breadcrumb-content" style="height:10px;">
				<h3 style="color:white;">Payment details</h3>
				<ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="shoping_cart.php">Shoping cart</a></li>
				</ul>
			</div>
		</div>
	</div>
</section>
<div id="content" class="cart_page checkout_page register_page login_page">
 <!-- cart -->
	
	<div class="row">
			

		<!-- Billing Address -->
		<div class="col-sm-6">
			<h3>Payment details:</h3>
			<form id='submit-form' method="post" action="checkout-charge.php">

				<div class="form-group">
					<label for="customer name">Customer Name:</label>
					<input class="form-input form-control" type="text" name="c_name" placeholder="Customer Name" required>
				</div>
				<div class="form-group">
					<label for="address">Address:</label>
					<input class="form-input form-control" type="text" name="address" placeholder="Address" required>
				</div>

				<div class="form-group">
					<label for="phone number">Phone number:</label>
					<input class="form-input form-control" id="ph" type="phone" pattern="\d{10}" name="phone number" placeholder="Phone number:" requaired>
				</div>

				<div class="form-group">
					<label for="number of products">Number of products:</label>
					<input class="form-input form-control" name="number_of_products" placeholder="Number of products:" value="<?php echo $num_of_items; ?>" disabled>
				</div>

				<div class="form-group">
					<label for="total for payment">Total for payment:</label>
					<div>
					<span style="position: absolute; margin-left: 3px; margin-top: 5px;">$</span>
					<input class="form-input form-control" type="number" name="amount2" placeholder="Total for payment:" value="<?php echo number_format($zbir, 2,".","");?>" disabled>
					</div>
				</div>

				<input type="hidden" name="amount" placeholder="Total for payment:" value="<?php echo number_format($zbir, 2,".","");?>">
				<input type="hidden" name="product_name" value="Furniture" />

				<script
					src="https://checkout.stripe.com/checkout.js" class="stripe-button"
					data-key="pk_test_51LpxZjH1C3rB0kaalIaiY5vhlQwp2jlE8d3FZd6AqS6EVwNe6TsHTHNpz5DzBPuYhZQ9XG9NXViLn7IE9grmQXgS00nyDMKBf0"
					data-amount=<?php echo str_replace(",","",$zbir) * 100?>
					data-currency="usd"
					data-locale="auto">
                </script>
				
						
			</form>
	    </div>

		<div class="col-sm-6" >
			<h3>Order details:</h3>
			

			<?php
			if(!empty($_SESSION["shopping_cart"])){
				?>
				<div class="table-responsive" style="overflow-y: scroll; height:auto;">
					<table class="table-bordered"  >
						<tr>
							<th style="width:30%; text-align:center;">Item Name</th>
							<th style="width:20%; text-align:center;">Item Picture</th>
							<th style="width:15%; text-align:center;">Item Price</th>
							<th style="width:10%; text-align:center;">Item Quantity</th>
							<th style="width:20%; text-align:center;">Total</th>
							
						</tr>

						<?php
							$total = 0;
							foreach($_SESSION["shopping_cart"] as $keys => $values)
							{
								$total += $values['item_quantity'] * $values['item_price'];
								?>
								<tr>
									<td style="text-align:center;"><?php echo $values['item_name'];?></td>
									<td><img style="width:60px; height:auto; display:block; margin-left:auto; margin-right:auto;" src="<?php echo $values['item_picture'];?>"></td>
									<td style="text-align:center;" id="item-price-<?php echo $values['item_id'] ;?>">$<?php echo $values['item_price'];?></td>
									<td style="text-align:center;"><?php echo $values['item_quantity'];?></td>
									<td style="text-align:center;" class="item-total" id="item-total-<?php echo $values['item_id'] ;?>">$<?php echo number_format($values['item_quantity'] * $values['item_price'],2,".","")?></td>
									
								</tr>
								<?php
							}
						?>
							<tr>
								<td style="text-align:right; padding:10px; background-color:#e6e6e6; font-weight: bold;" colspan="4">total:</td>
								<td style="text-align:center; padding:5px; font-weight: bold;" id="total-sum">$<?php echo number_format($total, 2,".",""); ?></td>
								
							</tr>
				
					</table>

				</div>
				<?php

				}

				?>

				
				
				
						
		
	    </div>
			
		
	</div>	
	
 <!-- cart end-->	
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
	<script src="assets/js/add-to-cart.js"></script>
	<script src="assets/js/quantity-change.js"></script>
<!-- script files -->
<script>
   

    $('#ph').on('keypress',function(){
         var text = $(this).val().length;
         if(text > 9){
              return false;
         }else{
            $('#ph').text($(this).val());
         }
         
    });
</script>
</body>
</html>
