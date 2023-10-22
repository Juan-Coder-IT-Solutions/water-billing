<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require_once 'core/config.php';

$data = json_decode(file_get_contents("php://input"));

if(isset($data->user_id) && $data->user_id > 0){
	$student_id = $mysqli_connect->real_escape_string($data->user_id);
	$username = $mysqli_connect->real_escape_string($data->username);
	$student_fname = $mysqli_connect->real_escape_string($data->student_fname);
	$student_mname = $mysqli_connect->real_escape_string($data->student_mname);
	$student_lname = $mysqli_connect->real_escape_string($data->student_lname);
	
	$fetch_count = $mysqli_connect->query("SELECT count(student_id) FROM tbl_students WHERE username='$username' and student_id !='$student_id' ");
	$count_row = $fetch_count->fetch_array();

	if($count_row[0] > 0){
		echo -1;
	}else{
		$sql = $mysqli_connect->query("UPDATE `tbl_students` SET`student_fname`='$student_fname',`student_mname`='$student_mname',`student_lname`='$student_lname',`username`='$username' WHERE student_id='$student_id'");

		if($sql){
			echo 1;
		}else{
			echo "Error in executing query.";
		}
	}

}

?>