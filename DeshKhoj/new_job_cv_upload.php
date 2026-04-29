<?php
require_once('./config/config.php');

print_r("File");
/* Get the name of the uploaded file */
$filename = $_FILES['file']['tmp_name'];
$id = (!empty($_POST['id'])) ? $_POST['id'] : '';
$cat = (!empty($_POST['cat'])) ? $_POST['cat'] : '';
//$cat = (!empty($_POST['cat'])) ? $_POST['cat'] : '';

print_r("Files: ");
print_r($_FILES);
print_r($_POST);

$target_dir = "./assets/images/job_cv/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);

/* Choose where to save the uploaded file */


$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$img_name = $cat.'_'.$id.'.'.$imageFileType;
$location = $target_dir.$img_name;
print_r($uploadOk);
print_r($img_name);
//$check = getimagesize($filename);
/*
if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;

} else {
    echo "File is not an image.";
    $uploadOk = 0;
}
*/
print_r("Check: ".$uploadOk);
/*
if ($_FILES["file"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
print_r("File Size: ".$uploadOk);
*/
if($imageFileType != "pdf" ) {
    echo "Sorry, only PDF files are allowed.";
    $uploadOk = 0;
}
print_r("File Type: ".$uploadOk);

/* Save the uploaded file to the local filesystem */
print_r($filename, $location);
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
  } else {
    if ( move_uploaded_file($filename, $location) ) { 
        $stmt = $conn->prepare("UPDATE `new_reg_job_cv` SET `cv_upload`=:cv_upload WHERE `id` = :id");
        $stmt->bindValue(':id', $id);
        $stmt->bindValue(':cv_upload', $img_name);
        
        if($stmt->execute()){
            echo 'Success Shop Photo Upload';
        }
         
    } else { 
        echo 'Failure'; 
    }
}

?>
