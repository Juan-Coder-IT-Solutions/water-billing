<?php 
	include '../core/config.php';
    $user_id 			= $mysqli -> real_escape_string($_POST['user_id']);
    $billing_date 		= $mysqli -> real_escape_string($_POST['billing_date']);
    $cubic_meter_rate 	= $mysqli -> real_escape_string($_POST['cubic_meter_rate']);
    $penalty_amount 	= $mysqli -> real_escape_string($_POST['penalty_amount']);
    $previous_reading 	= $mysqli -> real_escape_string($_POST['previous_reading']);
    $current_reading 	= $mysqli -> real_escape_string($_POST['current_reading']);
    $due_date 			= $mysqli -> real_escape_string($_POST['due_date']);
    $status 			= "S";
    $encoded_by 		= $_SESSION['user_id'];

    
	 $mysqli->query("INSERT INTO tbl_bills SET `user_id` ='$user_id',`billing_date` ='$billing_date',`cubic_meter_rate` ='$cubic_meter_rate',`penalty_amount`='$penalty_amount',`previous_reading`='$previous_reading',`current_reading`='$current_reading',`due_date`='$due_date',`encoded_by`='$encoded_by',status='$status'");

    echo 1;
?>