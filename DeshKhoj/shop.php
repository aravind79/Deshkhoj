<?php
require_once('./config/config.php');

$dukaan_id=   (!empty($_GET['id'])) ? $_GET['id'] : '';
$Shop_Title=   (!empty($_GET['Shop_Title'])) ? $_GET['Shop_Title'] : '';
 $url = "http://";   
 // Append the host(domain name, ip) to the URL.   
 $url.= $_SERVER['HTTP_HOST'];   
 
 // Append the requested resource location to the URL   
 $url.= $_SERVER['REQUEST_URI'];    
$shop = "Shop";
//print_r($shop);
//print_r($url);

if(is_numeric($dukaan_id)) {
	require_once 'getShopDetails.php';
}
else {
	throw new Exception('Place id must be numeric');
}


$query = "SELECT `id`,`category_name`, `loc_category_name` FROM product_category WHERE is_sure = '0' ORDER BY ordering";
$stmt = $conn->prepare($query);
$stmt->execute();

$category_list = array();
while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
	$cur_loop = array(
		'id'       => $row['id'],
		'category_name'     => $row['category_name'],
		'loc_category_name'     => $row['loc_category_name']);

	$category_list[] = $cur_loop;
}
$initial_category_list = '
		[
			';

foreach($category_list as $v){
	

	$initial_category_list .= '{ "id": "' . $v['id'] . '", "category_name": "' . $v['category_name'] . '", "loc_category_name": "' . $v['loc_category_name'] . '" },';
	}
	$initial_category_list = substr($initial_category_list, 0, -1);
$initial_category_list .= '
	]
	';
	

    

include_once("./templates/tpl_shop.php");
?>


