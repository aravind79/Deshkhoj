<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="title" content="<?= $dukaan_name ?> | Deshkhoj.com - Apna Store | <?php if($category_list[0]){print_r($category_list[0]["category_name"]);}
            if($category_list[1]){print_r(" | ".$category_list[1]["category_name"]);}
            if($category_list[2]){print_r(" | ".$category_list[2]["category_name"]);} ?>">
        <meta name="description" content="Just Connect <?= $dukaandar_name ?><?php if($location[0]["block_name"]){print_r(", ".$location[0]["block_name"]);} if($location[0]["state_name"]){print_r(", ".$location[0]["state_name"]);} ?> and dial the number to order from these categories store (<?php if($category_list[0]){print_r($category_list[0]["category_name"]);}
            if($category_list[1]){print_r(", ".$category_list[1]["category_name"]);}
            if($category_list[2]){print_r(", ".$category_list[2]["category_name"]);} ?>). Powered by Deshkhoj.com Mart Solutions, Experience big and star products from the gram bazaar.">
        <meta name="keywords" content="<?php if($category_list[0]){print_r($category_list[0]["category_name"]." shop");}
            if($category_list[1]){print_r(", ".$category_list[1]["category_name"]." shop");}
            if($category_list[2]){print_r(", ".$category_list[2]["category_name"]." shop");} ?>, shops near me, best shop, cheap shop,Deshkhoj.com. SURE, Sugam Network, Shops in <?php if($location[0]["block_name"]){print_r($location[0]["block_name"]);} if($location[0]["state_name"]){print_r(", ".$location[0]["state_name"]);} ?>, Digital India, Atmanirbhar Bharat,  Gram Vikas, Rural Development">
		<meta name="author" content="DeshKhoj">
        <meta property="og:title" content="<?= $dukaan_name ?> | Deshkhoj.com - Apna Store | <?php if($category_list[0]){print_r($category_list[0]["category_name"]);}
            if($category_list[1]){print_r(" | ".$category_list[1]["category_name"]);}
            if($category_list[2]){print_r(" | ".$category_list[2]["category_name"]);} ?>">

                <meta property="og:description" content="Just Connect <?= $dukaandar_name ?><?php if($location[0]["block_name"]){print_r(", ".$location[0]["block_name"]);} if($location[0]["state_name"]){print_r(", ".$location[0]["state_name"]);} ?> and dial the number to order from these categories store (<?php if($category_list[0]){print_r($category_list[0]["category_name"]);}
            if($category_list[1]){print_r(", ".$category_list[1]["category_name"]);}
            if($category_list[2]){print_r(", ".$category_list[2]["category_name"]);} ?>). Powered by Deshkhoj.com Mart Solutions, Experience big and star products from the gram bazaar.">
                <meta property="og:image" content="./assets/images/shops/<?= $dukaan_img ?>">
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
        
        <!-- Open layer map Api-->
        <script src="https://cdn.jsdelivr.net/npm/ol@v9.0.0/dist/ol.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/ol@v9.0.0/ol.css">

        <!-- Send mail code -->
        <script src="https://smtpjs.com/v3/smtp.js"></script>
    
        <script type="text/javascript">
            
        </script>
        
	</head>
	<body onresize="changeWidth()">
		<script src="assets/js/custom_script.js"></script>
		
		
        <div id="contentWrapper">
            <div class="section" >
                <div class="container">
                    <div class="row">							
                                            
                        <div class="post-item search-font-size col-md-12" style="margin-bottom:2px!important;">
                            <a href="https://www.deshkhoj.com"><h4 class="">Deshkhoj Home</h4></a>
                            
                        </div>
                        
                    </div>
                    
                </div>

            </div>

            
            

            <div class="row" id="div_searchresults">
            
                           
            </div>
            <div class="row text-center">
                <div class="col-md-12">
                    <h1 class="m_bottom_0" style="color:#e97e38"><b><?= $dukaan_name ?></b></h1>
                    <h2 class="m_bottom_0" style="font-size:2rem;"><?= $dukaan_addr ?></h2>
                    <h3 class="m_bottom_0" style="font-size:1.5rem;"><?= $email ?><br><u>Dukandaar name</u><br><?= $dukaandar_name ?></h3><span class="dk_verified_span" ><img class="dk_verified_img" src="assets/images/check (3).png"> <b>DK Verified</b></span>
                </div>
                <div class="col-md-4">

                </div>
                <div class="col-md-4">
                    <?php
                        if( $dukaan_img == "sample.jpg" ){
                    ?>
                        <span id="shop_img_span" style="background-color:orange;height: 300px;display: block;color: white;font-size: 1400%;"></span>
                    <?php
                        }else{
                    ?>
                        <img src="./assets/images/shops/<?= $dukaan_img ?>" style="margin-bottom: 5px" >
                    <?php
                        }
                    ?>
                    
                    
                    
                    
                </div>
                <div class="col-md-4">
                
                </div>

                    
                <div class="col-md-12">
                    <p class="m_bottom_0"><?= nl2br($dukaan_desc) ?></p>
