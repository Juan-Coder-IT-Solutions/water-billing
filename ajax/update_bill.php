<?php
	include '../core/config.php';

	if(isset($_POST['update_bill_id'])){
		$bill_id			= $_POST['update_bill_id'];
		$user_id			= $_POST['update_user_id'];
		$previous_reading	= $_POST['update_previous_reading'];
		$current_reading	= $_POST['update_current_reading'];
		$cubic_meter_rate	= $_POST['update_cubic_meter_rate'];
		$penalty_amount		= $_POST['update_penalty_amount'];
		$billing_date		= $_POST['update_billing_date'];
		$due_date			= $_POST['update_due_date'];
	
		$update_data = "user_id='$user_id', previous_reading = '$previous_reading', current_reading = '$current_reading', cubic_meter_rate='$cubic_meter_rate', penalty_amount='$penalty_amount', billing_date='$billing_date', due_date='$due_date'";
	
		$mysqli->query("UPDATE tbl_bills SET $update_data WHERE bill_id = '$bill_id' ") or die(mysql_error());
		echo 1;
		
	}
?>