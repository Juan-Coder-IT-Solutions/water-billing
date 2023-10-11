<?php
	include '../core/config.php';

	if(isset($_POST['update_bill_id'])){
		$bill_id		= $_POST['update_bill_id'];
		$user_id		= $_POST['update_user_id'];
		$previous_bill	= $_POST['update_previous_bill'];
		$present_bill	= $_POST['update_present_bill'];
		$status			= $_POST['update_status'];
	
		$update_data = "user_id='$user_id', previous_bill = '$previous_bill', present_bill = '$present_bill', status='$status'";
	
		$mysqli->query("UPDATE tbl_bills SET $update_data WHERE bill_id = '$bill_id' ") or die(mysql_error());
		echo 1;
		
	}
?>