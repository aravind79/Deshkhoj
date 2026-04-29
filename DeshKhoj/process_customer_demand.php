<?php
//include_once('inc/config.php');

//$sure_product              = (!empty($_POST['sure_product']             )) ? $_POST['sure_product']              : '';
//$quantity              = (!empty($_POST['quantity']             )) ? $_POST['quantity']              : 0;
print_r($_POST['villager_mobile']);

$villager_mobile              = (!empty($_POST['villager_mobile']             )) ? $_POST['villager_mobile']              : '';
$villager_village              = (!empty($_POST['villager_village']             )) ? $_POST['villager_village']              : '';
$villager_taluka              = (!empty($_POST['villager_taluka']             )) ? $_POST['villager_taluka']              : '';
$description              = (!empty($_POST['description']             )) ? $_POST['description']              : '';
//$lat              = (!empty($_POST['lat']             )) ? $_POST['lat']              : '';
//$lon              = (!empty($_POST['lon']             )) ? $_POST['lon']              : '';


//$sure_product              = is_string($sure_product)              ? trim($sure_product)              : $sure_product;
//$quantity              = is_string($quantity)              ? trim($quantity)              : $quantity;

$villager_mobile              = is_string($villager_mobile)              ? trim($villager_mobile)              : $villager_mobile;
//$product_name = '';
//$lat = is_string($lat)              ? trim($lat)              : $lat;
//$lon = is_string($lon)              ? trim($lon)              : $lon;
$villager_village = is_string($villager_village)              ? trim($villager_village)              : $villager_village;
$villager_taluka = is_string($villager_taluka)              ? trim($villager_taluka)              : $villager_taluka;
$description = is_string($description)              ? trim($description)              : $description;

//session_start();
//$state = $_SESSION["state"]; 


//print_r($quantity);

//print_r($sure_product);
//print_r($quantity);
//print_r($crp_id);
print_r($villager_mobile);
print_r($villager_village);
print_r($villager_taluka);
print_r($description);
print("End");
//print_r($state);
//die();

//print_r($lat);
//print_r($lon);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'phpmailer/phpmailer/src/Exception.php';
require 'phpmailer/phpmailer/src/PHPMailer.php';
require 'phpmailer/phpmailer/src/SMTP.php';

require 'vendor/autoload.php';
require_once 'vendor/swiftmailer/swiftmailer/lib/swift_required.php';
$curr_date = date("d-m-Y");


/*
$query = "SELECT `name` FROM `sure_products` WHERE `id` = :product_id";
$stmt = $conn->prepare($query);
$stmt->bindValue(':product_id'              , $sure_product);
if($stmt->execute()){
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $product_name = $row['name'];
}
print_r($product_name);

//die();
$query = "INSERT INTO `sure_demand_list`(`product_id`, `quantity`, `mobile_no`, `village`, `taluka`,`state`, `lat`, `lon`) VALUES (:product_id, :quantity, :mobile_no, :village, :taluka, :state, :lat, :lon);";

$stmt = $conn->prepare($query);

$stmt->bindValue(':product_id'              , $sure_product);
$stmt->bindValue(':quantity'              , $quantity);
$stmt->bindValue(':mobile_no'          , $villager_mobile);
$stmt->bindValue(':village'          , $villager_village);
$stmt->bindValue(':taluka'          , $villager_taluka);
$stmt->bindValue(':state'          , $state);
$stmt->bindValue(':lat'          , $lat);
$stmt->bindValue(':lon'          , $lon);
//$stmt->execute();

if($stmt->execute()){
    $last_id = $conn->lastInsertId();
    //session_start();
    $_SESSION['last_id'] = $last_id;
    $last_d_id = $state.$last_id;
*/

    $bodytext ="<br>Sendor's (CRP's) Phone number: ".$villager_mobile."<br>Village.: ".$villager_village."<br>Taluka.: ".$villager_taluka."<br>Description.: ".$description."<br>";

    $bodytext .= '<html><body><table border="1" cellspacing="5" cellpadding="5" width="0" style="width:0in;border-collapse:collapse"><tr style="background:yellow"><th>Date</th><th>Village</th><th>Taluka</th><th>Description</th><th>Villager Mobile number</th></tr>';
    $bodytext .='<tr style="background:lightgreen"><td>'.$curr_date.'</td><td>'.$villager_village.'</td><td>'.$villager_taluka.'</td><td>'.$description.'</td><td>'.$villager_mobile.'</td></tr>';
    $bodytext .= '</table></body></html><br>';

    $email = new PHPMailer();
    $email->IsSMTP();                                      // Set mailer to use SMTP
    $email->Host = 'smtp.gmail.com';                 // Specify main and backup server
    $email->Port = 587;                                    // Set the SMTP port
    $email->SMTPAuth = true;                               // Enable SMTP authentication
    $email->Username = 'gaavkhoj.com@gmail.com';                // SMTP username
    $email->Password = 'Gaavkhoj123$';                  // SMTP password                            // Enable encryption, 'ssl' also accepted
    $email->SetFrom('gaavkhoj.com@gmail.com', "Villager's Demand (Urvara Product)");
    $email->Subject   = "Villager's Demand (SURE Product)";
    $email->isHTML(true);
    $email->Body      = $bodytext;
    $email->AddBCC( 'anshulsharma633@gmail.com' );
    //$email->Send();
    //$email->SMTPDebug = 1;
    if(!$email->Send()) 
    {
        echo 'Message could not be sent.';
    }else{
        header("Location: ./index.php"); 
    }
    
/*    
}else{
    header("Location: ./tpl_error.php"); 
}
*/



