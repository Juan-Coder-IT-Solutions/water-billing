<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access, Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json; charset=UTF-8");

require_once 'core/config.php';

$data = json_decode(file_get_contents("php://input"));

// if(isset($data->username) && !empty($data->username) ){
	
	$username = $mysqli_connect->real_escape_string($data->username);
	$password = $mysqli_connect->real_escape_string($data->password);


	$fetch_rows = $mysqli_connect->query("SELECT user_id,user_category FROM tbl_users WHERE username='$username' AND password=md5('$password') AND (user_category = 'C' OR user_category='M')") or die(mysqli_error());

	$response = array();

	if(mysqli_num_rows($fetch_rows) > 0){
		
		$row = $fetch_rows->fetch_array();

		$response['user_id'] = $row['user_id'];
		$response['user_category'] = $row['user_category'];
		$response['response'] = 1;
		// echo 1;	

	}else{
		$response['user_id'] = 0;
		$response['user_category'] = 0;
		$response['response'] = 0;
	}

	echo json_encode($response);
	
// }

?>