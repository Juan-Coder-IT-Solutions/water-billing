<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require_once 'core/config.php';

$data = json_decode(file_get_contents("php://input"));
$response = array();


// if(isset($data->username) && !empty($data->username) ){
$student_fname = $mysqli_connect->real_escape_string($data->user_fname);
$student_mname = $mysqli_connect->real_escape_string($data->user_mname);
$student_lname = $mysqli_connect->real_escape_string($data->user_lname);

$username = $mysqli_connect->real_escape_string($data->username);
$password = $mysqli_connect->real_escape_string($data->password);
$confirm_password = $mysqli_connect->real_escape_string($data->confirm_password);

// $date = getCurrentDate();
if ($confirm_password != $password) {
	$response['response'] = -3;
} else {
	$fetch_rows = $mysqli_connect->query("SELECT count(student_id) FROM tbl_students WHERE student_fname='$student_fname' AND student_mname='$student_mname' AND student_lname='$student_lname'") or die(mysqli_error());
	$count_rows = $fetch_rows->fetch_array();

	if ($count_rows[0] > 0) {
		$response['response'] = $count_rows[0]."2";//-2;
	} else {
		$sql = $mysqli_connect->query("INSERT INTO `tbl_students`(`student_fname`, `student_mname`, `student_lname`,  `username`, `password`) VALUES ('$student_fname','$student_mname','$student_lname','$username',md5('$password'))");


		if ($sql) {
			$student_id = $mysqli_connect->insert_id;

			$response['student_id'] = $student_id;
			$response['student_fname'] = $student_fname;
			$response['student_mname'] = $student_mname;
			$response['student_lname'] = $student_lname;
			$response['response'] = 1;
		} else {

			$response['student_id'] = 0;
			$response['student_fname'] = "";
			$response['student_mname'] = "";
			$response['student_lname'] = "";
			$response['response'] = "Error in executing query";
		}
	}

}
echo json_encode($response);
	
// }
