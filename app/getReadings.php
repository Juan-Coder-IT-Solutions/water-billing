<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require_once 'core/config.php';

$data = json_decode(file_get_contents("php://input"));

$user_id = $mysqli_connect->real_escape_string($data->user_id);

$fetch = $mysqli_connect->query("SELECT * FROM tbl_bills WHERE encoded_by='$user_id'") or die(mysql_error());
$response = array();
while ($row = $fetch->fetch_array()) {

    $dateMonth = date('m', strtotime($row['billing_date']));
    $dateYear = date('Y', strtotime($row['billing_date']));

    // Calculate the date for the last month
    $lastMonth = date('Y-m', strtotime('-1 month', strtotime($row['billing_date'])));

    // Extract the year and month
    $lastMonthYear = date('Y', strtotime($lastMonth));
    $lastMonthMonth = date('m', strtotime($lastMonth));

    $total = ($row['current_reading'] - $row['previous_reading']) * $row['cubic_meter_rate'];
    $list = array();
    $list['id'] = $row['bill_id'];
    $list['previous_reading'] = $row['previous_reading'];
    $list['account_name'] = getUser($row['user_id']);
    $list['current_reading'] = $row['current_reading'];
    $list['cubic_meter_rate'] = $row['cubic_meter_rate'];
    $list['penalty_amount'] = $row['penalty_amount'];
    $list['total'] = $total;
    $list['amount'] = number_format($total, 2); //$row['penalty_amount'];
    $list['billing_date'] = $row['billing_date'];
    $list['billing_period'] = date('M', mktime(0, 0, 0, $lastMonthMonth, 1)) . " " . $lastMonthYear . " to " . date('M', mktime(0, 0, 0, $dateMonth, 1)) . " " . $dateYear;
    $list['due_date'] = $row['due_date'];
    $list['status'] = $row['status'];
    $list['date_added'] = $row['date_added'];
    array_push($response, $list);
}

echo json_encode($response);
