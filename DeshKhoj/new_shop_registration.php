<?php

require_once('./config/config.php');

$stmt2 = $conn->prepare("SELECT `id`, `state_name`, `loc_state_name`, `state_abbr`, `slug` FROM `states` ");
$stmt2->execute();

$state_list = array();
while($row = $stmt2->fetch(PDO::FETCH_ASSOC)) {
    $cur_loop = array(
        'id'       => $row['id'],
        'state_name'     => $row['state_name'],
        'loc_state_name'     => $row['loc_state_name'],
        'state_abbr'     => $row['state_abbr'],
        'slug'     => $row['slug']);

    $state_list[] = $cur_loop;
}

$query = "SELECT `id`,`category_name`, `loc_category_name`, ordering, `is_sure` FROM product_category WHERE id NOT IN (135,42,43,40,37,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,38,118,119,120,121) ORDER BY id != 95 DESC, id != 135 , `category_name`";
$stmt = $conn->prepare($query);
$stmt->execute();

$category_list = array();
while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
	$cur_loop = array(
		'id'       => $row['id'],
		'category_name'     => $row['category_name'],
		'loc_category_name'     => $row['loc_category_name'],
		'is_sure'     => $row['is_sure']);

	$category_list[] = $cur_loop;
}

include_once("./templates/tpl_new_shop_registration.php");

?>

