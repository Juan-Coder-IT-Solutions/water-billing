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
	
	//IF CURRENT DATE EXCEEDS THE DUE DATE ADD PENALTY AMOUNT
	$penalty = $row['due_date']<date('Y-m-d')?$row['penalty_amount']:0;

	$consumption = ($row['current_reading']-$row['previous_reading']);

	//IF CONSUMPTION EXCEEDS THE MAXIMUM CUBIC RATE USE CUBIC METER RATE ELSE USE MINIMUM RATE
	$cubic_rate = $consumption > $row['maximum_cubic'] ? $row['cubic_meter_rate']*$consumption : $row['minimum_rate'];

	//BALANCE FORMULA
	$balance = $cubic_rate + $penalty;

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

function get_previous_reading($user_id){
	global $mysqli;
	$fetch = $mysqli->query("SELECT current_reading FROM tbl_bills WHERE user_id='$user_id' ORDER BY billing_date DESC limit 1") or die(mysqli_error());
	$row = $fetch->fetch_array();

	return $row[0];
}

?>