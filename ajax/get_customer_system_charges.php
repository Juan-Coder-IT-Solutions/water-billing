<?php
	include '../core/config.php';

	$user_id 		= $_POST['user_id'];
	$billing_date 	= $_POST['billing_date'];
	$customer_type 	= user_info("customer_type",$user_id);
	
	$fetch = $mysqli->query("SELECT * FROM tbl_system_charges WHERE customer_type = '$customer_type'") or die(mysqli_error());
	$response = array();
	while ($row = $fetch->fetch_array()) {
		$list = array();
		$list['system_charge_id'] 		= $row['system_charge_id'];
		$list['customer_type'] 			= $row['customer_type'];
		$list['cubic_meter_rate'] 		= $row['cubic_meter_rate'];
		$list['late_penalty_amount'] 	= $row['late_penalty_amount'];
		$list['maximum_cubic'] 			= $row['maximum_cubic'];
		$list['minimum_rate'] 			= $row['minimum_rate'];
		$list['date_added'] 			= $row['date_added'];


		$list['due_date'] 				= get_due_date($billing_date,$row['due_day_of_the_month']);

		$list['previous_reading'] 		= get_previous_reading($user_id);

		array_push($response, $list);
	}

	echo json_encode($response);