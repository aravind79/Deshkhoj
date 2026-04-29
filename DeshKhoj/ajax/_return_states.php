<?php 
require_once('./../config/config.php'); 


$get_id=   (!empty($_GET['pass_id'])) ? $_GET['pass_id'] : '';

$stmt = $conn->prepare("SELECT `id`, `state_name`,`loc_state_name` FROM `states` WHERE `country_id` = :id ORDER BY 2");
	$stmt->bindValue(':id', $get_id);
    $stmt->execute();
   
	$blocks_list = array();
while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
	$cur_loop = array(
		'id'       => $row['id'],
		'state_name'       => $row['state_name'],
		'loc_state_name'     => $row['loc_state_name']);

	$blocks_list[] = $cur_loop;
}
$fetched_districts_list = '
		[
			';

	$rowCount = 0;
foreach($blocks_list as $v){

		$fetched_districts_list .= '{ "id": "' . $v['id'] . '", "state_name": "' . $v['state_name'] . '", "loc_state_name": "' . $v['loc_state_name'] . '" },';
		}
		$fetched_districts_list .= '{ "id": "-1", "state_name": "Other", "loc_state_name": "अन्य" },';

		$fetched_districts_list = substr($fetched_districts_list, 0, -1);
$fetched_districts_list .= '
		]
		';

	echo $fetched_districts_list;

?>