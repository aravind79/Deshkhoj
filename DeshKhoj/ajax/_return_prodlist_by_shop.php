<?php
require_once(__DIR__ . './../config/config.php');

// query is the default name of the request parameter that contains the query.
//$mobile_input = (!empty($_GET['query'])) ? $_GET['query'] : '';
$get_id=   (!empty($_GET['pass_id'])) ? $_GET['pass_id'] : '';

$page=   (!empty($_GET['page'])) ? $_GET['page'] : '';

$start = ((int)$page - 1) * 5;

$qry = "SELECT a.`id`,`prod_name`,`prod_desc`,`prod_amt`,`shop_id`,`cat_id`, b.id as photo_id, b.photo_name, `quantity` as prod_qty, `unit` as prod_unit, c.name as unit_name FROM `dukaan_products` a 
LEFT JOIN dukaan_photos b ON a.id = b.prod_id 
LEFT JOIN `measure_unit` c ON a.unit = c.id
WHERE `shop_id` = '".$get_id."' AND a.is_del != '1' ORDER BY 1"; 

$qry .= " LIMIT ".$start.", 5";

$stmt = $conn->prepare($qry);
$stmt->execute();
$prod_list_5 = array();
while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
	$cur_loop = array(
	
		'id'       => $row['id'],
		'prod_name'     => $row['prod_name'],
		'prod_desc'     => $row['prod_desc'],
		'prod_amt'     => $row['prod_amt'],
		'photo_id'     => $row['photo_id'],
		'photo_name'     => $row['photo_name'],
		'cat_id'     => $row['cat_id'],
		'prod_qty'     => $row['prod_qty'],
		'prod_unit'     => $row['prod_unit'],
		'unit_name'     => $row['unit_name']
	);

	$prod_list_5[] = $cur_loop;
	//echo $cur_loop['dukaan_name'].'</br>';
}
$fetched_prod_list_5 = '
		[
			';

	$rowCount = 0;
foreach($prod_list_5 as $v){

		$fetched_prod_list_5 .= '{ "id": "' . $v['id'] . '", "prod_name": "' . $v['prod_name'] . '", "prod_desc": "' . $v['prod_desc'] . '", "prod_amt": "' . $v['prod_amt'] . '", "photo_id": "' . $v['photo_id'] . '", "photo_name": "' . $v['photo_name'] . '", "cat_id": "' . $v['cat_id'] . '", "prod_qty": "' . $v['prod_qty'] . '", "prod_unit": "' . $v['prod_unit'] . '", "unit_name": "' . $v['unit_name'] . '" },';
		}

		$fetched_prod_list_5 = substr($fetched_prod_list_5, 0, -1);
$fetched_prod_list_5 .= '
		]
		';
	echo $fetched_prod_list_5;
    
?>