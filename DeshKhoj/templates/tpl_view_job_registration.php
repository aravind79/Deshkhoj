<?php error_reporting(0); ?> 
<html>

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>DeshKhoj - View Job Registration</title>
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
                        <h3>email</h3>
                    </td>
                    <td>
                        <h3>mobile</h3>
                    </td>
                    <td>
                        <h3>cv_upload</h3>
                    </td>
                    
                </th>
                <?php
                    foreach($reg_list as $r){
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
                        <h3><?= $r["email"]; ?></h3>
                    </td>
                    <td>
                        <h3><?= $r["mobile"]; ?></h3>
                    </td>
                    <td>
                        <h3><?= $r["cv_upload"]; ?></h3>
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
        $(document).ready(function(){
            window.scrollTo(0, 0);
        });
        function PopUp(){
            if(document.getElementById('popup_pass').value == "741852963"){
                document.getElementById('ac-wrapper').style.display="none";
            }else{
                document.getElementById('pass_head').style.color="red";
                document.getElementById('ac-wrapper').style.display="block"
            }
             
        }
    </script>

</html>
