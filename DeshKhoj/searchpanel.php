
<div class="section bg-green" id="section_searchpanel">
    <div class="container">
        
        <div class="heading main-heading centered">
            <h3><span class="main-color">दुकान</span> खोजें</h3>
            <h4 class="sub-title"><span class="main-color">Shop</span> Search</h4>
            <div class="heading-separator"><span class="main-bg"></span><span class="dark-bg"></span></div>
        </div>
        
        

        <div class="row" >							
            <div class=" ">
                <div class="post-item col-md-12" style="text-align:center;">
                
                    <h4 style="margin-bottom: 0px;">
                        What are you looking for?<br>
						Search via Category Or Place
                    </h4>
                    
                </div>
            </div>
        </div>
        <div class="row">							
            <div class=" ">
                <div class="post-item col-md-6 col-sm-6" style="text-align:center;">
                
                    <a class="btn btn-block-full btn-xl fx shape" style="background-color:#ffcc80" data-animate="fadeInUp" id="category_btn" onclick="changeSearchOption('Cat')" >
                        <span class="bolder">
                            <span style="line-height: 1.5;">Category</span>
                            <br>श्रेणि 
                        </span>
                        <span class="fa fa-long-arrow-right"></span>
                    </a>
                    
                </div>
                <div class="post-item col-md-6 col-sm-6" style="text-align:center;">
                
                <a class="btn btn-block-full btn-xl fx shape" style="background-color:#ffcc80" data-animate="fadeInUp" id="place_btn" onclick="changeSearchOption('Place')" >
                    <span class="bolder">
                        <span style="line-height: 1.5;">Place</span>
                        <br>स्थान
                    </span>
                    <span class="fa fa-long-arrow-right"></span>
                </a>
                    
                </div>
            </div>
        </div>

        <!-- Category wise Search Starts -->
        <div class="row">							
            <div class=" ">
                <div class="post-item search-font-size col-md-12" style="text-align:center;">
                    <span id="select_cat_DD">
                        <label class="search-font-size bolder">
                            उत्पाद श्रेणी का चयन करें / Select Product Category 
                        </label>
                        <select id="select_category" onchange="select_category(this)">
                            <option value="0">Select Category</option>
                            
                        </select>
                    </span>
                    <span id="select_place_DD">
                        <label class="search-font-size bolder">
                            राज्य / State 
                        </label>
                        <select id="select_state" onchange="get_districts(this)">
                            <option value="0">Select State</option>
                        </select>

                        <label class="search-font-size bolder">
                            जिल्हा / District
                        </label>
                        <select id="select_district" onchange="get_blocks(this)">
                            <option value="0">Select State First</option>
                            
                        </select>

                        <label class="search-font-size bolder">
                            तालुका / Block 
                        </label>
                        <select id="select_block" onchange="get_villages(this)">
                            <option value="0">Select District First</option>
                            
                        </select>

                        <label class="search-font-size bolder">
                            गाव / Village
                        </label>
                        <select id="select_village">
                            <option value="0">Select Block First</option>
                            
                        </select>

                    </span>
                    
                    <a class="btn btn-block-full btn-xl fx shape" style="background-color:#ffcc80" data-animate="fadeInUp" id="btnSearchviaCat" onclick="btn_getsearchresult('cat')" ><span class="bolder">Search via Category</span>  <span class="fa fa-long-arrow-right"></span></a>
                    <a class="btn btn-block-full btn-xl fx shape" style="background-color:#ffcc80" data-animate="fadeInUp" id="btnSearchviaPlace" onclick="btn_getsearchresult('vill')" ><span class="bolder">Search via Place </span>  <span class="fa fa-long-arrow-right"></span></a>
                </div>
                
            </div>
        </div>
        <!-- Category wise Search Ends -->
        <div class="clearfix"></div>
        
        <div class="row" id="div_searchresults">

            <div class="section">
                <div class="container">
                    
                    <div class="heading main-heading centered">
                        <h3>खोज के परिणाम</h3>
                        <h4 class="sub-title">Search <span class="main-color">Results</span></h4>
                        <div class="heading-separator"><span class="main-bg"></span><span class="dark-bg"></span></div>
                    </div>
                    
                    

                    <div class="row">							
                        <div class="blog-posts">
                            <!--
                            <div class="post-item col-md-4">
                                <div class="post-image">
                                    <a >
                                        <img src="assets/images/blog/large/1.jpg" alt="Our Blog post image goes here">
                                    </a>
                                </div>
                                <article class="post-content main-border">
                                    <div class="post-info-container">
                                        <div class="post-info">
                                            
                                            <h2 style="font-size: 24px;"><a >उर्वरा किट (पल्स/धान्य वृद्धी किट)</a></h2>
                                            
                                        </div>
                                    </div>
                                    <p style="font-size: 20px;"><b>Pulse kit is a collection of products that add value in crops growth and fruiting stage. Kit contains products that help in vigourous germination & growth, control larva, soil fungal infections and stress management as well as decomposer culture for soil health.</b></p>
                                    <div class="bottom_tools">
                                        
                                        <a class="f-right more_btn shape" style="width:100%;text-align: center;font-size: 18px;" id="myBtn"><b>अधिक जानकारी पूछें <br/> क्लिक करें </b></a>
                                    </div>
                                </article>
                            </div>
                            -->
                            <div id="shoplist">

                            </div>
                            
                            <!--   
                            <div class="post-item col-md-4">
                                <div class="post-image">
                                    <a href="blog-single.html"><img src="assets/images/blog/large/Grow-one.png" alt=""></a>
                                </div>
                                <article class="post-content main-border">
                                    <div class="post-info-container">
                                        <div class="post-info">
                                            <i class="fa fa-camera post-icon"></i>
                                            <h2 style="font-size: 24px;"><a href="https://urorganix.com/product/grow-one/" target="_blank">बीज प्रक्रिया के लिए ग्रो वन</a></h2>
                                            
                                        </div>
                                    </div>
                                    <p style="min-height: 278px;font-size: 20px;"><b>Growone is 100% organic product that helps break dormancy and quick germination as compared to non treated seeds. It helps provide vigorous growth to young saplings.</b></p>
                                    <div class="bottom_tools">
                                        
                                        <a class="f-right more_btn shape" style="width:100%;text-align: center;font-size: 18px;" id="myBtn3"><b>अधिक जानकारी पूछें<br/> क्लिक करें </b></a>
                                    </div>
                                </article>
                            </div>
                            -->
                        </div>
                    </div>
                    <div id="page_numbering">

                    </div>
                    <div class="clearfix"></div>
                    
                                        
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
jQuery(document).ready(function($){
    get_categories();
    get_states();

})

