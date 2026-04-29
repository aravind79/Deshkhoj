<?php
require_once(__DIR__ . './../config/config.php');

// query is the default name of the request parameter that contains the query.
//$mobile_input = (!empty($_GET['query'])) ? $_GET['query'] : '';
$get_id=   (!empty($_GET['pass_id'])) ? $_GET['pass_id'] : '';
//$prod=   (!empty($_GET['prod'])) ? $_GET['prod'] : '';
$state=   (!empty($_GET['state'])) ? $_GET['state'] : '-1';
$dist=   (!empty($_GET['dist'])) ? $_GET['dist'] : '-1';
$blk=   (!empty($_GET['blk'])) ? $_GET['blk'] : '-1';
$vill=   (!empty($_GET['vill'])) ? $_GET['vill'] : '-1';
$page=   (!empty($_GET['page'])) ? $_GET['page'] : '';
//print_r($get_id);
//print_r($prod);
//print_r($dist);
//print_r($blk);
//print_r($vill);
/*
$start = '0';
if($page == '1'){
	$start = '0';
}else{
	$start = (int)$page * 10;
}
*/
$start = ((int)$page - 1) * 10;
//print_r((int)$start);
//print_r($page);

if($state){
    if($state == '-1' || $state == NULL){
        $state = '-2';
    }
}

if($dist){
    if($dist == '-1' || $dist == NULL){
        $dist = '-2';
    }
}

if($blk){
    if($blk == '-1' || $blk == NULL){
        $blk = '-2';
    }
}

if($vill){
    if($vill == '-1' || $vill == NULL){
        $vill = '-2';
    }
}



$qry = "SELECT a.`id`,`user_id`,`dukaan_name`, b.taluka_id, c.district_name,c.loc_district_name,b.block_id, d.block_name,d.loc_block_name,b.village_id,e.village_name,e.loc_village_name,`shop_categories`,
SUBSTRING_INDEX(SUBSTRING_INDEX(shop_categories, ',', 1), ',', -1) as c1,
SUBSTRING_INDEX(SUBSTRING_INDEX(shop_categories, ',', 2), ',', -1) as c2,
SUBSTRING_INDEX(SUBSTRING_INDEX(shop_categories, ',', 3), ',', -1) as c3, f.photo_name, paid
FROM `dukaan_list` a 
LEFT JOIN user_list b ON a.`user_id` = b.id
LEFT JOIN districts c ON b.taluka_id = c.id
LEFT JOIN blocks d ON b.block_id = d.id
LEFT JOIN villages e ON b.village_id = e.id
LEFT JOIN dukaan_photos f ON a.dukaan_img_id = f.id
WHERE `dukaan_name` NOT LIKE '%Sample Shop Name%' AND `dukaan_name` != ''
ORDER BY "; 
/*
paid = '2' DESC";
if($vill != '-2'){
	$qry .= ", b.village_id = '".$vill."' DESC";
}
if($blk != '-2'){
	$qry .= ", b.block_id = '".$blk."' DESC";
}
if($dist != '-2'){
	$qry .= ", b.taluka_id = '".$dist."' DESC";
}
if($state != '-2'){
	$qry .= ", b.state_id = '".$state."' DESC";
}
$qry .= " LIMIT ".$start.", 10";
*/

if($vill != '-2'){
	$qry .= " b.village_id = '".$vill."' DESC";
}
if($blk != '-2'){
	if($vill != '-2'){
		$qry .= ", b.block_id = '".$blk."' DESC";
	}else{
		$qry .= " b.block_id = '".$blk."' DESC";
	}
}
if($dist != '-2'){
	if($vill != '-2' || $blk != '-2'){
		$qry .= ", b.taluka_id = '".$dist."' DESC";
	}else{
		$qry .= " b.taluka_id = '".$dist."' DESC";
	}
}
if($dist != '-2'){
	if($vill != '-2' || $blk != '-2' || $dist != '-2'){
		$qry .= ", b.state_id = '".$state."' DESC";
	}else{
		$qry .= " b.state_id = '".$state."' DESC";
	}
}
if($vill != '-2' || $blk != '-2' || $dist != '-2' || $state != '-2'){
	$qry .= ", paid = '2' DESC";
}else{
	$qry .= " paid = '2' DESC";
}
$qry .= " LIMIT ".$start.", 12";

$stmt = $conn->prepare($qry);


//print_r($stmt);

//	$stmt->bindValue(':id1', $get_id);
//	$stmt->bindValue(':dist', $dist);
//	$stmt->bindValue(':blk', $blk);
//	$stmt->bindValue(':vill', $vill);
	//$stmt->bindValue(':start', (int)$start);

	$stmt->execute();
    //print_r($stmt);
	//print_r($get_id);
	$blocks_list = array();
while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
	$cur_loop = array(
		'id'       => $row['id'],
		'dukaan_name'       => $row['dukaan_name'],
		'district_name'       => $row['district_name'],
		'loc_district_name'       => $row['loc_district_name'],
		'block_name'       => $row['block_name'],
		'loc_block_name'       => $row['loc_block_name'],
		'village_name'       => $row['village_name'],
		'loc_village_name'       => $row['loc_village_name'],
		'shop_categories'       => $row['shop_categories'],
		'shop_photo'       => $row['photo_name'],
		'c1'       => $row['c1'],
		'c2'       => $row['c2'],
		'c3'       => $row['c3']
	);

	$blocks_list[] = $cur_loop;
	//echo $cur_loop['dukaan_name'].'</br>';
}
$fetched_districts_list = '
		[
			';

	$rowCount = 0;
foreach($blocks_list as $v){

		$fetched_districts_list .= '{ "id": "' . $v['id'] . '", "district_name": "' . $v['district_name'] . '", "loc_district_name": "' . $v['loc_district_name'] . '", "block_name": "' . $v['block_name'] . '", "loc_block_name": "' . $v['loc_block_name'] . '", "village_name": "' . $v['village_name'] . '", "loc_village_name": "' . $v['loc_village_name'] . '", "dukaan_name": "' . $v['dukaan_name'] . '", "shop_categories": "' . $v['shop_categories'] . '", "shop_photo": "' . $v['shop_photo'] . '", "c1": "' . $v['c1'] . '", "c2": "' . $v['c2'] . '", "c3": "' . $v['c3'] . '" },';
		}
		//$fetched_districts_list .= '{ "id": "-1", "district_name": "Other", "loc_district_name": "अन्य" },';

		$fetched_districts_list = substr($fetched_districts_list, 0, -1);
$fetched_districts_list .= '
		]
		';
	//echo $$block_list;
	echo $fetched_districts_list;
    
?>