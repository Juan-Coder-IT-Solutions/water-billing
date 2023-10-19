<?php
	include '../../core/config.php';
	$session_user_id = $_SESSION['user_id'];
	$fetch = $mysqli->query("SELECT * FROM tbl_system_charges ORDER BY date_added DESC") or die(mysqli_error());

	$response['data'] = array();
	$count = 1;
	while ($row = $fetch->fetch_array()) {
		$list = array();

		$list['system_charge_id'] 		= $row['system_charge_id'];
		$list['customer_type'] 			= $row['customer_type'];
		$list['system_charge_name'] 	= $row['system_charge_name'];
		$list['cubic_meter_rate'] 		= number_format($row['cubic_meter_rate'],2);
		$list['late_penalty_amount'] 	= number_format($row['late_penalty_amount'],2);
		$list['date_added'] 			= date("F j, Y h:i A",strtotime($row['date_added']));

		array_push($response['data'], $list);
	}

	echo json_encode($response);
?>