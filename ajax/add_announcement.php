<?php 
	include '../core/config.php';
	$user_id 				= $_SESSION['user_id'];
	$announcement_date 		= $mysqli -> real_escape_string($_POST['announcement_date']);
	$announcement_title 	= $mysqli -> real_escape_string($_POST['announcement_title']);
    $announcement_content 	= $mysqli -> real_escape_string($_POST['announcement_content']);

    $date_added = date("Y-m-d H:i:s",strtotime($system_date));

	$mysqli->query("INSERT INTO tbl_announcements SET `announcement_date` ='$announcement_date',`announcement_title` ='$announcement_title', `announcement_content`='$announcement_content', `user_id`='$user_id',`date_added`='$date_added'");

    echo 1;
?>