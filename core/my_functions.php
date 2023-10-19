<?php 

function userFullName($user_id){
	global $mysqli;
	$fetch = $mysqli->query("SELECT * FROM tbl_users WHERE user_id='$user_id'") or die(mysqli_error());
	if($fetch->num_rows > 0){
		$row = $fetch->fetch_array();
		return $row["user_lname"].", ".$row["user_fname"]." ".$row["user_mname"];
	}else{
		return "User not found.";
	}
	
}

function user_info($selected_data,$user_id){
	global $mysqli;
	$fetch = $mysqli->query("SELECT $selected_data FROM tbl_users WHERE user_id='$user_id'") or die(mysqli_error());
	$row = $fetch->fetch_array();

	return $row[0];
}

function get_billing_total_balance($bill_id){
	global $mysqli;
	$fetch = $mysqli->query("SELECT * FROM tbl_bills WHERE bill_id='$bill_id'") or die(mysqli_error());
	$row = $fetch->fetch_array();

	$penalty = $row['due_date']<date('Y-m-d')?$row['penalty_amount']:"";
	$balance = (($row['previous_reading']-$row['current_reading']) * ($row['cubic_meter_rate'])) + $penalty;

	return $balance;
}

function get_billing_total_payment($bill_id){
	global $mysqli;
	$fetch = $mysqli->query("SELECT SUM(payment_amount) FROM tbl_payments WHERE bill_id='$bill_id'") or die(mysqli_error());
	$row = $fetch->fetch_array();

	return $row[0];
}

function get_remaining_balance($bill_id){
	$result = get_billing_total_balance($bill_id)-get_billing_total_payment($bill_id);
	
	return $result;
}

?>