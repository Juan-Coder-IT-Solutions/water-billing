<?php
	include '../core/config.php';




	if(isset($_POST['update_feedback_id'])){
		$feedback_id		= $_POST['update_feedback_id'];
		$feedback_content	= $_POST['update_feedback_content'];
	
		$update_data = "feedback_id='$feedback_id', feedback_content = '$feedback_content'";
	
		$mysqli->query("UPDATE tbl_feedbacks SET $update_data WHERE feedback_id = '$feedback_id' ") or die(mysql_error());
		echo 1;
		
	}
?>