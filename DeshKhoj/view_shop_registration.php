<?php
require_once('./config/config.php');

$stmt2 = $conn->prepare("SELECT a.`id`, `date`, `name`, `name_of_business`, a.`photo_name`, a.`state_id`,b.state_name, `dist_id`,c.district_name, `blk_id`, d.block_name, `vill_id`, e.village_name, `pincode`, `email`, `business_desc`, `cat_1`,f.category_name as cat_1_name, `cat_2`, g.category_name as cat_2_name, `cat_3`, h.category_name as cat_3_name 
FROM `new_reg_form_list` a
LEFT JOIN `states` b ON a.`state_id` = b.id
LEFT JOIN `districts` c ON a.dist_id = c.id
LEFT JOIN `blocks` d ON a.blk_id = d.id
LEFT JOIN `villages` e ON a.vill_id = e.id
LEFT JOIN `product_category` f ON a.cat_1 = f.id
LEFT JOIN `product_category` g ON a.cat_2 = g.id
LEFT JOIN `product_category` h ON a.cat_3 = h.id ORDER BY 1");
$stmt2->execute();

$reg_list = array();
while($row = $stmt2->fetch(PDO::FETCH_ASSOC)) {
    $cur_loop = array(
        'id'       => $row['id'],
        'date'     => $row['date'],
        'name'     => $row['name'],
        'name_of_business'     => $row['name_of_business'],
        'photo_name'     => $row['photo_name'],
        'state_id'     => $row['state_id'],
        'state_name'     => $row['state_name'],
        'dist_id'     => $row['dist_id'],
        'district_name'     => $row['district_name'],
        'blk_id'     => $row['blk_id'],
        'block_name'     => $row['block_name'],
        'vill_id'     => $row['vill_id'],
        'village_name'     => $row['village_name'],
        'pincode'     => $row['pincode'],
        'email'     => $row['email'],
        'business_desc'     => $row['business_desc'],
        'cat_1'     => $row['cat_1'],
        'cat_1_name'     => $row['cat_1_name'],
        'cat_2'     => $row['cat_2'],
        'cat_2_name'     => $row['cat_2_name'],
        'cat_3'     => $row['cat_3'],
        'cat_3_name'     => $row['cat_3_name']);

    $reg_list[] = $cur_loop;
}

include_once("./templates/tpl_view_shop_registration.php");
?>

