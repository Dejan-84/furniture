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
	<div class="verification">
 
		<!-- breadcrumb -->
		<section class="main_breadcrumb">
			<div class="container-fluid">
				<div class="row">
					<div class="breadcrumb-content">
						<h2>Password Reset</h2>
					</div>
				</div>
			</div>
		</section>
			
		<div class="footer_copyright footer-custom">
			<div class="container-fluid">
			<p class="wow fadeInDown animated">© Copyright 2022 by Furniture Store. All right Reserved - Design By <a href="https://www.facebook.com/dejan.djurdjev.1/" target="_blank">Dejan Đurđev</a></p>
			</div>
		</div>
		<!-- Footer Section End -->


	
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

	<script>
		$(document).ready(function() {

			var queryString = window.location.search;
			var urlParams = new URLSearchParams(queryString);

			var email = urlParams.get('email');
			var code = urlParams.get('code');

			if(email && code){
				
				$.ajax({

					url: 'ajax/account_confirmation.php',
					method: 'post',
					dataType: 'json',
					data: {email, code},

					success: function(response) {

						console.log(response);

						if(response.status) {

						//	$('.modal-body').html(response.message);
						//	$('#myModal').modal('show');

						//	modal_fade(response.redirect_url);
						}
						else{	

						//	$('.modal-body').html(response.message);
						//	$('#myModal').modal('show');

							//modal_fade('register.php');
						}
					}

				});
			}
			else {
				$('.modal-body').html('This link is not valid');
				$('#myModal').modal('show');

				modal_fade('register.php');
			}

			//function modal_fade(url) {
				
				$('#myModal').delay(3000).fadeOut('slow');

				setTimeout(function() {
					$("#myModal").modal('hide');
					window.location.href = url;
				}, 3000);
			}
		})
	</script>
	<!-- script files -->
	<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/js/custom.js"></script>
	<!-- script files -->
</body>
</html>
