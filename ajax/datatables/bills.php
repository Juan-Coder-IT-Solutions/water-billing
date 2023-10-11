<?php
	include '../../core/config.php';

	$fetch = $mysqli->query("SELECT * FROM tbl_bills") or die(mysqli_error());

	$response['data'] = array();
	$count = 1;
	while ($row = $fetch->fetch_array()) {
		$list = array();

		$list['bill_id'] 		= $row['bill_id'];
		$list['account_number'] = user_info("account_number",$row['user_id']);
		$list['user'] 			= userFullName($row['user_id']);
		
		$list['previous_bill'] 	= number_format($row['previous_bill'],2);
		$list['present_bill'] 	= number_format($row['present_bill'],2);
		$list['status'] 		= $row['status'];
		$list['date_added'] 	= date("F j, Y h:i A",strtotime($row['date_added']));

		array_push($response['data'], $list);
	}

	echo json_encode($response);
?>