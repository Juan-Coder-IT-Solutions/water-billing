<?php 
	include '../core/config.php';
	$announcement_title 	= $mysqli -> real_escape_string($_POST['announcement_title']);
    $announcement_content 	= $mysqli -> real_escape_string($_POST['announcement_content']);

	$mysqli->query("INSERT INTO tbl_announcements SET `announcement_title` ='$announcement_title', `announcement_content`='$announcement_content'");

    echo 1;
?>