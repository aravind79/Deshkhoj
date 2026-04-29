<?php error_reporting(0); ?> 
<html>

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>DeshKhoj - View Shop Registration</title>
		<meta name="description" content="DeshKhoj ki Soch, Bharat ki Khoj. Search Result Page. Register Your Shop Here.">
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
        <div class="pageWrapper">
			
			<?php
				include("./templates/header.php");
            ?>
             <table>   
                <th>
                    
                    <td>
                        <h3>date</h3>
                    </td>
                    <td>
                        <h3>name</h3>
                    </td>
                    <td>
                        <h3>name_of_business</h3>
                    </td>
                    <td>
                        <h3>photo_name</h3>
                    </td>
                    <td>
                        <h3>state_name</h3>
                    </td>
                    <td>
                        <h3>district_name</h3>
                    </td>
                    <td>
                        <h3>block_name</h3>
                    </td>
                    <td>
                        <h3>village_name</h3>
                    </td>
                    <td>
                        <h3>pincode</h3>
                    </td>
                    <td>
                        <h3>email</h3>
                    </td>
                    <td>
                        <h3>business_desc</h3>
                    </td>
                    <td>
                        <h3>cat_1_name</h3>
                    </td>
                    <td>
                        <h3>cat_2_name</h3>
                    </td>
                    <td>
                        <h3>cat_3_name</h3>
                    </td>
                    <td>
                        <h3>Prod</h3>
                    </td>
                </th>
            <?php
                foreach($reg_list as $r){
                    
                    //Prod List Generation  
                    $stmt3 = $conn->prepare("SELECT `id`, `prod_name`, `prod_desc`, `prod_amt`, `prod_photo` FROM `new_reg_prod_list` WHERE `shop_reg_id` = :shop_id");
                    $stmt3->bindValue(':shop_id', $r["id"]);
                    $stmt3->execute();

                    $prod_list = array();
                    while($row = $stmt3->fetch(PDO::FETCH_ASSOC)) {
                        $cur_loop2 = array(
                            'id'       => $row['id'],
                            'prod_name'     => $row['prod_name'],
                            'prod_desc'     => $row['prod_desc'],
                            'prod_amt'     => $row['prod_amt'],
                            'prod_photo'     => $row['prod_photo']);

                        $prod_list[] = $cur_loop2;
                    }
                    
			?> 
                <tr>
                    <td>
                        <h3><?= $r["id"]; ?></h3>
                    </td>
                    <td>
                        <h3><?= $r["date"]; ?></h3>
                    </td>
                    <td>
                        <h3><?= $r["name"]; ?></h3>
                    </td>
                    <td>
                        <h3><?= $r["name_of_business"]; ?></h3>
                    </td>
                    <td>
                        <h3><?= $r["photo_name"]; ?></h3>
                    </td>
                    <td>
                        <h3><?= $r["state_name"]; ?></h3>
                    </td>
                    <td>
                        <h3><?= $r["district_name"]; ?></h3>
                    </td>
                    <td>
                        <h3><?= $r["block_name"]; ?></h3>
                    </td>
                    <td>
                        <h3><?= $r["village_name"]; ?></h3>
                    </td>
                    <td>
                        <h3><?= $r["pincode"]; ?></h3>
                    </td>
                    <td>
                        <h3><?= $r["email"]; ?></h3>
                    </td>
                    <td>
                        <h3><?= $r["business_desc"]; ?></h3>
                    </td>
                    <td>
                        <h3><?= $r["cat_1_name"]; ?></h3>
                    </td>
                    <td>
                        <h3><?= $r["cat_2_name"]; ?></h3>
                    </td>
                    <td>
                        <h3><?= $r["cat_3_name"]; ?></h3>
                    </td>
                    <td>
                    <table>
                    <?php
                        foreach($prod_list as $p){
                    ?>
                        <tr>
                            <td><h3><?= $p["id"]; ?></h3></td>
                            <td><h3><?= $p["prod_name"]; ?></h3></td>
                            <td><h3><?= $p["prod_desc"]; ?></h3></td>
                            <td><h3><?= $p["prod_amt"]; ?></h3></td>
                            <td><h3><?= $p["prod_photo"]; ?></h3></td>
                        </tr>
                    <?php
                        }
                    ?>
                    </table>
                    </td>
                </tr>
            <?php
                }
            ?>
            </table>
            <?php
				include("./templates/footer.php");
			?>

            <div id="ac-wrapper">
                <div id="popup">
                    <center>
                        <h2 id="pass_head">Enter Your Password</h2>
                        <input type="text" placeholder="Password" id="popup_pass">
                        <input type="button" name="submit" value="Submit" onClick="PopUp()" />
                    </center>
                </div>
            </div>
    </body>
    <style>
        #ac-wrapper {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255,255,255,1);
            z-index: 1001;
        }

        #popup {
            width: 555px;
            height: 375px;
            background: #FFFFFF;
            border: 5px solid #000;
            border-radius: 25px;
            -moz-border-radius: 25px;
            -webkit-border-radius: 25px;
            box-shadow: #64686e 0px 0px 3px 3px;
            -moz-box-shadow: #64686e 0px 0px 3px 3px;
            -webkit-box-shadow: #64686e 0px 0px 3px 3px;
            position: absolute;
            /*top: 150px; left: 375px;*/
        }
    </style>
    <script>
	var k = "741852963";
        $(document).ready(function(){
            window.scrollTo(0, 0);
        });
        function PopUp(){
            if(document.getElementById('popup_pass').value == k){
                document.getElementById('ac-wrapper').style.display="none";
            }else{
                document.getElementById('pass_head').style.color="red";
                document.getElementById('ac-wrapper').style.display="block"
            }
             
        }
    </script>

</html>
