<?php
	include '../core/config.php';

	$primary_id = $_POST['id'];



	//AUTOMATIC UPDATE BILL TO SAVED
	$fetch = $mysqli->query("SELECT bill_id FROM tbl_payments WHERE payment_id = '$primary_id'") or die(mysqli_error());
	$row = $fetch->fetch_array();
	$bill_id = $row[0];

	$mysqli->query("UPDATE tbl_bills SET status='S' WHERE bill_id = '$bill_id' ") or die(mysql_error());

	$mysqli->query("DELETE FROM tbl_payments WHERE payment_id = '$primary_id' ");
	

	echo 1;
?>