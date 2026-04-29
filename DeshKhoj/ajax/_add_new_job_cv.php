<?php
require_once('./../config/config.php');

$name_val               = (!empty($_POST['name_val']) ? $_POST['name_val'] : '');
$jobCV              = (!empty($_POST['jobCV']) ? $_POST['jobCV'] : '');
$reg_whatsapp_val       = (!empty($_POST['reg_whatsapp_val']) ? $_POST['reg_whatsapp_val'] : '');
$reg_email_val          = (!empty($_POST['reg_email_val']) ? $_POST['reg_email_val'] : '');


$cv_name = 'dummy.jpg';
$target_dir = "./assets/images/job_cv/";
$target_file = $target_dir . basename($_POST['jobCV']);
//echo $shop_id." ".$prod_name." ".$prod_desc." ".$prod_amt;
$last_id = "";

$stmt = $conn->prepare("INSERT INTO `new_reg_job_cv`( `name`, `email`, `mobile`, `cv_upload`) VALUES (:name, :email, :mobile, :cv_upload);");
$stmt->bindValue(':name', $name_val);
$stmt->bindValue(':email', $reg_email_val);
$stmt->bindValue(':mobile', $reg_whatsapp_val);
$stmt->bindValue(':cv_upload', $cv_name);

if($stmt->execute()){
    
    //echo "Insert Query executed";
    $stmt2 = $conn->prepare("SELECT LAST_INSERT_ID() as last_id;");

    if($stmt2->execute()){
        $row = $stmt2->fetch(PDO::FETCH_ASSOC);
        $shop_id = $row["last_id"];
        

        //echo "Updated";
        echo $shop_id;

    }



}
