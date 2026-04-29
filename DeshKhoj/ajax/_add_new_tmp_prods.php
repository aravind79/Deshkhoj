<?php
require_once('./../config/config.php');

$prodName = (!empty($_POST['prodName'])) ? $_POST['prodName'] : '';
$prodPeices = (!empty($_POST['prodPeices'])) ? $_POST['prodPeices'] : '';
$prodUnit = (!empty($_POST['prodUnit'])) ? $_POST['prodUnit'] : '';
$prodPhoto = (!empty($_POST['prodPhoto'])) ? $_POST['prodPhoto'] : '';
$shopId = (!empty($_POST['shopId'])) ? $_POST['shopId'] : '';

$photo_name = 'dummy.jpg';
$target_dir = "./assets/images/new_reg/";

if(isset($_FILES['file'])){
    $filename = $_FILES['file']['tmp_name'];
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    $uploadOk = 1;
}else{
    $filename = "";
    $target_file = "";
    $uploadOk = 0;
};

$stmt = $conn->prepare("INSERT INTO `new_reg_prod_list`(`prod_name`, `prod_desc`, `prod_amt`, `prod_photo`, `shop_reg_id`) VALUES (:prodName, :prodPeices, :prodUnit, :photo_name, :shopId);");
$stmt->bindValue(':prodName', $prodName);
$stmt->bindValue(':prodPeices', $prodPeices);
$stmt->bindValue(':prodUnit', $prodUnit);
$stmt->bindValue(':photo_name', $photo_name);
$stmt->bindValue(':shopId', $shopId);

if($stmt->execute()){
    
    //echo "Insert Query executed";
    $stmt2 = $conn->prepare("SELECT LAST_INSERT_ID() as last_id;");

    if($stmt2->execute()){
        $row = $stmt2->fetch(PDO::FETCH_ASSOC);
        
        $prod_id = $row["last_id"];

        echo $prod_id;

    }

}










