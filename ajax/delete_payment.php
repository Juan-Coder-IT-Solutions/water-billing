<?php
	include '../core/config.php';

	$primary_id = $_POST['id'];

	$mysqli->query("DELETE FROM tbl_payments WHERE payment_id = '$primary_id' ");
	

	echo 1;
?>