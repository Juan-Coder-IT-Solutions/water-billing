<?php
	include '../core/config.php';

	$primary_id 	= $_POST['primary_id'];
	$fetch = $mysqli->query("SELECT * FROM tbl_announcements WHERE announcement_id = '$primary_id'") or die(mysqli_error());

	$response = array();
	while ($row = $fetch->fetch_array()) {
		$list = array();
		$list['announcement_id'] 		= $row['announcement_id'];
		$list['announcement_title'] 	= $row['announcement_title'];
		$list['announcement_content'] 	= $row['announcement_content'];
		$list['date_added'] 	= $row['date_added'];


		array_push($response, $list);
	}

	echo json_encode($response);