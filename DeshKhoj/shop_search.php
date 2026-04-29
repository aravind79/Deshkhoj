<?php
	$cat_id=   (!empty($_GET['cat'])) ? $_GET['cat'] : '0';
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>DeshKhoj - Shop Search Results</title>
		<meta name="description" content="DeshKhoj ki Soch, Bharat ki Khoj. Search Result Page.">
		<meta name="author" content="DeshKhoj">
		
		<!-- Mobile Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		
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
												
							<div class="post-item search-font-size col-md-12" style="text-align:center;margin-bottom:2px!important;">
								<span id="select_cat_DD">
									<h4 class="search-font-size bolder" style="margin-bottom: 10px;">
									आइए खोजें ...<br>Lets Search ...
									</h4>
									<select id="select_category" onchange="select_category(this)">
										<option value="0">Select Option</option>
										
									</select>
                                    
								</span>
                                
							</div>
                            <div class="post-item search-font-size col-md-12" style="text-align:center;margin-bottom:2px!important;">
								<span >
									
									<select id="select_state" onchange="get_districts(this)">
										<option value="0">Select State</option>
										
									</select>
                                    
								</span>
                                
							</div>
                            <div class="post-item search-font-size col-md-12" style="text-align:center;margin-bottom:2px!important;">
								<span >
									
									<select id="select_district" onchange="select_state(this)">
										<option value="0">Select State First</option>
										
									</select>
                                    
								</span>
                                
							</div>
							
						</div>
						
						<div class="clearfix"></div>
                        <a class="btn btn-block-full btn-xl fx shape" style="background-color:#e97e38" data-animate="fadeInUp" onclick="btn_getsearchresult('cat', 1)" target="_blank"><span class="bolder"> Search </span>  <span class="fa fa-long-arrow-right"></span></a>
											
					</div>

					
				</div>

                
				

                <div class="row" id="div_searchresults">

                <?php
                    include("tpl_divider.php");
                ?>

                    <div class="section">
                        <div class="container">
                            
                            <div class="heading main-heading centered">
                                <h3>खोज के परिणाम</h3>
                                <h4 class="sub-title">Search <span class="main-color">Results</span></h4>
                                
                            </div>
                            
                            

                            <div class="row">							
                                <div class="blog-posts">
									<!--
									<div class="search-results post-item col-md-12 col-sm-12">
										<div class="col-md-4 col-sm-4">
											<a href="https://www.deshkhoj.com/shops/near-me/25465/sayali-grahudyog" target="_blank">
												<img src="assets/images/shops/sample.jpg" alt="Shop image goes here">
											</a>
										</div>
										<div class="col-md-8 col-sm-8" style="clear:none;">
											<div class="post-info-container">
												<div class="post-info">
													<a href="https://www.deshkhoj.com/shops/near-me/25465/sayali-grahudyog" target="_blank">
														<span class="dk_verified_span" ><img class="dk_verified_img" src="assets/images/check (3).png"> <b>DK Verified</b></span>
														<br>
														
														<span class="shop_name">sayali grahudyog</span>
														<br>
														<span class="shop_addr">, Osmanabad</span>
														
													</a>
												</div>
											</div>
										</div>
										<div class="col-md-12 text-center">
											<h4 style="margin:0px">
												Call Now | Send Email | WhatsApp Enquiry
											</h4>
										</div>
									</div>
									-->
										<!--
                                        <div class="post-item">
                                            <div class="col-4">
                                                <a href="https://www.deshkhoj.com/shops/near-me/'+updated_options[i].id+'/'+shopname+'" target="_blank">
                                                    <img src="assets/images/blog/large/1.jpg" alt="Our Blog post image goes here">
                                                </a>
                                            </div>
                                            <div class="col-8">
                                            
                                            <div class="post-info" >
                                                    
                                                    <p style="font-size: 10px;padding-left: 15px;">
                                                        <b>Shop Name<br>गाव: 'village_name+'<br>ब्लॉक: block_name+'</b>
                                                    </p>
                                                </div>
                                            </div>
                                                    
                                                    
                                        </div>
										-->
									<!--
									<div class="search-results post-item col-md-12 col-sm-12" >
										<div class="col-md-4 col-sm-4" >
											<a href="https://www.deshkhoj.com/shops/near-me/'+updated_options[i].id+'/'+shopname+'" target="_blank">
												<img src="assets/images/features/05.jpg" alt="Our Blog post image goes here">
											</a>
										</div>
										<div class="col-md-8 col-sm-8" style="clear:none;"><div class="post-info-container"><div class="post-info"><a href="https://www.deshkhoj.com/shops/near-me/'+updated_options[i].id+'/'+shopname+'" target="_blank">
										<p style="font-size: 20px;margin-bottom: 0px;"><b>'dukaan_name'<br>गाव: 'village_name'<br>ब्लॉक: 'block_name'<br>DK Verified <img src="assets/images/check (3).png"></b></p></a></div></div></div>
										<div class="col-md-12 text-center">
											<h4 style="margin:0px">Call Now | Send Email | WhatsApp Enquiry</h4>
										</div>
									</div>
									<br><br>
									-->

                                <!--
									<div class="post-item ">
                                    <div class="post-image" >
                                        <a href="https://www.deshkhoj.com/shops/near-me/'+updated_options[i].id+'/'+shopname+'" target="_blank">
                                            <img src="assets/images/blog/large/1.jpg" alt="Our Blog post image goes here">
                                        </a>
                                    </div>
                                    <article class="post-content main-border"><div class="post-info-container"><div class="post-info"><h2 style="font-size: 24px;min-height: 80px;"><a href="https://www.deshkhoj.com/shops/near-me/'+updated_options[i].id+'/'+shopname+'" target="_blank">'+updated_options[i].dukaan_name+'</a></h2></div></div><p style="font-size: 20px;min-height: 150px;"><b>गाव: '+updated_options[i].village_name+'<br>ब्लॉक: '+updated_options[i].block_name+'</b></p><div class="bottom_tools"><a href="https://www.deshkhoj.com/shops/near-me/'+updated_options[i].id+'/'+shopname+'" target="_blank" class="f-right more_btn shape" style="width:100%;text-align: center;font-size: 18px;" id="myBtn"><b>अधिक जानकारी पूछें <br/> क्लिक करें </b></a></div></article>
                                </div>
                            </div>
							-->
                                    <div id="shoplist">

                                    </div>
                                    
                                    
                                </div>
                            </div>
							<br>
                            <div id="page_numbering">

                            </div>
                            <div class="clearfix"></div>
                            
                                                
                        </div>
                    </div>
                </div>


                <?php
				/*
					include("tpl_divider.php");
					include("./templates/tpl_useful_links.php");
				*/
					include("tpl_divider.php");
					include("./templates/tpl_socialconnect.php");

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

        <script type="text/javascript">
            jQuery(document).ready(function($){
                    get_categories();
                    get_states();
					//console.log(<?= $cat_id ?>);
					setTimeout(function() {
						document.getElementById('select_category').value = <?= $cat_id ?>;
					}, 3000);
					
            })
        </script>
    </body>
	
</html>

