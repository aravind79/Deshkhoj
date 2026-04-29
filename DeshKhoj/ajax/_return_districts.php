<?php 
require_once('./../config/config.php'); 


$get_id=   (!empty($_GET['pass_id'])) ? $_GET['pass_id'] : '';

 
 if( $get_id == 1){
	// Maharastra Showing limited districts
	$stmt = $conn->prepare("SELECT `id`, `district_name`,`loc_district_name` FROM `districts` WHERE `state_id` = :id AND id IN (1,2,3,4,5,8,10,12,37) ORDER BY 2");

 }else{
	$stmt = $conn->prepare("SELECT `id`, `district_name`,`loc_district_name` FROM `districts` WHERE `state_id` = :id ORDER BY 2");

 }
	$stmt->bindValue(':id', $get_id);
    $stmt->execute();
   
	$blocks_list = array();
while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
	$cur_loop = array(
		'id'       => $row['id'],
		'district_name'       => $row['district_name'],
		'loc_district_name'     => $row['loc_district_name']);

	$blocks_list[] = $cur_loop;
}
$fetched_districts_list = '
		[
			';

	$rowCount = 0;
foreach($blocks_list as $v){

		$fetched_districts_list .= '{ "id": "' . $v['id'] . '", "district_name": "' . $v['district_name'] . '", "loc_district_name": "' . $v['loc_district_name'] . '" },';
		}
		$fetched_districts_list .= '{ "id": "-1", "district_name": "Other", "loc_district_name": "अन्य" },';


		$fetched_districts_list = substr($fetched_districts_list, 0, -1);
$fetched_districts_list .= '
		]
		';

	echo $fetched_districts_list;



?>