<?php
	include '../core/config.php';

	$primary_id 	= $_POST['primary_id'];
	$fetch_user = $mysqli->query("SELECT * FROM tbl_users WHERE user_id = '$primary_id'") or die(mysqli_error());

	$response = array();
	while ($row = $fetch_user->fetch_array()) {
		$list = array();
		$list['user_id'] 		= $row['user_id'];
		$list['user_category'] 	= $row['user_category'];
		$list['user_fname'] 	= $row['user_fname'];
		$list['user_mname'] 	= $row['user_mname'];
		$list['user_lname'] 	= $row['user_lname'];
		$list['username'] 		= $row['username'];
		$list['date_added'] 	= $row['date_added'];

		//modified
		$list['password'] = "";

		array_push($response, $list);
	}

	echo json_encode($response);