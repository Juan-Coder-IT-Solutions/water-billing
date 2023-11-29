<?php
	include '../../core/config.php';
	$user_category_filter = $_POST['user_category_filter'];

	$user_category_filter_ = $user_category_filter=="AA"?"":(($user_category_filter=="A" OR $user_category_filter=="M")?"WHERE user_category='$user_category_filter'":(($user_category_filter=="C" OR $user_category_filter=="R")?"WHERE user_category='C' AND customer_type='$user_category_filter'":""));


	$fetch_user = $mysqli->query("SELECT * FROM tbl_users $user_category_filter_ ORDER BY user_fname ASC") or die(mysqli_error());

	$response['data'] = array();
	$count = 1;
	while ($row = $fetch_user->fetch_array()) {
		$list = array();

		$list['user_id'] 		= $row['user_id'];
		$list['account_number'] = $row['account_number'];
		$list['meter_number'] 	= $row['meter_number'];
		$list['fullname'] 		= userFullName($row['user_id']);
		$list['user_category'] 	= $row['user_category'];
		$list['customer_type'] 	= $row['customer_type'];
		$list['username'] 		= $row['username'];
		$list['date_added'] 	= date("F j, Y h:i A",strtotime($row['date_added']));

		array_push($response['data'], $list);
	}

	echo json_encode($response);
?>