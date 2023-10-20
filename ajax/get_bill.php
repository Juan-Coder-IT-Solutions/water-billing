<?php
	include '../core/config.php';

	$primary_id 	= $_POST['primary_id'];
	$fetch = $mysqli->query("SELECT * FROM tbl_bills WHERE bill_id = '$primary_id'") or die(mysqli_error());

	$response = array();
	while ($row = $fetch->fetch_array()) {
		$list = array();
		$list['bill_id'] 			= $row['bill_id'];
		$list['user_id'] 			= $row['user_id'];
		$list['previous_reading'] 	= $row['previous_reading'];
		$list['current_reading'] 	= $row['current_reading'];
		$list['cubic_meter_rate'] 	= $row['cubic_meter_rate'];

		$list['maximum_cubic'] 	= $row['maximum_cubic'];
		$list['minimum_rate'] 	= $row['minimum_rate'];
		
		$list['penalty_amount'] 	= $row['penalty_amount'];
		$list['billing_date'] 		= $row['billing_date'];
		$list['due_date'] 			= $row['due_date'];
		$list['encoded_by'] 		= $row['encoded_by'];
		$list['status'] 		= $row['status'];
		$list['date_added'] 	= $row['date_added'];


		array_push($response, $list);
	}

	echo json_encode($response);