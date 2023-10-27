<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require_once 'core/config.php';

$data = json_decode(file_get_contents("php://input"));

$user_id = $mysqli_connect->real_escape_string($data->user_id);

$fetch = $mysqli_connect->query("SELECT * FROM tbl_feedbacks WHERE user_id='$user_id'") or die(mysql_error());
$response = array();
while ($row = $fetch->fetch_array()) {

    $list = array();
    $list['id'] = $row['feedback_id'];
    $list['feedback_content'] = $row['feedback_content'];
    $list['date_added'] = date("F Y",strtotime($row['date_added']));
    array_push($response, $list);
}

echo json_encode($response);
