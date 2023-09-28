<?php
	include '../../core/config.php';

	$fetch_user = $mysqli->query("SELECT * FROM tbl_users ORDER BY user_fname ASC") or die(mysqli_error());

	$response['data'] = array();
	$count = 1;
	while ($row = $fetch_user->fetch_array()) {
		$list = array();

		$list['user_id'] 		= $row['user_id'];
		$list['account_number'] = $row['account_number'];
		$list['fullname'] 		= userFullName($row['user_id']);
		$list['user_category'] 	= $row['user_category'];
		$list['username'] 		= $row['username'];
		$list['date_added'] 	= date("F j, Y h:i A",strtotime($row['date_added']));

		array_push($response['data'], $list);
	}

	echo json_encode($response);
?>