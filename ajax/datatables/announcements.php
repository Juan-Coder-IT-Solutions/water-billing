<?php
	include '../../core/config.php';

	$fetch = $mysqli->query("SELECT * FROM tbl_announcements ORDER BY date_added DESC") or die(mysqli_error());

	$response['data'] = array();
	$count = 1;
	while ($row = $fetch->fetch_array()) {
		$list = array();

		$list['announcement_id'] 		= $row['announcement_id'];
		$list['announcement_title'] 	= $row['announcement_title'];
		$list['announcement_content'] 	= $row['announcement_content'];
		$list['date_added'] 			= date("F j, Y h:i A",strtotime($row['date_added']));

		array_push($response['data'], $list);
	}

	echo json_encode($response);
?>