function get_categories(){
    var id = 1;//$(this).val();

    $.ajax({
        type: "GET",
        url: "./ajax/_return_categories.php",
        data: "pass_id="+id,
        success: function( data ) {
            //console.log(id);
            //console.log(data);
            $('#select_category').children().remove().end()

            var category_element = document.getElementById('select_category');
            var updated_options = JSON.parse(data);
            
            category_element.options.add( new Option('Select Category', '0') );

            for(var i = 0, l = updated_options.length; i < l; i++){
                var option = updated_options[i];
                var display_text = option.loc_category_name+' ('+option.category_name+')';
                category_element.options.add( new Option(display_text, option.id) );
            }
        }
        
        
    });
}

function get_states(){
    var id = 1;//$(this).val();

    $.ajax({
        type: "GET",
        url: "./ajax/_return_states.php",
        data: "pass_id="+id,
        success: function( data ) {
            //console.log(id);
            //console.log(data);
            $('#select_state').children().remove().end()

            var state_element = document.getElementById('select_state');
            var updated_options = JSON.parse(data);
            
            state_element.options.add( new Option('Select State', '0') );

            for(var i = 0, l = updated_options.length; i < l; i++){
                var option = updated_options[i];
                var display_text = option.loc_state_name+' ('+option.state_name+')';
                state_element.options.add( new Option(display_text, option.id) );
            }
        }
        
        
    });
    
}

function get_districts(dist){
    var id = dist.value;

    $.ajax({
        type: "GET",
        url: "./ajax/_return_districts.php",
        data: "pass_id="+id,
        success: function( data ) {
            //console.log(id);
            console.log(data);
            $('#select_district').children().remove().end()

            var district_element = document.getElementById('select_district');
            var updated_options = JSON.parse(data);
            
            district_element.options.add( new Option('Select District', '0') );

            for(var i = 0, l = updated_options.length; i < l; i++){
                var option = updated_options[i];
                var display_text = option.loc_district_name+' ('+option.district_name+')';
                district_element.options.add( new Option(display_text, option.id) );
            }
        }
        
        
    });
}

function get_blocks(blk){
    var id = blk.value;

    $.ajax({
        type: "GET",
        url: "./ajax/_return_blocks.php",
        data: "pass_id="+id,
        success: function( data ) {
            //console.log(id);
            console.log(data);
            $('#select_block').children().remove().end()

            var block_element = document.getElementById('select_block');
            var updated_options = JSON.parse(data);
            
            block_element.options.add( new Option('Select Block', '0') );

            for(var i = 0, l = updated_options.length; i < l; i++){
                var option = updated_options[i];
                var display_text = option.loc_block_name+' ('+option.block_name+')';
                block_element.options.add( new Option(display_text, option.id) );
            }
        }
        
        
    });
}

