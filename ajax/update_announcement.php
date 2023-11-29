<?php
	include '../core/config.php';

	if(isset($_POST['update_announcement_id'])){
		$announcement_id		= $_POST['update_announcement_id'];
		$announcement_date		= $_POST['update_announcement_date'];
		$announcement_title		= $_POST['update_announcement_title'];
		$announcement_content	= $_POST['update_announcement_content'];
	
		$update_data = "announcement_date='$announcement_date',announcement_title='$announcement_title', announcement_content = '$announcement_content'";
	
		$mysqli->query("UPDATE tbl_announcements SET $update_data WHERE announcement_id = '$announcement_id' ") or die(mysql_error());
		echo 1;
		
	}
?>