<!--
		    <div class="gmap_div">
                        <h3>Gmap Div</h3>
                        <div id="map" style="width: 100%; height: 400px"></div>
                    </div>
-->
		    <?php
                            if( $video_name != "" ){
                    ?>
                    <div class="vid_sec">

			<iframe src="<?= $video_name ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>

                    </div>
		    <?php
                        }
                    ?>
                </div>

            </div>
           <br>
            
             
            <div id="prodlist" class="text-center">
                

            </div>
            <br>
            <div id="prod_page_numbering">


            </div>
            

            <hr>
            
            
            <!-- Selection Form Starts -->

            <div class="section" >
                <div class="container">
                    <div class="row">							
                                            
                        <div class="post-item search-font-size col-md-12" style="text-align:center;margin-bottom:2px!important;">
                            <h4 style="margin:0px;">Search More Products/Services/Businesses</h4>
                            <span id="select_cat_DD">
                                
                                <select id="select_category" onchange="select_category(this)">
                                    <option value="0">Select Option</option>
                                    
                                </select>
                                
                            </span>
                            
                        </div>
                        <!--
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
                        -->
                    </div>
                    <!--
                    <div class="clearfix"></div>
                    <a class="btn btn-block-full btn-xl fx shape" style="background-color:#e97e38" data-animate="fadeInUp" onclick="btn_getsearchresult('cat', 1)" target="_blank"><span class="bolder"> Search </span>  <span class="fa fa-long-arrow-right"></span></a>
                    -->                
                </div>

                
            </div>

            <hr>

            <div class="section">
                <div class="container">
                    <div clas="row">
                        <div class="post-item search-font-size col-md-12" style="text-align:center;margin-bottom:2px!important;">
                            <h4 style="margin:0px;">Have a Question?</h4>
                            <span>
                                <textarea id="haveQuestionTA" rows="4" cols="50" placeholder="Ask Your Question here....." style="font-size: 12px;"></textarea>
                                <h5 style="margin:0px;background-color:#ffd059;border-radius: 12px;box-shadow: rgba(57, 31, 91, 0.24) 0 2px 2px,rgba(179, 132, 201, 0.4) 0 8px 12px"><a id="haveQuestionSM" onclick="haveQuestionSM()">Send Message</a></h5>
                            </span>
                            
                        </div>
                    </div>
                </div>
            </div>
            
                                                    
            <!-- Footer start -->
            <hr>
            <?php
                include("./templates/tpl_socialconnect.php");
            ?>
            <hr>
            <?php
                include("./templates/footer.php");
            ?>
            <!-- Footer end -->


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
                    getShopNameInitials();
                    mapCreation();
                    //get_states();
                    getProductList('<?= $dukaan_id ?>','1');
                    
                    
            
            })
            function changeWidth(){
                var imagedivwidth = document.getElementById("prodlist").getElementsByClassName("search-results")[0].getElementsByClassName("col-md-12")[0].offsetWidth;
                console.log(imagedivwidth);
            }

            function getProductList(shop_id, page){
                var prevPage = Number(page) - 1;
                var nextPage = Number(page) + 1;
                var ret_file = '';
                var ret_data = '';
                document.getElementById('prodlist').innerHTML = '<div class="search-results post-item col-md-12 col-sm-12" ><div class="col-md-4 col-sm-4"></div><div class="col-md-8 col-sm-8" style="clear:none;"></div><div class="col-md-12 text-center"><h4 style="margin:0px">Searching ...</h4></div></div>';

                document.getElementById("prodlist").scrollIntoView();
                var imagedivwidth = document.getElementById("prodlist").getElementsByClassName("search-results")[0].getElementsByClassName("col-md-12")[0].offsetWidth;
                if(imagedivwidth > 800){ imagedivwidth = 800; }

                ret_file = "./ajax/_return_prodlist_by_shop.php";
                ret_data = "pass_id="+shop_id+"&page="+page;
                var village_element = document.getElementById('prodlist');
                var page_element = document.getElementById('prod_page_numbering');
                $.ajax({
                    type: "GET",
                    url: ret_file,
                    data: ret_data,
                    success: function( data ) {
                        //console.log(id);
                        //console.log(data);
                        //Villages
                        $('#prodlist').children().remove().end()
                        $('#prod_page_numbering').children().remove().end()
                        //var village_element = document.getElementById('prodlist');
                        //var page_element = document.getElementById('prod_page_numbering');
                        var updated_options = JSON.parse(data);
                        //console.log(updated_options);
                        //console.log(updated_options.length);
                        village_element.innerHTML += '<div class="row text-center" ><div class="col"><h2 class="m_bottom_0"><b><u>Products / Services</u></b></h2></div></div>'
                        for(var i = 0, l = updated_options.length; i < l; i++){
                            var prod_name = updated_options[i].prod_name.split("(");
                            if(prod_name[1]){ 
                                prod_name_2 = prod_name[1].slice(0,-1).trim();
                                prod_name = prod_name[0]+'<br>'+prod_name[1]
                            }
                            //console.log(prod_name);
                            var prod_desc = updated_options[i].prod_desc;
                            var prod_desc_arr = [];
                            prod_desc_arr.push(prod_desc.substring(0, 100));
                            prod_desc_arr.push(prod_desc.substring(100));

                            var prod_desc_more = '';
                            if(prod_desc_arr[1] == ""){

                            }else{
                                prod_desc_more = '<span id="points_'+i+'">...</span><span id="moreText_'+i+'"> '+prod_desc_arr[1]+' </span><button onclick="toggleText('+i+')" id="textButton_'+i+'" style="float: right;border-radius: 12px;font-size: 12px;">Show More</button>';
                            }

                            //village_element.innerHTML = data;
                            village_element.innerHTML += '<div class="product-list search-results post-item col-md-12 col-sm-12"><div class="post-info"><a ><span class="shop_name"><h3 class="m_bottom_0">'+prod_name+'</h3></span><br></a></div><div class="col-md-12 col-sm-12" style="z-index:9;"><a><img src="assets/images/prods/'+updated_options[i].photo_name+'" alt="Shop image goes here" style="width:'+imagedivwidth+'px;height:'+imagedivwidth+'px"></a></div><div class="col-md-12 col-sm-12" style="clear:none;"><div class="post-info-container"><div class="post-info"><a ><span class="shop_addr">'+prod_desc_arr[0]+prod_desc_more+'</span><br></a></div></div></div><div class="col-md-12 text-center"><h5 style="margin:0px;background-color:#ffd059;border-radius: 12px;box-shadow: rgba(57, 31, 91, 0.24) 0 2px 2px,rgba(179, 132, 201, 0.4) 0 8px 12px"><a href="tel:+91-<?php echo $contact_no; ?>">Call For Best Price</a></h5></div></div>'
                        

                        }
                        /* Prev Page Starts*/
                        if(updated_options.length != 0){
                            if(page > 1){
                                page_element.innerHTML = '<div class="post-item col-md-4"><a class="btn btn-block-full btn-xl fx shape new-angle animated fadeInUp" style="background-color:#ffcc80" data-animate="fadeInUp" onclick="getProductList('+"'"+shop_id+"'"+', '+"'"+prevPage+"'"+')" target="_blank"><span class="bolder">Prev</span>  <span class="fa fa-long-arrow-right"></span></a></div>'
                            }else{
                                page_element.innerHTML = '<div class="post-item col-md-4"></div>'
                            }

                            /*Prev Page Ends */

                            /* Page no Starts */
                            //console.log(page);
                            //console.log(updated_options.length);
                            if((page == 1 && updated_options.length == 5) || page > 1){
                                page_element.innerHTML += '<div class="post-item col-md-4" style="text-align:center"><h3 class="margin-bottom: 10px!important;">Page '+page+'</h3></div>'
                            }else{
                                page_element.innerHTML += '<div class="post-item col-md-4"></div>'
                            }

                            /* Page no Ends */

                            /* Next Page Starts */

                            if(updated_options.length < 4){
                                page_element.innerHTML += '<div class="post-item col-md-4"></div></div>'
                            }else{
                                page_element.innerHTML += '<div class="post-item col-md-4"><a class="btn btn-block-full btn-xl fx shape new-angle animated fadeInUp" style="background-color:#ffcc80" data-animate="fadeInUp" onclick="getProductList('+"'"+shop_id+"'"+', '+"'"+nextPage+"'"+')" ><span class="bolder">Next</span>  <span class="fa fa-long-arrow-right"></span></a></div></div>'
                            }

                            /* Next Page Ends */
                        }else if(updated_options.length == 0){

                            if(page > 1){

                                page_element.innerHTML = '<div class="post-item1 col-md-4"><a class="btn btn-block-full btn-xl fx shape new-angle animated fadeInUp" style="background-color:#ffcc80" data-animate="fadeInUp" onclick="getProductList('+"'"+shop_id+"'"+', '+"'"+prevPage+"'"+')" target="_blank"><span class="bolder">Prev</span>  <span class="fa fa-long-arrow-right"></span></a></div>'
                            }else{
                                page_element.innerHTML = '<div class="post-item col-md-4"></div>'
                            }
                            page_element.innerHTML += '<div class="post-item2 col-md-4"></div><div class="post-item3 col-md-4"></div>'
                        }
                    }
                    
                
                });
                if(page > 1){
                    document.getElementById("prodlist").scrollIntoView();
                }
                
            }


            function toggleText(id) {
 
                // Get all the elements from the page
                var pnts = "points_"+id;
                var mrtxt = "moreText_"+id;
                var txtbtn = "textButton_"+id;
                let points = 
                    document.getElementById(pnts);

                let showMoreText =
                    document.getElementById(mrtxt);

                let buttonText =
                    document.getElementById(txtbtn);

                // If the display property of the dots 
                // to be displayed is already set to 
                // 'none' (that is hidden) then this 
                // section of code triggers
                if (points.style.display === "none") {

                    // Hide the text between the span
                    // elements
                    showMoreText.style.display = "none";

                    // Show the dots after the text
                    points.style.display = "inline";

                    // Change the text on button to 
                    // 'Show More'
                    buttonText.innerHTML = "Show More";
                }

                // If the hidden portion is revealed,
                // we will change it back to be hidden
                else {

                    // Show the text between the
                    // span elements
                    showMoreText.style.display = "inline";

                    // Hide the dots after the text
                    points.style.display = "none";

                    // Change the text on button
                    // to 'Show Less'
                    buttonText.innerHTML = "Show Less";
                }
            }

            function getShopNameInitials(){
                var shopName = "<?= $dukaan_name ?>";
                var arrShopName = shopName.trim().split(" ");
                let arrLen = arrShopName.length;
                var p1 = arrShopName[0];
                var p2 = "";
                if(arrLen > 1){
                    p2 = arrShopName[arrLen - 1];    
                }else{
                    p2 = "";
                }
                let firstP1 = p1.charAt(0);
                let firstP2 = p2.charAt(0);
                <?php
                    if($dukaan_img == "sample.jpg"){
                ?>
                        $("#shop_img_span").html(firstP1+" "+firstP2);
                <?php
                    }
                ?>
                
                console.log(shopName);
                console.log(arrShopName);
                console.log(arrLen);
                console.log(p1+" "+p2);
                console.log(p1.charAt(0));
                console.log(p2.charAt(0));
            }

            function haveQuestionSM(){
                console.log("Send Message button Clicked");
                let shopId = "<?= $dukaan_id ?>";
                let shopName = "<?= $dukaan_name ?>";
                let shopkeeperName = "<?= $dukaandar_name ?>";
                let contactNo = "<?= $contact_no ?>";
                let question = $("#haveQuestionTA").val();
                console.log(shopId);
                console.log(shopName);
                console.log(shopkeeperName);
                console.log(contactNo);
                console.log(question);

                
                var data = {
                service_id: 'service_qjs0quu',
                template_id: 'template_7ip4rl5',
                user_id: 'X-Zz_D1iromh-afEJ',
                template_params: {
                    'shopId': shopId,
                    'shopName': shopName,
                    'shopkeeperName': shopkeeperName,
                    'contactNo': contactNo,
                    'question': question,
                    'shopURL': shopURL
                }
                };
                
                $.ajax('https://api.emailjs.com/api/v1.0/email/send', {
                    type: 'POST',
                    data: JSON.stringify(data),
                    contentType: 'application/json'
                }).done(function() {
                    alert('Your mail is sent!');
                }).fail(function(error) {
                    alert('Oops... ' + JSON.stringify(error));
                });
                
            }

            function sendEmail() {
                /*
                Email.send({
                    Host: "smtp.gmail.com",
                    Username: "anshulsharma663@gmail.com",
                    Password: "anshi1993",
                    service_id: "service_qjs0quu",
                    user_id: "X-Zz_D1iromh-afEJ",
                    To: 'anshulsharma633@gmail.com',
                    From: "anshulsharma663@gmail.com",
                    Subject: "Sending Email using javascript",
                    Body: "Well that was easy!!",
                })
                    .then(function (message) {
                        alert("mail sent successfully")
                    });
                */
               /*
                event.preventDefault(); // prevent reload
    
                var formData = new FormData(this);
                formData.append('service_id', 'service_qjs0quu');
                formData.append('template_id', 'template_7ip4rl5');
                formData.append('user_id', 'X-Zz_D1iromh-afEJ');
            
                $.ajax('https://api.emailjs.com/api/v1.0/email/send-form', {
                    type: 'POST',
                    data: formData,
                    contentType: false, // auto-detection
                    processData: false // no need to parse formData to string
                }).done(function() {
                    alert('Your mail is sent!');
                }).fail(function(error) {
                    alert('Oops... ' + JSON.stringify(error));
                });
                */
                
            }

            function mapCreation(){
                
            }
        </script>
        <style>
            a img {
                transition:transform 0.25s ease;
            }
            
            a img:hover {
                -webkit-transform:scale(1.5);
                transform:scale(1.5);
            }
            [id^=moreText_] {
 
                /* Display nothing for the element */
                display: none;
            }
        </style>
    </body>
</html>


