<?php 
	include '../core/config.php';
	$user_id 				= $_SESSION['user_id'];
	$announcement_title 	= $mysqli -> real_escape_string($_POST['announcement_title']);
    $announcement_content 	= $mysqli -> real_escape_string($_POST['announcement_content']);

	$mysqli->query("INSERT INTO tbl_announcements SET `announcement_title` ='$announcement_title', `announcement_content`='$announcement_content', `user_id`='$user_id'");

    echo 1;
?>