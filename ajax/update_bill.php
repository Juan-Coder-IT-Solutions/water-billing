<?php
	include '../core/config.php';

	if(isset($_POST['update_bill_id'])){
		$bill_id			= $mysqli -> real_escape_string($_POST['update_bill_id']);
		$user_id			= $mysqli -> real_escape_string($_POST['update_user_id']);
		$previous_reading	= $mysqli -> real_escape_string($_POST['update_previous_reading']);
		$current_reading	= $mysqli -> real_escape_string($_POST['update_current_reading']);
		$cubic_meter_rate	= $mysqli -> real_escape_string($_POST['update_cubic_meter_rate']);
		$penalty_amount		= $mysqli -> real_escape_string($_POST['update_penalty_amount']);
		$billing_date		= $mysqli -> real_escape_string($_POST['update_billing_date']);
		$due_date			= $mysqli -> real_escape_string($_POST['update_due_date']);

		$maximum_cubic      = $mysqli -> real_escape_string($_POST['update_maximum_cubic']);
    	$minimum_rate       = $mysqli -> real_escape_string($_POST['update_minimum_rate']);
	
		$update_data = "user_id='$user_id', previous_reading = '$previous_reading', current_reading = '$current_reading', cubic_meter_rate='$cubic_meter_rate', penalty_amount='$penalty_amount', billing_date='$billing_date', due_date='$due_date', maximum_cubic='$maximum_cubic', minimum_rate='$minimum_rate'";
		
		$get_billing_count_for_the_month = get_billing_count_for_the_month($user_id,$billing_date,$bill_id);
	    if($get_billing_count_for_the_month>0){
	        echo 2;
	    }else{
			$mysqli->query("UPDATE tbl_bills SET $update_data WHERE bill_id = '$bill_id' ") or die(mysql_error());
			echo 1;
		}
		
	}
?>