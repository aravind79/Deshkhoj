<?php
require_once('./config/config.php');

print_r("File");
/* Get the name of the uploaded file */
$filename = $_FILES['file']['tmp_name'];
$prodId = (!empty($_POST['prodId'])) ? $_POST['prodId'] : '';
$shop_id = (!empty($_POST['shop_id'])) ? $_POST['shop_id'] : '';
//$cat = (!empty($_POST['cat'])) ? $_POST['cat'] : '';
//$cat = (!empty($_POST['cat'])) ? $_POST['cat'] : '';

print_r("Files: ");
print_r($_FILES);
print_r($_POST);

$target_dir = "./assets/images/new_reg/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);

/* Choose where to save the uploaded file */


$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$img_name = 'Prod_'.$shop_id.'_'.$prodId.'.'.$imageFileType;
$location = $target_dir.$img_name;
print_r($uploadOk);
print_r($img_name);
$check = getimagesize($filename);
if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;

} else {
    echo "File is not an image.";
    $uploadOk = 0;
}
print_r("Check: ".$uploadOk);
/*
if ($_FILES["file"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
print_r("File Size: ".$uploadOk);
*/
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
print_r("File Type: ".$uploadOk);

/* Save the uploaded file to the local filesystem */

if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
  } else {
    if ( move_uploaded_file($filename, $location) ) { 
        $stmt = $conn->prepare("UPDATE `new_reg_prod_list` SET `prod_photo`=:prod_photo WHERE `id` = :id");
        $stmt->bindValue(':id', $prodId);
        $stmt->bindValue(':prod_photo', $img_name);
        
        if($stmt->execute()){
            echo 'Success Shop Photo Upload';
        }
         
    } else { 
        echo 'Failure'; 
    }
}

?>
