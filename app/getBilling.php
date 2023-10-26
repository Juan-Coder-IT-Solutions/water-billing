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


$date = getCurrentDate();
$dateMonth = date('m', strtotime($date));
$dateYear = date('Y', strtotime($date));

// Calculate the date for the last month
$lastMonth = date('Y-m', strtotime('-1 month', strtotime($date)));

// Extract the year and month
$lastMonthYear = date('Y', strtotime($lastMonth));
$lastMonthMonth = date('m', strtotime($lastMonth));


$param = getParam(getCustomerType($user_id));
$row['billing_period'] = date('M', mktime(0, 0, 0, $lastMonthMonth, 1)) . " " . $lastMonthYear . " to " . date('M', mktime(0, 0, 0, $dateMonth, 1)) . " " . $dateYear;
$row['cubic_meter_rate'] = $param['cubic_meter_rate'];
$row['maximum_cubic'] = $param['maximum_cubic'];
$row['minimum_rate'] = $param['minimum_rate'];
$row['penalty_amount'] = $param['late_penalty_amount'];

$row = array();
$fetch = $mysqli_connect->query("SELECT * FROM tbl_bills where user_id='$user_id' ORDER BY bill_id DESC") or die(mysql_error());
if($fetch->num_rows > 0){
	$row = $fetch->fetch_array();
}else{
	$row['current_reading'] = 0;
}

echo json_encode($row);

// }
