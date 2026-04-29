<?php
$place_404 = 1;

// query db
//print_r($dukaan_id);
$stmt = $conn->prepare("SELECT * FROM dukaan_list WHERE id = :dukaan_id");
$stmt->bindValue(':dukaan_id', $dukaan_id);
$stmt->execute();

if($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
	$place_404 = 0;

	$dukaan_id        = (!empty($row['id']))        ? $row['id']        : '';
	$dukaan_userid    = (!empty($row['user_id']))          ? $row['user_id']          : '';
	$dukaan_name      = (!empty($row['dukaan_name']))      ? $row['dukaan_name']      : '';

	$dukaan_addr         = (!empty($row['dukaan_addr']))         ? $row['dukaan_addr']         : '';
	$dukaandar_name         = (!empty($row['dukaandar_name']))         ? $row['dukaandar_name']         : '';
	$contact_no         = (!empty($row['contact_no']))         ? $row['contact_no']         : '';
	$dukaan_desc        = (!empty($row['dukaan_desc']))         ? $row['dukaan_desc']         : '';
	$dukaan_img_id        = (!empty($row['dukaan_img_id']))         ? $row['dukaan_img_id']         : '';
	$video_name        = (!empty($row['video_name']))         ? $row['video_name']         : '';
	$email        = (!empty($row['email']))         ? $row['email']         : '';
	$shop_categories        = (!empty($row['shop_categories']))         ? $row['shop_categories']         : '';
	$paid        = (!empty($row['paid']))         ? $row['paid']         : '';
	//$main_area        = is_string($main_area)      ? trim($main_area)         : $main_area;
    $dukaan_img = '';
    
    if($dukaan_img_id){
        $stmt2 = $conn->prepare("SELECT * FROM `dukaan_photos` WHERE `id` = :img_id");
        $stmt2->bindValue(':img_id', $dukaan_img_id);
        $stmt2->execute();

        if($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)) {
            $dukaan_img        = (!empty($row2['photo_name']))        ? $row2['photo_name']        : '';
            //print_r($row2['photo_name']);

        }

    }
    if($dukaan_name){
        $dukaan_name_url = str_replace(" ","-",strtolower($dukaan_name));
    }
    
    //$query2 = "SELECT * FROM `dukaan_products` WHERE `shop_id` = ";
    //$stmt2 = $conn->prepare("SELECT * FROM `dukaan_products` WHERE `shop_id` = :shop_id");
    $stmt2 = $conn->prepare("SELECT a.`id`,`prod_name`,`prod_desc`,`prod_amt`,`shop_id`,`cat_id`, b.id as photo_id, b.photo_name, `quantity` as prod_qty, `unit` as prod_unit, c.name as unit_name FROM `dukaan_products` a 
    LEFT JOIN dukaan_photos b ON a.id = b.prod_id 
    LEFT JOIN `measure_unit` c ON a.unit = c.id
    WHERE `shop_id` = :shop_id AND a.is_del != '1' ORDER BY 1");
    $stmt2->bindValue(':shop_id', $dukaan_id);
    $stmt2->execute();

    $product_list = array();
    while($row = $stmt2->fetch(PDO::FETCH_ASSOC)) {
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
            'unit_name'     => $row['unit_name']);

        $product_list[] = $cur_loop;
    }
    $product_list_count = count($product_list);
    
    //print_r($shop_categories);

    if($shop_categories){
        //print_r($shop_categories);
        $arr_shop_cat = explode(',',$shop_categories);
        if(!isset($arr_shop_cat[0])){
            $arr_shop_cat[0] = '0';
        }
        if(!isset($arr_shop_cat[1])){
            $arr_shop_cat[1] = '0';
        }
        if(!isset($arr_shop_cat[2])){
            $arr_shop_cat[2] = '0';
        }
        //print_r($arr_shop_cat);
        /*

        $stmt2 = $conn->prepare("SELECT * FROM `dukaan_photos` WHERE `id` = :img_id");
        $stmt2->bindValue(':img_id', $dukaan_img_id);
        $stmt2->execute();

        if($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)) {
            $dukaan_img        = (!empty($row2['photo_name']))        ? $row2['photo_name']        : '';
            //print_r($row2['photo_name']);

        }
        */



    }
    //print_r($stmt2);


    $stmt3 = $conn->prepare("SELECT a.`id`,a.`state_id`, b.state_name,`taluka_id`, c.district_name,a.`block_id`,d.block_name, `village_id`,e.village_name FROM `user_list` a 
    LEFT JOIN states b ON a.`state_id` = b.id
    LEFT JOIN districts c ON a.`taluka_id` = c.id
    LEFT JOIN blocks d ON a.`block_id` = d.id
    LEFT JOIN villages e ON a.`village_id` = e.id
    WHERE a.`id`=:userid");
    $stmt3->bindValue(':userid', $dukaan_userid);
    $stmt3->execute();

    $location = array();
    while($row = $stmt3->fetch(PDO::FETCH_ASSOC)) {
        $cur_loop = array(
            'id'       => $row['id'],
            'state_id'     => $row['state_id'],
            'state_name'     => $row['state_name'],
            'district_id'     => $row['taluka_id'],
            'district_name'     => $row['district_name'],
            'block_id'     => $row['block_id'],
            'block_name'     => $row['block_name'],
            'village_name'     => $row['village_name']);

        $location[] = $cur_loop;
    }

    $stmt4 = $conn->prepare("SELECT `id`, `name`, `loc_name` FROM `measure_unit`");
    $stmt4->bindValue(':userid', $dukaan_userid);
    $stmt4->execute();

    $measure_unit = array();
    while($row = $stmt4->fetch(PDO::FETCH_ASSOC)) {
        $cur_loop = array(
            'id'       => $row['id'],
            'name'     => $row['name'],
            'loc_name'     => $row['loc_name']);

        $measure_unit[] = $cur_loop;
    }

    //print_r($product_list);
}
