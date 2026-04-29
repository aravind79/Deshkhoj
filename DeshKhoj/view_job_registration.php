<?php
require_once('./config/config.php');

$stmt2 = $conn->prepare("SELECT `id`, `date`, `name`, `email`, `mobile`, `cv_upload` FROM `new_reg_job_cv`");
$stmt2->execute();

$reg_list = array();
while($row = $stmt2->fetch(PDO::FETCH_ASSOC)) {
    $cur_loop = array(
        'id'       => $row['id'],
        'date'     => $row['date'],
        'name'     => $row['name'],
        'email'     => $row['email'],
        'mobile'     => $row['mobile'],
        'cv_upload'     => $row['cv_upload']);

    $reg_list[] = $cur_loop;
}

include_once("./templates/tpl_view_job_registration.php");
?>


