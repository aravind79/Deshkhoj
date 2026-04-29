<?php
require_once('./../config/config.php');


$name_val               = (!empty($_POST['name_val']) ? $_POST['name_val'] : '');
$nameBusiness_val       = (!empty($_POST['nameBusiness_val']) ? $_POST['nameBusiness_val'] : '');
$shopPhoto              = (!empty($_POST['shopPhoto']) ? $_POST['shopPhoto'] : '');
$select_state_val       = (!empty($_POST['select_state_val']) ? $_POST['select_state_val'] : '');
$select_district_val    = (!empty($_POST['select_district_val']) ? $_POST['select_district_val'] : '');
$select_blocks_val      = (!empty($_POST['select_blocks_val']) ? $_POST['select_blocks_val'] : '');
$select_village_val     = (!empty($_POST['select_village_val']) ? $_POST['select_village_val'] : '');
$reg_pincode_val        = (!empty($_POST['reg_pincode_val']) ? $_POST['reg_pincode_val'] : '');
$reg_whatsapp_val       = (!empty($_POST['reg_whatsapp_val']) ? $_POST['reg_whatsapp_val'] : '');
$reg_email_val          = (!empty($_POST['reg_email_val']) ? $_POST['reg_email_val'] : '');
$reg_shop_desc_val      = (!empty($_POST['reg_shop_desc_val']) ? $_POST['reg_shop_desc_val'] : '');
$reg_cat_1_val          = (!empty($_POST['reg_cat_1_val']) ? $_POST['reg_cat_1_val'] : '');
$reg_cat_2_val          = (!empty($_POST['reg_cat_2_val']) ? $_POST['reg_cat_2_val'] : '');
$reg_cat_3_val          = (!empty($_POST['reg_cat_3_val']) ? $_POST['reg_cat_3_val'] : '');
$prod_count             = (!empty($_POST['prod_count']) ? $_POST['prod_count'] : '');
$prod_name              = (!empty($_POST['prod_name']) ? $_POST['prod_name'] : '');
$prod_peices            = (!empty($_POST['prod_peices']) ? $_POST['prod_peices'] : '');
$rate                   = (!empty($_POST['rate']) ? $_POST['rate'] : '');
$prod_photo             = (!empty($_POST['prod_photo']) ? $_POST['prod_photo'] : '');


$photo_name = 'dummy.jpg';
$target_dir = "./assets/images/new_reg/";
$target_file = $target_dir . basename($_POST['shopPhoto']);
//echo $shop_id." ".$prod_name." ".$prod_desc." ".$prod_amt;
$last_id = "";

$stmt = $conn->prepare("INSERT INTO `new_reg_form_list`( `name`, `name_of_business`, `photo_name`, `state_id`, `dist_id`, `blk_id`, `vill_id`, `pincode`, `email`, `business_desc`, `cat_1`, `cat_2`, `cat_3`, `whatsapp`) VALUES (:name, :name_of_business, :photo_name, :state_id, :dist_id, :blk_id, :vill_id, :pincode, :email, :business_desc, :cat_1, :cat_2, :cat_3, :whatsapp);");
$stmt->bindValue(':name', $name_val);
$stmt->bindValue(':name_of_business', $nameBusiness_val);
$stmt->bindValue(':photo_name', $photo_name);
$stmt->bindValue(':state_id', $select_state_val);
$stmt->bindValue(':dist_id', $select_district_val);
$stmt->bindValue(':blk_id', $select_blocks_val);
$stmt->bindValue(':vill_id', $select_village_val);
$stmt->bindValue(':pincode', $reg_pincode_val);
$stmt->bindValue(':email', $reg_email_val);
$stmt->bindValue(':business_desc', $reg_shop_desc_val);
$stmt->bindValue(':cat_1', $reg_cat_1_val);
$stmt->bindValue(':cat_2', $reg_cat_2_val);
$stmt->bindValue(':cat_3', $reg_cat_3_val);
$stmt->bindValue(':whatsapp', $reg_whatsapp_val);

//echo $name;
//print_r($name_of_business);
//print_r($select_state_val);
//print_r($reg_pincode_val);
//print_r($reg_shop_desc_val);
//print_r($reg_cat_1_val);


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


