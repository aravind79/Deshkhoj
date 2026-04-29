<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>DeshKhoj</title>
		<meta name="description" content="DeshKhoj ki Soch, Bharat ki Khoj">
		<meta name="author" content="DeshKhoj">
		
		<!-- Mobile Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta property="og:title" content="DeshKhoj">
		<meta property="og:description" content="DeshKhoj ki Soch, Bharat ki Khoj">
		<meta property="og:image" itemprop="image" content="./assets/images/logo_meta.jpg">
		<meta property="og:image:width" content="400"/>
		<meta property="og:image:height" content="400"/>
		<meta property="og:image" itemprop="image" content="./assets/images/logo_meta.jpg">
		<meta property="og:image:width" content="400"/>
		<meta property="og:image:height" content="400"/>
		<meta property="og:type" content="website" />

		<!-- Put favicon.ico and apple-touch-icon(s).png in the images folder -->
	    <link rel="shortcut icon" href="assets/images/favicon.jpg">
		    	
		<!-- CSS StyleSheets -->
		<link href='https://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="assets/css/assets.css">
		
		<link rel="stylesheet" href="assets/css/style.css">
		<link id="theme_css" rel="stylesheet" href="assets/css/light.css">
		
		<!--[if lt IE 9]>
	    	<script type="text/javascript" src="assets/js/html5.js"></script>
	    <![endif]-->
		
		<!-- Skin CSS file -->
		<link id="skin_css" rel="stylesheet" href="assets/css/skins/default.css">
		<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>

	</head>
	<body>
		<script src="assets/js/custom_script.js"></script>
		
		<div class="pageWrapper animsition">
							    
			<?php
				include("./templates/header.php");
			?>
		    <div id="contentWrapper">
		    	
				<!-- Selection Form Starts -->

				<div class="section" >
					<div class="container">
						

						<div class="row">							
												
							<div class="post-item search-font-size col-md-12" style="text-align:center;">
								<span id="select_cat_DD">
									<h4 class="search-font-size bolder" style="margin-bottom: 10px;">
									आपको क्या चाहिए ?<br>What are you looking for? 
									</h4>
									<select id="select_category" onchange="select_category(this)">
										<option value="0">Select Option</option>
										
									</select>
								</span>
							</div>
							
						</div>
						
						<div class="clearfix"></div>

											
					</div>

					
				</div>
				
				<!-- Selection Form Ends -->
				
				<?php
					include("tpl_divider.php");
				?>
				<div class="section" style="padding: 0px 0px">
					<div class="container">
						<div class="row" style="text-align: center!important;margin-right: 0px;">							
												
							<div class="post-item search-font-size col-md-6 col-sm-6" style="text-align:center;padding: 0px 20px;clear: none;margin-bottom:0px;width: 50%!important;">
								<span>
									<h4 class="search-font-size bolder" style="margin-bottom:0px;line-height: 1;">
									Registered<br>Businesses<br><span class="promote-count">35000</span>
									</h4>
									
								</span>
							</div>
							<div class="post-item search-font-size col-md-6 col-sm-6" style="text-align:center;padding: 0px 20px;clear: none;margin-bottom:0px;width: 50%!important;">
								<span>
									<h4 class="search-font-size bolder" style="margin-bottom: 0px;line-height: 1;">
									Promoted<br>Businesses<br><span class="promote-count">9000</span>
									</h4>
									
								</span>
							</div>
							
						</div>
						
						<div class="clearfix"></div>

											
					</div>

					
				</div>
								
				<?php
					include("./tpl_divider.php");
				?>

				<div class="section">
					<div class="container">
						
						<div class="heading main-heading centered">
							<h3>प्रसिद्ध कैटागरी</h3>
							<h4 class="sub-title">Popular <span class="main-color">Categories</span></h4>
							
						</div>
						
						

						<div class="row text-center">							
							<div class="blog-posts">
								<div class="post-item col-md-3 col-sm-3 ">
									<div class="post-image square">
										<a >
											<img src="assets/images/products/cake-shop.png" alt="Cake Shop">
											
										</a>
									</div>
								    <h4 class="zero-margin">Cake Shop</h4>
								</div>
								
								<div class="post-item col-md-3 col-sm-3">
									<div class="post-image square">
										
											<img src="assets/images/products/beauty-parlour.png" alt="Beauty Parlour">
										
									</div>
								    <h4 class="zero-margin">Parlour</h4>
								</div>
									
								<div class="post-item col-md-3 col-sm-3">
								    <div class="post-image square">
										<a href="blog-single.html"><img src="assets/images/products/tailoring.png" alt="tailoring"></a>
									</div>
								    <h4 class="zero-margin">Tailoring</h4>
								</div>
								<div class="post-item col-md-3 col-sm-3">
								    <div class="post-image square">
										<a href="blog-single.html"><img src="assets/images/products/maondop-decorator.png" alt="Decorator"></a>
									</div>
								    <h4 class="zero-margin">Decorator</h4>
								</div>

								<div class="post-item col-md-3 col-sm-3">
									<div class="post-image square">
										<a >
											<img src="assets/images/products/furniture-shop.png" alt="Furniture Shop">
										</a>
									</div>
								    <h4 class="zero-margin">Furniture</h4>
								</div>
								
								<div class="post-item col-md-3 col-sm-3">
									<div class="post-image square">
										
											<img src="assets/images/products/cloth-center.png" alt="Clothes Center">
										
									</div>
								    <h4 class="zero-margin">Clothes</h4>
								</div>
									
								<div class="post-item col-md-3 col-sm-3">
								    <div class="post-image square">
										<a href=""><img src="assets/images/products/stationary-shop.png" alt="Stationary Shop"></a>
									</div>
								    <h4 class="zero-margin">Staionary</h4>
								</div>
								<div class="post-item col-md-3 col-sm-3">
								    <div class="post-image square">
										<a href=""><img src="assets/images/products/bangles-shop.png" alt="Bangles Shop"></a>
									</div>
								    <h4 class="zero-margin">Bangles</h4>
								</div>
							</div>
						</div>
						
						<div class="clearfix"></div>
						<a href="./shop_search.php" class="btn btn-block-full btn-xl fx shape" style="background-color:#e97e38" data-animate="fadeInUp" >अन्य कैटागरी के लिए <span class="bolder"> क्लिक करें </span>  <span class="fa fa-long-arrow-right"></span></a>
											
					</div>
				</div>

				<?php
					include("tpl_divider.php");
				?>

				<div class="section " >
					<div class="container">
					
						<div class="row">							
							<div class=" ">
								<div class="post-item col-md-12" style="text-align:center;">
								
									<h4 style="margin-bottom: 10px;">Market your Bussiness with DeshKhoj<br>आत्मनिर्भर भारत को वास्तविकता बनाएं<br>Making Aatmanirbhar Bharat a Reality</h4>
								</div>
							</div>
						</div>
						
						<div class="clearfix"></div>
						<a class="btn btn-block-full btn-xl fx shape" style="background-color:#e97e38" data-animate="fadeInUp" href="new_shop_registration.php" target="_blank">Register Your Bussiness For Free <span class="bolder"> Now </span>  <span class="fa fa-long-arrow-right"></span></a>
											
					</div>
				</div>

				<?php
					include("tpl_divider.php");
				?>

				<!-- Product Section Starts -->
				<div class="section">
					<div class="container">
						
						<div class="heading main-heading centered">
							<h3>प्रसिद्ध उत्पाद</h3>
							<h4 class="sub-title">Popular <span class="main-color">Products</span></h4>
							
						</div>
						
						

						<div class="row text-center">							
							<div class="blog-posts">
								<div class="post-item col-md-3 col-sm-3">
									<div class="post-image square">
										<a >
											<img src="assets/images/products/vermicompost.png" alt="Vermi Compost">
										</a>
									</div>
								    <h4 class="zero-margin">Vermi compost</h4>
								</div>
								
								<div class="post-item col-md-3 col-sm-3">
									<div class="post-image square">
										
											<img src="assets/images/products/chocolate-cake.png" alt="Chocolate Cake">
										
									</div>
								    <h4 class="zero-margin">Chocolate Cake</h4>
								</div>
									
								<div class="post-item col-md-3 col-sm-3">
								    <div class="post-image square">
										<a href="blog-single.html"><img src="assets/images/products/udid-papad.png" alt="Udid Papad"></a>
									</div>
								    <h4 class="zero-margin">Udid Papad</h4>
								</div>
								<div class="post-item col-md-3 col-sm-3">
								    <div class="post-image square">
										<a href="blog-single.html"><img src="assets/images/products/ladies-kurti.png" alt="Ladies Kurti"></a>
									</div>
								    <h4 class="zero-margin">Ladies Kurti</h4>
								</div>

								<div class="post-item col-md-3 col-sm-3">
									<div class="post-image square">
										<a >
											<img src="assets/images/products/soya-coffee.png" alt="Soya Coffee">
										</a>
									</div>
								    <h4 class="zero-margin">Soya Coffee</h4>
								</div>
								
								<div class="post-item col-md-3 col-sm-3">
									<div class="post-image square">
										
											<img src="assets/images/products/flex-seeds.png" alt="Flex Seeds">
										
									</div>
								    <h4 class="zero-margin">Flex Seeds</h4>
								</div>
									
								<div class="post-item col-md-3 col-sm-3">
								    <div class="post-image square">
										<a href=""><img src="assets/images/products/mehendi.png" alt="Mehendi"></a>
									</div>
								    <h4 class="zero-margin">Mehendi</h4>
								</div>
								<div class="post-item col-md-3 col-sm-3">
								    <div class="post-image square">
										<a href=""><img src="assets/images/products/handbag.png" alt="HandBags"></a>
									</div>
								    <h4 class="zero-margin">HandBags</h4>
								</div>
							</div>
						</div>
						
						<div class="clearfix"></div>
						<a href="./shop_search.php" class="btn btn-block-full btn-xl fx shape" style="background-color:#e97e38" data-animate="fadeInUp" >अन्य उत्पादों के लिए <span class="bolder"> क्लिक करें </span>  <span class="fa fa-long-arrow-right"></span></a>
											
					</div>
				</div>

				<!-- Product Section Ends -->

				<?php
					include("tpl_divider.php");
				?>

				<div class="section" >
					<div class="container">
						
						<div class="heading main-heading centered">
							<div class="row " >
								<div class="col-md-4 col-sm-4" style="clear: none;">
								
								</div>	
								<div class="col-md-4 col-sm-4" style="clear: none;height: 48px;">
									<img src="assets/images/jobkhoj-logo.jpg">
								</div>	
								<div class="col-md-4 col-sm-4" style="clear: none;">
								
								</div>	
							</div>
							
							
							
						</div>
						
						

						<div class="row">							
							<div class=" ">
								<div class="post-item col-md-12" style="text-align:center;">
								
									<h4 style="margin-bottom: 10px;">Looking for a Job?<br>भारत की शीर्ष कंपनियों में नौकरियाँ<br>Jobs with Top companies of Bharat</h4>
								</div>
							</div>
						</div>
						
						<div class="clearfix"></div>
						<a class="btn btn-block-full btn-xl fx shape" style="background-color:#e97e38" data-animate="fadeInUp" href="new_job_registration.php" target="_blank">Upload your Biodata (CV)<span class="fa fa-long-arrow-right"></span></a>
											
					</div>
				</div>

				
				<!-- Personal Loan Section Starts -->

				<?php
					include("tpl_divider.php");
				?>

				<div class="section" >
					<div class="container">
						
						<div class="heading main-heading centered">
							<h3>व्यक्तिगत/व्यावसायिक ऋण की तलाश है?</h3>
							<h4 class="sub-title">Looking For A <span class="main-color">Personal/Business Loan?</span></h4>
							<div class="row " >
								<div class="col-md-4 col-sm-4" style="clear: none;">
								
								</div>	
								<div class="col-md-4 col-sm-4" style="clear: none;height: 48px;">
									<img src="assets/images/loankhoj-logo.jpg">
								</div>	
								<div class="col-md-4 col-sm-4" style="clear: none;">
								
								</div>	
							</div>
							
						</div>
						
						

						<div class="row">							
							<div class=" ">
								<div class="post-item col-md-12" style="text-align:center;">
								
									<h4 style="margin-bottom: 10px;">Easy Loans, Low EMI<br>आगे बढ़ेगा भारत </h4>
								</div>
							</div>
						</div>
						
						<div class="clearfix"></div>
						<a class="btn btn-block-full btn-xl fx shape" style="background-color:#e97e38" data-animate="fadeInUp" href="#" target="_blank">Submit Loan Requirement Here<span class="fa fa-long-arrow-right"></span></a>
											
					</div>
				</div>

				<!-- Personal Loan Ends -->

				<?php
					/*
					include("tpl_divider.php");
					include("./templates/tpl_useful_links.php");
					*/
					include("tpl_divider.php");
					include("./templates/tpl_socialconnect.php");
					include("tpl_divider.php");
					include("./templates/tpl_contact_disclaimer.php");
				?>

				

									    			    
		    	<!-- Footer start -->
			    <?php
					include("./templates/footer.php");
				?>
		    	<!-- Footer end -->
		    </div>
		</div>
		
		    	
		<!-- Back to top Link -->
	    <a id="to-top"><span class="fa fa-chevron-up shape main-bg"></span></a>


	    <!-- Load JS plugins file -->
 		<script type="text/javascript" src="assets/js/assets.min.js"></script>
				
		<!-- general script file -->
		<script type="text/javascript" src="assets/js/script.js"></script>
	<style>
		/* The Modal (background) */
		.modal {
		display: none; /* Hidden by default */
		position: fixed; /* Stay in place */
		left: 0;
		top: 0;
		width: 100%; /* Full width */
		height: 100%; /* Full height */
		overflow: auto; /* Enable scroll if needed */
		background-color: rgb(0,0,0); /* Fallback color */
		background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
		}

		/* Modal Content/Box */
		.modal-content {
		background-color: #fefefe;
		margin: 15% auto; /* 15% from the top and centered */
		padding: 20px;
		border: 1px solid #888;
		width: 80%; /* Could be more or less, depending on screen size */
		}

		/* The Close Button */
		.close {
		color: #aaa;
		float: right;
		font-size: 28px;
		font-weight: bold;
		}

		.close:hover,
		.close:focus {
		color: black;
		text-decoration: none;
		cursor: pointer;
		}
	</style>
	<script type="text/javascript">
		jQuery(document).ready(function($){
				get_categories();
				

			})
		// Get the modal
		var modal = document.getElementById("myModal");

		// Get the button that opens the modal
		var btn = document.getElementById("myBtn");
		var btn2 = document.getElementById("myBtn2");
		var btn3 = document.getElementById("myBtn3");

		// Get the <span> element that closes the modal
		var span = document.getElementsByClassName("close")[0];

		// When the user clicks on the button, open the modal
		btn.onclick = function() {
		modal.style.display = "block";
		}

		btn2.onclick = function() {
		modal.style.display = "block";
		}

		btn3.onclick = function() {
		modal.style.display = "block";
		}

		// When the user clicks on <span> (x), close the modal
		span.onclick = function() {
		modal.style.display = "none";
		}

		// When the user clicks anywhere outside of the modal, close it
		window.onclick = function(event) {
		if (event.target == modal) {
			modal.style.display = "none";
		}
		}
/*
		function formSubmit(){
			console.log("Submitted");
		}
*/
		

		
			
	</script>
	</body>
	
</html>

