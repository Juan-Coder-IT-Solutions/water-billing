<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require_once 'core/config.php';

$data = json_decode(file_get_contents("php://input"));
if (isset($data->account_id) && !empty($data->account_id)) {    
    $user_id = $mysqli_connect->real_escape_string($data->account_id);
    $encoded_by = $mysqli_connect->real_escape_string($data->encoded_by);
    $current_reading = $mysqli_connect->real_escape_string($data->current_reading);
    $previous_reading = $mysqli_connect->real_escape_string($data->previous_reading);
    $cubic_meter_rate = $mysqli_connect->real_escape_string($data->cubic_meter_rate);
    $minimum_rate = $mysqli_connect->real_escape_string($data->minimum_rate);
    $maximum_cubic = $mysqli_connect->real_escape_string($data->maximum_cubic);
    $penalty_amount = $mysqli_connect->real_escape_string($data->penalty_amount);

    $date = getCurrentDate();
    $dateMonth = date('m', strtotime($date));
    $dateYear = date('Y', strtotime($date));

    $fetch_rows = $mysqli_connect->query("SELECT count(user_id) FROM tbl_bills WHERE user_id='$user_id' AND MONTH(billing_date) = $dateMonth AND YEAR(billing_date) = $dateYear") or die(mysqli_error());
    $count_rows = $fetch_rows->fetch_array();

    $due_date = dueDAte($date, getCustomerType($user_id));

    if ($count_rows[0] > 0) {
        echo -1;
    } else {
        $sql = $mysqli_connect->query("INSERT INTO `tbl_bills`(`user_id`, `previous_reading`, `current_reading`, `cubic_meter_rate`, `maximum_cubic`, `minimum_rate`, `penalty_amount`, `billing_date`, `due_date`, `status`, `encoded_by`) VALUES ('$user_id','$previous_reading','$current_reading','$cubic_meter_rate','$maximum_cubic','$minimum_rate','$penalty_amount','$date','$due_date', 'S', '$encoded_by')");
        if ($sql) {
            echo 1;
        } else {
            echo "Error in executing query.";
        }
    }
}
