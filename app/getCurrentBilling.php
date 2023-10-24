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

$row = array();
$fetch = $mysqli_connect->query("SELECT * FROM tbl_bills where user_id='$user_id' AND MONTH(billing_date) = $dateMonth AND YEAR(billing_date) = $dateYear") or die(mysql_error());
$row = $fetch->fetch_array();

// $param = getParam(getCustomerType($user_id));
// $row['cubic_meter_rate'] = $param['cubic_meter_rate'];
// $row['maximum_cubic'] = $param['maximum_cubic'];
// $row['minimum_rate'] = $param['minimum_rate'];

// SetPrevReading(data["previous_reading"]);
//     SetCurrentReading(data["current_reading"]);
//     setBillingPeriod(data["billing_period"]);
//     setTotalConsume(data["total_consume"]);
//     setTotalAmount(data["total_amount"]);
//     setTotalDueAmount(data["due_total"]);
$total_consume = $row['current_reading'] - $row['previous_reading'];
$total_amount = $total_consume > $row['maximum_cubic'] ? $total_consume * $row['cubic_meter_rate'] : $row['minimum_rate'];
$total_due = $total_amount + $row['penalty_amount'];

$row['billing_period'] = date('M', mktime(0, 0, 0, $lastMonthMonth, 1))." ".$lastMonthYear." to " . date('M', mktime(0, 0, 0, $dateMonth, 1)) . " " . $dateYear;
$row['total_consume'] = $total_consume;
$row['total_amount'] = $total_amount;
$row['due_total'] =  $total_due;
$row['encoded'] =  getUser($row['encoded_by']);


echo json_encode($row);

// }
