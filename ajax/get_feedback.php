<?php
	include '../core/config.php';

	$primary_id 	= $_POST['primary_id'];
	$fetch = $mysqli->query("SELECT * FROM tbl_feedbacks WHERE feedback_id = '$primary_id'") or die(mysqli_error());

	$response = array();
	while ($row = $fetch->fetch_array()) {
		$list = array();
		$list['feedback_id'] 		= $row['feedback_id'];
		$list['feedback_content'] 	= $row['feedback_content'];
		$list['date_added'] 		= $row['date_added'];


		array_push($response, $list);
	}

	echo json_encode($response);