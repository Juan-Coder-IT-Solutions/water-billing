<?php
	include '../../core/config.php';

	$fetch = $mysqli->query("SELECT * FROM tbl_bills") or die(mysqli_error());

	$response['data'] = array();
	$count = 1;
	while ($row = $fetch->fetch_array()) {
		$list = array();

		$list['bill_id'] 			= $row['bill_id'];
		$list['meter_number'] 		= user_info("meter_number",$row['user_id']);
		$list['user'] 				= userFullName($row['user_id']);
		$list['previous_reading'] 	= $row['previous_reading'];
		$list['current_reading'] 	= $row['current_reading'];
		$list['cubic_meter_rate'] 	= number_format($row['cubic_meter_rate'],2);
		$list['payment'] 			= number_format(get_billing_total_payment($row['bill_id']),2);
		$list['balance'] 			= number_format(get_billing_total_balance($row['bill_id']),2);
		$list['penalty_amount'] 	= number_format($row['penalty_amount'],2);
		$list['billing_date'] 		= $row['billing_date'];
		$list['due_date'] 			= $row['due_date'];
		$list['encoded_by'] 		= userFullName($row['encoded_by']);
		$list['status'] 			= $row['status'];
		$list['date_added'] 		= date("F j, Y h:i A",strtotime($row['date_added']));

		array_push($response['data'], $list);
	}

	echo json_encode($response);
?>