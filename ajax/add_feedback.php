<?php 
	include '../core/config.php';
	$user_id 			= $_SESSION['user_id'];
	$date_added         = date("Y-m-d H:i:s",strtotime($system_date));
    $feedback_content 	= $mysqli -> real_escape_string($_POST['feedback_content']);

	$mysqli->query("INSERT INTO tbl_feedbacks SET `user_id` ='$user_id',`feedback_content` ='$feedback_content',`date_added`='$date_added'");

    echo 1;
?>