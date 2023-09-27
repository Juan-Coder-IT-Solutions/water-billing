<?php
	include '../core/config.php';

	$id = $_POST['id'];

	foreach ($id as $user_id) {
		$mysqli->query("DELETE FROM tbl_users WHERE user_id = '$user_id' ");
	}

	echo 1;
?>