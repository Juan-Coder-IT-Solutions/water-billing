<?php 

function userFullName($user_id){
	global $mysqli;
	$fetch = $mysqli->query("SELECT * FROM tbl_users WHERE user_id='$user_id'") or die(mysqli_error());
	$row = $fetch->fetch_array();

	return $row["user_lname"].", ".$row["user_fname"]." ".$row["user_mname"];
}

function user_info($selected_data,$user_id){
	global $mysqli;
	$fetch = $mysqli->query("SELECT $selected_data FROM tbl_users WHERE user_id='$user_id'") or die(mysqli_error());
	$row = $fetch->fetch_array();

	return $row[0];
}

?>