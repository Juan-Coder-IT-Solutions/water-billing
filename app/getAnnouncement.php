<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require_once 'core/config.php';

$data = json_decode(file_get_contents("php://input"));

$fetch = $mysqli_connect->query("SELECT * FROM tbl_announcements") or die(mysql_error());
$response = array();
while ($row = $fetch->fetch_array()) {
    $list = array();
    $list['id'] = $row['announcement_id'];
    $list['title'] = $row['announcement_title'];
    $list['content'] = $row['announcement_content'];
    $list['date_added'] =  date("F j, Y h:i a",strtotime($row['date_added']));
    array_push($response, $list);
}

echo json_encode($response);
