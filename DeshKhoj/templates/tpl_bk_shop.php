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
		
		<!-- Mobile Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta property="og:title" content="<?= $dukaan_name ?> | Deshkhoj.com - Apna Store | <?php if($category_list[0]){print_r($category_list[0]["category_name"]);}
            if($category_list[1]){print_r(" | ".$category_list[1]["category_name"]);}
            if($category_list[2]){print_r(" | ".$category_list[2]["category_name"]);} ?>">

		<meta property="og:description" content="Just Connect <?= $dukaandar_name ?><?php if($location[0]["block_name"]){print_r(", ".$location[0]["block_name"]);} if($location[0]["state_name"]){print_r(", ".$location[0]["state_name"]);} ?> and dial the number to order from these categories store (<?php if($category_list[0]){print_r($category_list[0]["category_name"]);}
            if($category_list[1]){print_r(", ".$category_list[1]["category_name"]);}
            if($category_list[2]){print_r(", ".$category_list[2]["category_name"]);} ?>). Powered by Deshkhoj.com Mart Solutions, Experience big and star products from the gram bazaar.">
                <meta property="og:image" content="./assets/images/shops/<?= $dukaan_img ?>">

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
	<body onresize="changeWidth()">
		<script src="assets/js/custom_script.js"></script>
		
		
        <div id="contentWrapper">
            <!-- Selection Form Starts -->

            <div class="section" >
                <div class="container">
                    <div class="row">							
                                            
                        <div class="post-item search-font-size col-md-12" style="text-align:center;margin-bottom:2px!important;">
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

            
            

            <div class="row" id="div_searchresults">
            
                           
            </div>
            <div class="row text-center">
                <div class="col-md-12">
                    <h2 class="m_bottom_0" style="color:#e97e38"><b><?= $dukaan_name ?></b></h2>
                    <p class="m_bottom_0"> <?= $dukaan_addr ?><br><span class="dk_verified_span" ><img class="dk_verified_img" src="assets/images/check (3).png"> <b>DK Verified</b></span> </p>
                    <img src="./assets/images/shops/<?= $dukaan_img ?>" style="margin-bottom: 5px" >
                    <p class="m_bottom_0"><?= nl2br($dukaan_desc) ?></p>
                </div>
            </div>
           
            
             
            <div id="prodlist">
                

            </div>
            <br>
            <div id="prod_page_numbering">


            </div>
            

            

            

                                                    
            <!-- Footer start -->
            <br>
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
                    //get_states();
                    getProductList('<?= $dukaan_id ?>','1');
                    
                    
            
            })
            function changeWidth(){
                var imagedivwidth = document.getElementById("prodlist").getElementsByClassName("search-results")[0].getElementsByClassName("col-md-4")[0].offsetWidth;
                console.log(imagedivwidth);
            }

            function getProductList(shop_id, page){
                var prevPage = Number(page) - 1;
                var nextPage = Number(page) + 1;
                var ret_file = '';
                var ret_data = '';
                document.getElementById('prodlist').innerHTML = '<div class="search-results post-item col-md-12 col-sm-12" ><div class="col-md-4 col-sm-4"></div><div class="col-md-8 col-sm-8" style="clear:none;"></div><div class="col-md-12 text-center"><h4 style="margin:0px">Searching ...</h4></div></div>';

                document.getElementById("prodlist").scrollIntoView();
                var imagedivwidth = document.getElementById("prodlist").getElementsByClassName("search-results")[0].getElementsByClassName("col-md-4")[0].offsetWidth;

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
                        village_element.innerHTML += '<div class="row text-center" ><div class="col"><h4 class="m_bottom_0"><b><u>Products / Services</u></b></h4></div></div>'
                        for(var i = 0, l = updated_options.length; i < l; i++){
                            var prod_name = updated_options[i].prod_name.split("(");
                            if(prod_name[1]){ 
                                prod_name_2 = prod_name[1].slice(0,-1).trim();
                                prod_name = prod_name[0]+'<br>'+prod_name[1]
                            }
                            console.log(prod_name);
			    var prod_desc = updated_options[i].prod_desc;
                            var prod_desc_arr = [];
                            prod_desc_arr.push(prod_desc.substring(0, 100));
                            prod_desc_arr.push(prod_desc.substring(100));

                            var prod_desc_more = '';
                            if(prod_desc_arr[1] == ""){

                            }else{
                                prod_desc_more = '<span id="points_'+i+'">...</span><span id="moreText_'+i+'"> '+prod_desc_arr[1]+' </span><button onclick="toggleText('+i+')" id="textButton_'+i+'" style="float: right;">Show More</button>';
                            }

                            //village_element.innerHTML = data;
                            village_element.innerHTML += '<div class="product-list search-results post-item col-md-12 col-sm-12"><div class="col-md-4 col-sm-4" style="z-index:9;"><a><img src="assets/images/prods/'+updated_options[i].photo_name+'" alt="Shop image goes here" style="width:'+imagedivwidth+'px;height:'+imagedivwidth+'px"></a></div><div class="col-md-8 col-sm-8" style="clear:none;"><div class="post-info-container"><div class="post-info"><a ><span class="shop_name">'+prod_name+'</span><br><span class="shop_addr">'+prod_desc_arr[0]+prod_desc_more+'</span><br></a></div></div></div><div class="col-md-12 text-center"><h5 style="margin:0px;background-color:#ffd059;"><a href="tel:+91-<?php echo $contact_no; ?>">Call For Best Price</a></h5></div></div>'
                        

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
                            console.log(page);
                            console.log(updated_options.length);
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


