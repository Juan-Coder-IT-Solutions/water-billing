<?php
	include '../core/config.php';

	$primary_id 	= $_POST['primary_id'];
	$fetch = $mysqli->query("SELECT * FROM tbl_system_charges WHERE system_charge_id = '$primary_id'") or die(mysqli_error());

	$response = array();
	while ($row = $fetch->fetch_array()) {
		$list = array();
		$list['system_charge_id'] 	= $row['system_charge_id'];
		$list['customer_type'] 		= $row['customer_type'];
		$list['system_charge_name'] = $row['system_charge_name'];
		$list['amount'] 			= $row['amount'];
		$list['kwh'] 				= $row['kwh'];
		$list['date_added'] 		= $row['date_added'];


		array_push($response, $list);
	}

	echo json_encode($response);