function get_villages(vill){
    var id = vill.value;

    $.ajax({
        type: "GET",
        url: "./ajax/_return_village.php",
        data: "pass_id="+id,
        success: function( data ) {
            //console.log(id);
            console.log(data);
            $('#select_village').children().remove().end()

            var village_element = document.getElementById('select_village');
            var updated_options = JSON.parse(data);
            
            village_element.options.add( new Option('Select Village', '0') );

            for(var i = 0, l = updated_options[0].length; i < l; i++){
                var option = updated_options[0][i];
                var display_text = option.loc_village_name+' ('+option.village_name+')';
                village_element.options.add( new Option(display_text, option.id) );
            }
        }
        
        
    });
}



function btn_getsearchresult(type){
    console.log('Search Btn Clicked');
    var cat_sel = $("#select_category").val();
    //var prod_sel = $("#sure_product_dd").val();
    var dist_sel = $("#select_district").val();
    var blk_sel = $("#select_block").val();
    var vill_sel = $("#select_village").val();
    //var shop_searched = $("#search_by_shop_text").val();
    console.log(vill_sel);
    console.log(type);
    var ret_file = '';
    var ret_data = '';

    if(type == 'cat'){
        console.log('Category Search');
        ret_file = "./ajax/_return_shoplist_by_cat.php";
        ret_data = "pass_id="+cat_sel+"&dist="+dist_sel+"&blk="+blk_sel+"&vill="+vill_sel+"&page=1";
    }else if(type == 'vill'){
        console.log('Village Search');
        ret_file = "./ajax/_return_shoplist_by_vill.php";
        ret_data = "pass_id="+cat_sel+"&dist="+dist_sel+"&blk="+blk_sel+"&vill="+vill_sel+"&page=1";
    }

    $.ajax({
        type: "GET",
        url: ret_file,
        data: ret_data,
        success: function( data ) {
            //console.log(id);
            console.log(data);
            //Villages
            $('#shoplist').children().remove().end()
            $('#page_numbering').children().remove().end()
            var village_element = document.getElementById('shoplist');
            var page_element = document.getElementById('page_numbering');
            var updated_options = JSON.parse(data);
            console.log(updated_options.length);
            //village_element.options.add( new Option('गाव निवडा / Select Village', '0') );

            for(var i = 0, l = updated_options.length; i < l; i++){
                
                var shopname = updated_options[i].dukaan_name;
                shopname = shopname.trim();
                shopname = shopname.toLowerCase();
                shopname = shopname.replace(" ", "-");
                //var display_text = '<div class="container" style="border:groove;"><div class="row "><div class="col text-right"><h4>दुकान: </h4></div><div class="col text-left"><a href="https://www.gaavkhoj.com/village-to-village/oil_shop.php"><h3>सिद्धि लकड़ी घाना आयल</h3></a></div></div><div class="row"><div class="col text-right"><h4>गाव: </h4></div><div class="col text-left"><h4>औसा</h4></div></div><div class="row"><div class="col text-right"><h4>ब्लॉक: </h4></div><div class="col text-left"><h4>लातूर</h4></div></div></div><br>'
                //village_element.innerHTML = display_text;
                village_element.innerHTML += '<div class="post-item col-md-4"><div class="post-image"><a href="https://www.deshkhoj.com/shops/near-me/'+updated_options[i].id+'/'+shopname+'" target="_blank"><img src="assets/images/blog/large/1.jpg" alt="Our Blog post image goes here"></a></div><article class="post-content main-border"><div class="post-info-container"><div class="post-info"><h2 style="font-size: 24px;min-height: 80px;"><a href="https://www.deshkhoj.com/shops/near-me/'+updated_options[i].id+'/'+shopname+'" target="_blank">'+updated_options[i].dukaan_name+'</a></h2></div></div><p style="font-size: 20px;min-height: 150px;"><b>गाव: '+updated_options[i].village_name+'<br>ब्लॉक: '+updated_options[i].block_name+'</b></p><div class="bottom_tools"><a href="https://www.deshkhoj.com/shops/near-me/'+updated_options[i].id+'/'+shopname+'" target="_blank" class="f-right more_btn shape" style="width:100%;text-align: center;font-size: 18px;" id="myBtn"><b>अधिक जानकारी पूछें <br/> क्लिक करें </b></a></div></article></div></div>';
            }

            if(updated_options.length < 12){
                page_element.innerHTML += '<div class="row"><div class="post-item col-md-4"></div><div class="post-item col-md-4" style="text-align:center"><h3>Page 1</h3></div><div class="post-item col-md-4"></div></div>'
            }else{
                page_element.innerHTML += '<div class="row"><div class="post-item col-md-4"></div><div class="post-item col-md-4" style="text-align:center"><h3>Page 1</h3></div><div class="post-item col-md-4"><a class="btn btn-block-full btn-xl fx shape new-angle animated fadeInUp" style="background-color:#ffcc80" data-animate="fadeInUp" href="" target="_blank"><span class="bolder">Next</span>  <span class="fa fa-long-arrow-right"></span></a></div></div>'
            }
            
            
        }
        
        
    });

}
</script>