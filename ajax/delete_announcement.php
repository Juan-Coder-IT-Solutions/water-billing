<?php
	include '../core/config.php';

	$id = $_POST['id'];

	foreach ($id as $primary_id) {
		$mysqli->query("DELETE FROM tbl_announcements WHERE announcement_id = '$primary_id' ");
	}

	echo 1;
?>