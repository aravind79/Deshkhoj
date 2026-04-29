<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>DeshKhoj - New Shop Registration</title>
		<meta name="description" content="DeshKhoj ki Soch, Bharat ki Khoj. Search Result Page. Register Your Shop Here.">
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

        
            <div class="section" >
                <div class="container">
                    <div class="row text-center">
                        <h3>New Shop Registration</h3>
                    </div>
                </div>
                <div class="container" id="form_container">
                    <form method="POST" id="businessDetailsForm">
                        <!--
                        <span id="spanOTP">
                            <input type="tel" pattern="\d" placeholder="Mobile no." id="mobile" onkeypress="if (this.value.length > 9 || isNaN(this.value)) return false;"/> 
                            <a class="btn btn-block-full btn-xl fx shape" id="getOTP" style="background-color:#e97e38;margin-bottom: 10px;" data-animate="fadeInUp" onclick="isValid_Mobile_Number(document.getElementById('mobile').value)" ><span class="bolder"> Get OTP </span>  <span class="fa fa-long-arrow-right"></span></a>
                            <input type="number" id="txtOTP" placeholder="OTP" pattern="\d*" onkeypress="if (this.value.length > 5 || isNaN(this.value)) return false;">
                            <a class="btn btn-block-full btn-xl fx shape" id="verifyOTP" style="background-color:#e97e38;margin-bottom: 10px;" data-animate="fadeInUp" onclick="verifyOTP(document.getElementById('mobile').value, document.getElementById('txtOTP').value)" ><span class="bolder"> Verify OTP </span>  <span class="fa fa-long-arrow-right"></span></a>
                        </span>
                        <br>
                        -->
                        <span id="businessDetails" class="">
                            <label class="hidden" id="lbl_user_name">This field can not be empty</label>
                            <input type="text" placeholder="*Your Name" name="reg_user_name" id="reg_user_name" value="">
                            <input type="text" placeholder="*Name of Bussiness" name="reg_business_name" id="reg_business_name">
                            <input type="file" accept="image/jpeg, image/png, image/jpg" id="reg_shop_photo" name="reg_shop_photo">
                            
                            <a class="btn btn-block-full btn-xl fx shape" id="selectShopPhoto"  name="selectShopPhoto" style="background-color:#e97e38;margin-bottom: 10px;" data-animate="fadeInUp" onclick="reg_shop_photo.click()" ><span class="bolder"> Select Shop Photo </span>  <span class="fa fa-long-arrow-right"></span></a>
                            <select name="select_state" id="select_state" onchange="get_districts(this);">
                                <option value="0">Select State</option>
                                <?php
                                    foreach($state_list as $s){
                                ?>
                                <option value="<?= $s["id"]; ?>"><?= $s["state_name"]; ?> (<?= $s["state_abbr"]; ?>)</option>
                                <?php
                                    }
                                ?>
                            </select>

                            <select name="select_district" id="select_district" onchange="get_blocks(this);">
                                <option value="0">Select State First</option>
                                
                            </select>

                            <select name="select_blocks" id="select_blocks" onchange="get_villages(this);">

                                <option value="0">Select District First</option>
                                
                            </select>

                            <select id="select_village">
                                <option value="0">Select Block First</option>
                                
                            </select>
                            
                            <input type="integer" placeholder="Pincode" id="reg_pincode" maxlength="6" onkeypress="return onlyNumberKey(event)">
                            <input type="text" placeholder="*Whatsapp" id="reg_whatsapp" maxlength="10" onkeypress="return onlyNumberKey(event)">
                            <input type="text" placeholder="Email" id="reg_email">
                            <input type="text" placeholder="*Bussiness Description" id="reg_shop_desc">
                            
                            <select id="reg_cat_1">
                                <option value="0">*Select Category 1</option>
                                <?php
                                    foreach($category_list as $cat){
                                ?>

                                    <option value="<?= $cat["id"] ?>"><?= $cat["loc_category_name"] ?> (<?= $cat["category_name"] ?>)</option>

                                <?php
                                    }
                                ?>
                            </select>

                            <select id="reg_cat_2">
                                <option value="0">Select Category 2</option>
                                <?php
                                    foreach($category_list as $cat){
                                ?>

                                    <option value="<?= $cat["id"] ?>"><?= $cat["loc_category_name"] ?> (<?= $cat["category_name"] ?>)</option>

                                <?php
                                    }
                                ?>
                            </select>

                            <select id="reg_cat_3">
                                <option value="0">Select Category 3</option>
                                <?php
                                    foreach($category_list as $cat){
                                ?>

                                    <option value="<?= $cat["id"] ?>"><?= $cat["loc_category_name"] ?> (<?= $cat["category_name"] ?>)</option>

                                <?php
                                    }
                                ?>
                            </select>

                            

                            <h4 class="text-center">Products</h4>

                            <span id="productList">
                                <span id="prod_1">
                                    <input type="text" placeholder="Product Name" id="prodName_1">
                                    <input type="text" placeholder="Weight / No. of Pieces" id="prodPeices_1">
                                    <input type="text" placeholder="Rate per unit" id="prodUnit_1">
                                    <input type="file" accept="image/jpeg, image/png, image/jpg" id="prod_photo_1">
                                    <a class="btn btn-block-full btn-xl fx shape new-angle animated" id="selectProdPhoto1" style="background-color:#e97e38;margin-bottom: 10px;" data-animate="fadeInUp" onclick="prod_photo_1.click()" ><span class="bolder"> Select Product 1 Photo </span>  <span class="fa fa-long-arrow-right"></span></a>

                                </span>
                            </span>
                            <a class="btn btn-block-full btn-xl fx shape" id="addNewProd" style="background-color:#e97e38;margin-bottom: 10px;font-size: 12px;
                            width: min-content;" data-animate="fadeInUp" onclick="addNewProd(1)" ><span class="bolder"> Add new Product </span>  <span class="fa fa-long-arrow-right"></span></a>
                        </span>
                        <a class="btn btn-block-full btn-xl shape" id="" style="background-color:#e97e38;margin-bottom: 10px;" data-animate="fadeInUp" onclick="newRegFormSubmit_2()" ><span class="bolder"> Submit Form </span>  <span class="fa fa-long-arrow-right"></span></a>
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
