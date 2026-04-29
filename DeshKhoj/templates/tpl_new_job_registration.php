<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>DeshKhoj - New Job Registration</title>
		<meta name="description" content="DeshKhoj ki Soch, Bharat ki Khoj. Search Result Page. Register Your Job Here.">
		<meta name="author" content="DeshKhoj">
		
		<!-- Mobile Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta property="og:title" content="DeshKhoj: New Shop Registration">
		<meta property="og:image" content="./assets/images/logo_meta.jpg">

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
        <div class="pageWrapper">
							    
			<?php
				include("./templates/header.php");
			?>

        
            <div class="section"  >
                <div class="container">
                    
                    <div class="row text-center">
                        <h3>New Job Registration</h3>
                    </div>
                </div>
                <div class="container" id="form_container">
                    <form method="POST" id="businessDetailsForm">
                        
                        <span id="businessDetails" class="">
                            <label class="hidden" id="lbl_user_name">This field can not be empty</label>
                            <input type="text" placeholder="*Your Name" name="reg_user_name" id="reg_user_name" value="">
                            
                            <input type="text" placeholder="*Whatsapp" id="reg_whatsapp" maxlength="10" onkeypress="return onlyNumberKey(event)">
                            <input type="text" placeholder="Email" id="reg_email">
                            <input type="file" accept="application/pdf" id="reg_job_cv" name="reg_shop_photo">
                            
                            <a class="btn btn-block-full btn-xl fx shape" id="selectShopPhoto"  name="selectShopPhoto" style="background-color:#e97e38;margin-bottom: 10px;" data-animate="fadeInUp" onclick="reg_job_cv.click()" ><span class="bolder"> Select Your Resume </span>  <span class="fa fa-long-arrow-right"></span></a>
                            
                            
                            
                        </span>
                        <a class="btn btn-block-full btn-xl fx shape" id="" style="background-color:#e97e38;margin-bottom: 10px;" data-animate="fadeInUp" onclick="newJobFormSubmit()" ><span class="bolder"> Submit Form </span>  <span class="fa fa-long-arrow-right"></span></a>
                    </form>
                </div>
            <div>
        </div>
        <a id="to-top"><span class="fa fa-chevron-up shape main-bg"></span></a>
        <div class="section">
            <div class="row" style="text-align: center;">
                <div class="col" >
                    <img class="loading-image" id="loading-image" src="./assets/images/loading.gif" style="display:none;">
                </div>
            </div>
        </div>
        

	    <!-- Load JS plugins file -->
 		<script type="text/javascript" src="assets/js/assets.min.js"></script>
				
		<!-- general script file -->
		<script type="text/javascript" src="assets/js/script.js"></script>
        <style>
            #verifyOTP, #txtOTP{
                display:none;
            }

            
        </style>
        <script>
            document.querySelector("#mobile").addEventListener("keypress", function (evt) {
                if (evt.which < 48 || evt.which > 57)
                {
                    evt.preventDefault();
                }
            });
            var phone = document.getElementById('mobile'),
            cleanPhoneNumber;
            
            cleanPhoneNumber= function(e) {
            e.preventDefault();
            var pastedText = '';
            if (window.clipboardData && window.clipboardData.getData) { // IE
                pastedText = window.clipboardData.getData('Text');
            } else if (e.clipboardData && e.clipboardData.getData) {
                pastedText = e.clipboardData.getData('text/plain');
            }
            this.value = pastedText.replace(/\D/g, '');
            };
            
            phone.onpaste = cleanPhoneNumber;
            /////
            
            const input = document.querySelector("input")
            const output = document.querySelector("output")
            let imagesArray = []
            
            input.addEventListener("change", function() {
                const file = input.files
  
            })

            function onlyNumberKey(evt) {
 
                // Only ASCII character in that range allowed
                let ASCIICode = (evt.which) ? evt.which : evt.keyCode
                if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
                    return false;
                return true;
            }

            

        </script>

        <style>
            input[type=file] {
                display: block;
                color: red;
                font-style: oblique;
            }
            input[type=file]::file-selector-button {
                display: none;
            }

        </style>
    </body>
</html>
