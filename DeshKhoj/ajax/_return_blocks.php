<?php 
require_once('./../config/config.php'); 


$get_id=   (!empty($_GET['pass_id'])) ? $_GET['pass_id'] : '';

$stmt = $conn->prepare("SELECT `id`, `block_name`,`loc_block_name` FROM `blocks` WHERE `district_id` = :id ORDER BY 2");
	$stmt->bindValue(':id', $get_id);
    $stmt->execute();
   
	$blocks_list = array();
while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
	$cur_loop = array(
		'id'       => $row['id'],
		'block_name'       => $row['block_name'],
		'loc_block_name'     => $row['loc_block_name']);

	$blocks_list[] = $cur_loop;
}
$fetched_blocks_list = '
		[
			';

	$rowCount = 0;
foreach($blocks_list as $v){

		$fetched_blocks_list .= '{ "id": "' . $v['id'] . '", "block_name": "' . $v['block_name'] . '", "loc_block_name": "' . $v['loc_block_name'] . '" },';
		}
		$fetched_blocks_list .= '{ "id": "-1", "block_name": "Other", "loc_block_name": "अन्य" },';


		$fetched_blocks_list = substr($fetched_blocks_list, 0, -1);
$fetched_blocks_list .= '
		]
		';

	echo $fetched_blocks_list;


?>