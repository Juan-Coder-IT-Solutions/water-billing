<?php
	include '../core/config.php';

	$primary_id 	= $_POST['primary_id'];
	$fetch = $mysqli->query("SELECT * FROM tbl_bills WHERE bill_id = '$primary_id'") or die(mysqli_error());

	$response = array();
	while ($row = $fetch->fetch_array()) {
		$list = array();
		$list['bill_id'] 		= $row['bill_id'];
		$list['user_id'] 		= $row['user_id'];
		$list['previous_bill'] 	= $row['previous_bill'];
		$list['present_bill'] 	= $row['present_bill'];
		$list['status'] 		= $row['status'];
		$list['date_added'] 	= $row['date_added'];


		array_push($response, $list);
	}

	echo json_encode($response);