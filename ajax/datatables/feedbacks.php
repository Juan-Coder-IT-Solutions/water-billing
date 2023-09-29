<?php
	include '../../core/config.php';
	$session_user_id = $_SESSION['user_id'];
	$user_category = user_info("user_category",$session_user_id);

	$param = $user_category=="A"?"":"AND user_id='$session_user_id'";
	$fetch = $mysqli->query("SELECT * FROM tbl_feedbacks WHERE feedback_id>0 $param ORDER BY date_added DESC") or die(mysqli_error());

	$response['data'] = array();
	$count = 1;
	while ($row = $fetch->fetch_array()) {
		$list = array();

		$list['feedback_id'] 		= $row['feedback_id'];
		$list['user_id'] 			= $row['user_id'];
		$list['session_user_id'] 	= $session_user_id;
		$list['user'] 				= userFullName($row['user_id']);
		$list['feedback_content'] 	= $row['feedback_content'];
		$list['date_added'] 		= date("F j, Y h:i A",strtotime($row['date_added']));

		array_push($response['data'], $list);
	}

	echo json_encode($response);
?>