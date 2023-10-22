<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require_once 'core/config.php';

$data = json_decode(file_get_contents("php://input"));

// if(isset($data->id) && !empty($data->id )){

	$user_id = $mysqli_connect->real_escape_string($data->id);

	$response = array();
	$fetch = $mysqli_connect->query("SELECT * FROM tbl_bills where user_id='$user_id' ORDER BY bill_id DESC") or die(mysql_error());
	$response = $fetch->fetch_array();

    $param = getParam(getCustomerType($user_id));
    $response['cubic_meter_rate'] = $param['cubic_meter_rate'];
    $response['maximum_cubic'] = $param['maximum_cubic'];
    $response['minimum_rate'] = $param['minimum_rate'];
    

	echo json_encode($response);

// }

?>