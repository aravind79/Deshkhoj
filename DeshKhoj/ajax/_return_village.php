<?php 
require_once('./../config/config.php'); 


$get_id=   (!empty($_GET['pass_id'])) ? $_GET['pass_id'] : '';

$stmt = $conn->prepare("SELECT `id`,`village_name`,`loc_village_name` FROM `villages` WHERE `block_id` = :id ORDER BY 2");
	$stmt->bindValue(':id', $get_id);
    $stmt->execute();
   
	$villages_list = array();
while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
	$cur_loop = array(
		'id'       => $row['id'],
		'village_name'       => $row['village_name'],
		'loc_village_name'     => $row['loc_village_name']);

	$villages_list[] = $cur_loop;
}

//City Starts

$stmt_2 = $conn->prepare("SELECT `id`,`village_name`,`loc_village_name` FROM `villages` WHERE `block_id` = :id AND type = 'C' ORDER BY 2");
	$stmt_2->bindValue(':id', $get_id);
    $stmt_2->execute();
   
	$cities_list = array();
while($row = $stmt_2->fetch(PDO::FETCH_ASSOC)) {
	$cur_loop = array(
		'id'       => $row['id'],
		'city_name'       => $row['village_name'],
		'loc_city_name'     => $row['loc_village_name']);

	$cities_list[] = $cur_loop;
}

//City Ends
$fetched_villages_list = '
	[
		[
			';

	$rowCount = 0;
foreach($villages_list as $v){

		$fetched_villages_list .= '{ "id": "' . $v['id'] . '", "village_name": "' . $v['village_name'] . '", "loc_village_name": "' . $v['loc_village_name'] . '" },';
		}
		$fetched_villages_list .= '{ "id": "-1", "village_name": "Other", "loc_village_name": "अन्य" },';

		$fetched_villages_list = substr($fetched_villages_list, 0, -1);
$fetched_villages_list .= '
	],
	[
		';

		//City
	
		$rowCount = 0;
	foreach($cities_list as $v){
	
			$fetched_villages_list .= '{ "id": "' . $v['id'] . '", "city_name": "' . $v['city_name'] . '", "loc_city_name": "' . $v['loc_city_name'] . '" },';
			}
			$fetched_villages_list .= '{ "id": "-1", "city_name": "Other", "loc_city_name": "अन्य" },';
	
			$fetched_villages_list = substr($fetched_villages_list, 0, -1);
	$fetched_villages_list .= '
			]
			]
			';


	echo $fetched_villages_list;


?>